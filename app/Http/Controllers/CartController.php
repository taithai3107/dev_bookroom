<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Gloudemans\Shoppingcart\Facades\Cart;
session_start();

class CartController extends Controller
{
    public function cart()
    {
        return view('/cart');
    }

    public function showCart(Request $request)
    {
        $room_id = $request->room_hidden;
        $days = $request->days;
        $room_info = DB::table('room')->where('room_id', $room_id)->first();

        $data['id']     = $room_info->room_id;
        $data['qty']    = $days;
        $data['name']   = $room_info->room_name;
        $data['price']  = $room_info->room_price;
        $data['weight'] = "123";
        $data['options']['image']  = $room_info->room_image;
        Cart::add($data);
        return Redirect::to('/cart');
    }

    public function deleteCart($rowId)
    {
        Cart::update($rowId, 0);
        return Redirect::to('/cart');
    }

    public function updateCart(Request $request)
    {
        $rowId = $request->rowId_cart;
        $qty   = $request->quantity;
        Cart::update($rowId, $qty);
        return Redirect::to('/cart');   
    }
    
}
