<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class TypeController extends Controller
{
    public function showPageAdd()
    {
        return view('admin.types.add_type');
    }

    public function addTypeAction(Request $request)
    {
        $data = array();
        $data['type_name'] = $request->typeName;
        $data['status'] = $request->typeStatus;
        DB::table('type')->insert($data);
        Session::put('msg','Thêm thành công');
        return Redirect::to('/add-type');
    }

    public function listType()
    {
        $list = DB::table('type')->get();
        $manager = view('admin.types.list_types')->with('listType', $list);
        return view('admin_layout')->with('admin.types.list_types', $manager);
    }

    public function deleteType($id)
    {
        $result = DB::table('room')->where('type_id', $id)->exists();
        if($result) {
            Session::put('msg','Loại phòng đang có phòng !');
            return Redirect::to('/list-type');
        } else {
            DB::table('type')->where('type_id', $id)->delete();
            Session::put('msg','Xóa thành công');
            return Redirect::to('/list-type');
        }
    }

    public function inactiveType($id) 
    {
        DB::table('type')->where('type_id',$id)->update(['status'=> 1]);
        return Redirect::to('/list-type');
    }

    public function activeType($id) 
    {
        DB::table('type')->where('type_id',$id)->update(['status' => 0]);
        return Redirect::to('/list-type');
    }

    public function showPageEdit($id)
    {
        $edit = DB::table('type')->where('type_id', $id)->get();
        $manager = view('admin.types.edit_type')->with('editType', $edit);
        return view('admin_layout')->with('admin.types.edit_type', $manager);
    }

    public function update(Request $request, $id)
    {
        $data = array();
        $data['type_name']   = $request->typeName;
        $data['status']      = $request->typeStatus;
        DB::table('type')->where('type_id', $id)->update($data);
        Session::put('msg','Cập nhật thành công');
        return Redirect::to('/list-type');
    }
}
