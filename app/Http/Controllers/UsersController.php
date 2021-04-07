<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    public function listUsers()
    {
        $list = DB::table('customer')->get();
        $manager = view('admin.users.list')->with('listUsers', $list);
        return view('admin_layout')->with('admin.users.list', $manager);
    }

    public function deleteUser($id)
    {
        DB::table('customer')->where('id', $id)->delete();
        Session::put('msg','Xóa thành công');
        return Redirect::to('/list-users');
    }
}
