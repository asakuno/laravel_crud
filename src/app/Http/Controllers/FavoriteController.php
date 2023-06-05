<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Shop;
use App\Models\Favorite;
use App\Services\ShopService;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class FavoriteController extends Controller
{
    public function store(Shop $shop, ShopService $shopService)
    {
        if ($shopService->checkOwnShop(Auth::user()->id, $shop->id)) {
            throw new AccessDeniedHttpException();
        }

        $user = Auth::user();
        if (!$user->is_favorite($shop->id)) {
            $user->favorite_shops()->attach($shop->id);
        }

        return redirect()->back();
    }

    public function destroy(Shop $shop, ShopService $shopService)
    {
        if ($shopService->checkOwnShop(Auth::user()->id, $shop->id)) {
            throw new AccessDeniedHttpException();
        }
        
        $user = Auth::user();
        if ($user->is_favorite($shop->id)) {
            $user->favorite_shops()->detach($shop->id);
        }

        return redirect()->back();
    }
}
