<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Services\ShopService;
use Illuminate\Http\Request;
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
        $shops = Shop::latest()->paginate(5);

        return view('shops.index', compact('shops'))
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
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:20',
            'address' => 'required|max:50',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric'
        ]);

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
        //
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
        return view('shops.edit', compact('shop'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShopService $shopService)
    {
        $request->validate([
            'name' => 'required|max:20',
            'address' => 'required|max:50',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric'
        ]);

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
    public function destroy(Shop $shop)
    {
        //
    }
}
