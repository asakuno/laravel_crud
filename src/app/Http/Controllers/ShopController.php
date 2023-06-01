<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Services\ShopService;
use Illuminate\Http\Request;
use App\Http\Requests\ShopRequest;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keyword = request()->input('keyword');
        $prefecture = request()->input('prefecture');
        $query = Shop::query();

        if(!empty($keyword)){
            $query->where(function ($query) use ($keyword) {
                $query->where('name', 'LIKE', "%{$keyword}%")
                    ->orWhere('address', 'LIKE', "%{$keyword}%");
            });
        }

        if (!empty($prefecture)) {
            $query->where('address', 'LIKE', "%{$prefecture}%");
        }
        
        $shops = $query->orderBy('created_at', 'DESC')->paginate(5);

        $user = Auth::user();
        $recommendedShop = null;

        if ($user && $user->profile && $user->profile->current_address) {
        $recommendedShop = Shop::where('address', 'LIKE', '%' . $user->profile->current_address . '%')
            ->inRandomOrder()
            ->first();
        }

        return view('shops.index', compact('shops', 'keyword', 'recommendedShop', 'prefecture'))
            ->with('page_id',request()->page)
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shops.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ShopRequest $request)
    {
        $shop = new Shop;
        $shop->user_id = Auth::id();
        $shop->name = $request->input('name');
        $shop->address = $request->input('address');
        $shop->description = $request->input('description');
        $shop->latitude = $request->input('latitude');
        $shop->longitude = $request->input('longitude');
        $shop->save();

        return redirect()->route('shops.index')
            ->with('success', $shop->name.'を作成しました');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function show(Shop $shop)
    {
        return view('shops.show', compact('shop'))
            ->with('page_id',request()->page_id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function edit(Shop $shop, ShopService $shopService)
    {
        if (!$shopService->checkOwnShop(Auth::user()->id, $shop->id)) {
            throw new AccessDeniedHttpException();
        }
        return view('shops.edit', compact('shop'))
            ->with('page_id',request()->page_id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function update(ShopRequest $request, ShopService $shopService)
    {
        $shop = Shop::find($request->route('shop'));
        if (!$shopService->checkOwnShop($request->user()->id, $shop->id)) {
            throw new AccessDeniedHttpException();
        }

        $shop->user_id = Auth::id();
        $shop->name = $request->input('name');
        $shop->address = $request->input('address');
        $shop->description = $request->input('description');
        $shop->latitude = $request->input('latitude');
        $shop->longitude = $request->input('longitude');
        $shop->save();

        return redirect()->route('shops.index')
            ->with('success', $shop->name.'を編集しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, ShopService $shopService)
    {
        $shop = Shop::find($request->route('shop'));
        if (!$shopService->checkOwnShop($request->user()->id, $shop->id)) {
            throw new AccessDeniedHttpException();
        }
        $shop->delete();
        return redirect()
                ->route('shops.index')
                ->with('success', $shop->name.'を削除しました');
    }

    public function map()
    {
        $shops = Shop::with('user')->get();
        return view('shops.map', compact('shops'));
    }
}
