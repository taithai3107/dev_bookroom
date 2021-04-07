<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    public function home()
    {
        $room = DB::table('room')->where('room_status', '1')->orderBy('room_id','desc')->get();
        
        return view('/pages.room')->with('showPageRoom', $room);
    }
}
