<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckOutController extends Controller
{
    public function checkout()
    {
        $order = array();
        $order['customer_id']  = Session::get('id');
        $order['total']        = Cart::total();
        $order['status']       = "Đang chờ xử lí";
        $orderId = DB::table('order')->insertGetId($order);

         //insert order table details
        $content = Cart::content();
        foreach($content as $value_content) {
            $order_details = array();
            $order_details['order_id']   = $orderId;
            $order_details['room_id']    = $value_content->id;
            $order_details['room_name']  = $value_content->name;
            $order_details['room_price'] = $value_content->price;
            $order_details['room_qty']   = $value_content->qty;
            DB::table('order_details')->insertGetId($order_details);
        }

        return view('done');
    }
}
