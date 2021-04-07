<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function loginPage()
    {
        return view("/login");
    }

    public function loginAction(Request $request)
    {
        $email    = $request->email;
        $password = $request->password;
        $resultAdmin = DB::table('admin')
            ->where('email', $email)
            ->where('password', $password)
            ->first();
        $resultCustomer = DB::table('customer')
            ->where('email', $email)
            ->where('password', $password)
            ->first();
        if($resultAdmin) 
        {
            Session::put('name', $resultAdmin->name);
            Session::put('id', $resultAdmin->id);
            return Redirect::to('/dashboard');
        } else if($resultCustomer)
        {
            Session::put('name', $resultCustomer->name);
            Session::put('id', $resultCustomer->id);
            return Redirect::to('/home');
        }
        else 
        {
            Session::put('msg','Please check email or password. Try again!!!');
            return view('/login');
        }
    }
    
    public function logoutAction() 
    {
        Session::flush();
        $room = DB::table('room')->where('room_status', '1')->orderBy('room_id','desc')->get();
        return Redirect::to('/')->with('showPageRoom', $room);
    }
}
