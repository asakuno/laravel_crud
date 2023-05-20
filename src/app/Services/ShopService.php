<?php
namespace App\Services;

use App\Models\Shop;
class ShopService
{
    public static function getShops()
    {
        return Shop::orderBy('created_at', 'DESC')->get();
    }

    public function checkOwnShop(int $user_id, int $shop_id): bool
    {
        $shop = Shop::where('id', $shop_id)->first();
        if (!$shop) {
            return false;
        }

        return $shop->user_id === $user_id;
    }
}