<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $key = $request->keyWord;
        $result = DB::table('room')->where('room_name', 'like', '%'.$key.'%')->get();      
        return view('/pages.search')->with('result', $result);
    }
}
