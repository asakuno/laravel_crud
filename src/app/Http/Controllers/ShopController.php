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
    public function index()
    {
        //検索フィールドにあるkeywordの取得
        $keyword = request()->input('keyword');
        //セレクトボックスにある県の取得
        $prefecture = request()->input('prefecture');

        //Models/Shop.phpで定義したscopeSearchメソッドの呼び出し
        $query = Shop::latest()->search($keyword);
        //県の部分一致検索
        if (!empty($prefecture)) {
            $query->where('address', 'LIKE', "%{$prefecture}%");
        }
        
        $shops = $query->orderBy('created_at', 'DESC')->paginate(5);

        $user = Auth::user();
        //recommendedShopを定義しないとuser->profileがnullの時エラーが発生する
        $recommendedShop = null;

        //プロフィール(現在地)を設定している時レコメンド
        if ($user && $user->profile && $user->profile->current_address) {
        $recommendedShop = Shop::where('address', 'LIKE', '%' . $user->profile->current_address . '%')
            ->inRandomOrder()
            ->first(); //ランダムで一件、レコメンドされたshopが表示される
        }

        return view('shops.index', compact('shops', 'keyword', 'recommendedShop', 'prefecture'))
            ->with('page_id',request()->page)
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('shops.create');
    }

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

    public function show(Shop $shop)
    {
        return view('shops.show', compact('shop'))
            ->with('page_id',request()->page_id);
    }

    public function edit(Shop $shop, ShopService $shopService)
    {
        //書店作成者が違う場合403エラーを返す
        if (!$shopService->checkOwnShop(Auth::user()->id, $shop->id)) {
            throw new AccessDeniedHttpException();
        }
        return view('shops.edit', compact('shop'))
            ->with('page_id',request()->page_id);
    }

    public function update(ShopRequest $request, ShopService $shopService)
    {
        $shop = Shop::find($request->route('shop'));
        //書店作成者が違う場合403エラーを返す
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

    public function destroy(Request $request, ShopService $shopService)
    {
        $shop = Shop::find($request->route('shop'));
        //書店作成者が違う場合403エラーを返す
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

    public function favorite_shops()
    {
        $user = Auth::user();
        //favorite_shopsの中にお気に入りした書店がある
        $shops = $user->favorite_shops()->orderBy('created_at', 'DESC')->paginate(5);

        return view('shops.favorites', compact('shops'));
    }
}
