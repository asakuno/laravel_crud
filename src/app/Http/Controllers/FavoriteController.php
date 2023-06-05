<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Shop;
use App\Models\Favorite;

class FavoriteController extends Controller
{
    public function store(Shop $shop)
    {
        $user = Auth::user();
        if (!$user->is_favorite($shop->id)) {
            $user->favorite_shops()->attach($shop->id);
        }

        return redirect()->back();
    }

    public function destroy(Shop $shop)
    {
        $user = Auth::user();
        if ($user->is_favorite($shop->id)) {
            $user->favorite_shops()->detach($shop->id);
        }

        return redirect()->back();
    }
}
