<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShopUser;
use Auth;

class ShopUserController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;

        $shop_user = ShopUser::where('user_id',$user_id)->where('shop_id',$request->shop_id)->first();

        if($shop_user != null) {
            $shop_user['is_liked'] = $request->is_liked;
            //return self::update($request, $shop_user);
        }
        else{
            $shop_user = new ShopUser();
            $shop_user->fill([
                'user_id'   => $user_id,
                'shop_id'   => $request->shop_id,
                'is_liked'   => $request->is_liked
            ]);
        }
        $shop_user->save();
        return response()->json([
            'shop' => $shop_user,
            'message' => ($request->is_liked) ? 'Shop Liked' : 'Shop Disliked'
        ]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($shop_id)
    {
        $shop_user = ShopUser::where('user_id', Auth::user()->id)->where('shop_id',$shop_id)->first();
        if ($shop_user != null && $shop_user->delete()) {
            return response()->json([
                'shop' => $shop_user,
                'message' => 'Successfully removed from your favorite list!'
            ]);
        }
        else {
            return response()->json([
                'shop' => $shop_user,
                'message' => 'Something went wrong!'
            ]);
        }
    }

    public function liked_shopes(){
        $user = Auth::user(); // For testing
        $shops = $user->shops()->whereNull('shop_users.deleted_at')->where('is_liked', 1)->paginate(12);
        return response()->json(compact('shops'));
    }
}
