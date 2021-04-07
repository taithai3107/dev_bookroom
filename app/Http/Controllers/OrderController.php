<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class OrderController extends Controller
{
    public function manager()
    {
        $all_order = DB::table('order')
        ->join('customer', 'order.customer_id', '=', 'customer.id')
        ->join('order_details', 'order.order_id', '=', 'order_details.order_id')
        ->select('order.*', 'customer.name', 'order_details.*')
        ->orderby('order.order_id','desc')->get();
        
        return view('admin.orders.manager',['all_order' => $all_order]);
    }

    public function delete_order($id)
    {
        DB::table('order')->where('order_id', $id)->delete();
        Session::put('msg', 'Xóa thành công');
        return Redirect::to('/manage-order');
    }

}
