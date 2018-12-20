<?php

namespace App\Http\Controllers;

use App\Shop;
use Illuminate\Http\Request;
use Auth;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $user_id = $user->id;
        $location = $user->user_location;
        $shops = Shop::whereNotIn('id', function($query) use($user_id){
            $query->select('shop_id')
                  ->from('shop_users')
                  ->whereNotNull('is_liked')
                  ->where('user_id', $user_id)
                  ->whereNull('deleted_at');
        })->whereNull('deleted_at')->get();
        $shops = Shop::byDistance($location, $shops); // Getting all the shops sorted by distance
        $shops = $this->paginate($shops, 12);
        return response()->json(compact('shops'));
    }
}
