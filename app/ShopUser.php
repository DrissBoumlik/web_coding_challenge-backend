<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShopUser extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'user_id', 'shop_id', 'is_liked'
    ];

    public function user () {
        return $this->belongsTo(User::class);
    }

    public function shop () {
        return $this->belongsTo(Shop::class);
    }
}
