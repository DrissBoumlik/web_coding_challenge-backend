<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shop extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name', 'email', 'city', 'location', 'thumbnail'
    ];

    public function shop_users () {
        return $this->hasMany(ShopUser::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'shop_users')
                    ->withPivot('is_liked');
    }

    static function byDistance($location, $shops){
        $location = explode('|', $location);
        $user_lat = $location[0];
        $user_lon = $location[1];
        $index = 0;
        $shops = $shops->transform(function ($shop) use ($user_lat, $user_lon, $index){
            $shop_location = explode('|', $shop->location);
            // Calculate the distance after
            $shop['distance'] = Shop::calcDistance($shop_location[0], $shop_location[1], $user_lat, $user_lon);
            $shop = collect($shop);

            return $shop;
        });
        $shops = $shops->sortBy('distance');
        return $shops;
    }

    static function degreesToRadians($degrees) {
        return $degrees * M_PI / 180;
    }

    static function calcDistance($lat1, $lon1, $lat2, $lon2) {
        $R = 6371;

        $dLat = self::degreesToRadians($lat2 - $lat1);
        $dLon = self::degreesToRadians($lon2 - $lon1);

        $lat1 = self::degreesToRadians($lat1);
        $lat2 = self::degreesToRadians($lat2);

        $a = sin($dLat/2) * sin($dLat/2) +
             sin($dLon/2) * sin($dLon/2) * cos($lat1) * cos($lat2);
        $c = 2 * atan2(sqrt($a), sqrt(1-$a));
        return $R * $c;
    }
}
