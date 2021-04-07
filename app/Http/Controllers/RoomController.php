<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class RoomController extends Controller
{
    public function showPageAdd()
    {
        $typeName = DB::table('type')->orderBy('type_id', 'asc')->get();
        return view('admin.rooms.add_room')->with('typeName', $typeName);
    }

    public function addRoomAction(Request $request)
    {
        $data = array();
        $data['room_name']        = $request->name;
        $data['room_image']       = $request->image;
        $data['type_id']          = $request->type;
        $data['room_description'] = $request->description;
        $data['room_price']       = $request->price;
        $data['room_status']      = $request->status;
        if($request->hasFile('image')) {
            $image = $request->file('image');
            if($image) {
                $get_name_image = $image->getClientOriginalName();
                $name_image     = current(explode('.',$get_name_image));
                $new_image      = $name_image.rand(0,99).'.'.$image->getClientOriginalExtension();
                $image->move('public/upload/rooms',$new_image);
                $data['room_image'] = $new_image;
                DB::table('room')->insert($data);
                Session::put('msg','Thêm phòng thành công');
                return Redirect::to('/add-room');
            }
        }
        $data['room_image'] = '';
        DB::table('room')->insert($data);
        Session::put('msg','Thêm phòng thành công');
        return Redirect::to('/add-room');
    }

    public function listRoom()
    {
        $list = DB::table('room')
            ->join('type','type.type_id', '=', 'room.type_id')
            ->orderBy('room.type_id', 'desc')->get();
        return view('admin.rooms.list_rooms')->with('listRoom', $list);
    }

    public function inactiveRoom($id)
    {
        DB::table('room')->where('room_id',$id)->update(['room_status' => 1]);
        return Redirect::to('/list-room');
    }

    public function activeRoom($id)
    {
        DB::table('room')->where('room_id',$id)->update(['room_status' => 0]);
        return Redirect::to('/list-room');
    }

    public function showPageEdit($id)
    {
        $type    = DB::table('type')->orderBy('type_id', 'asc')->get();
        $room    = DB::table('room')->where('room_id', $id)->get();
        $manager = view('admin.rooms.edit_room')
            ->with('editRoom', $room)
            ->with('editType', $type);
        return view('admin_layout')->with('admin.rooms.edit_room', $manager);
    }

    public function update(Request $request, $id)
    {
        $data = array();
        $data['room_name']        = $request->name;
        $data['room_image']       = $request->image;
        $data['type_id']          = $request->type;
        $data['room_description'] = $request->description;
        $data['room_price']       = $request->price;
        $data['room_status']      = $request->status;
        if($request->hasFile('image')) {
            $image = $request->file('image');
            if($image) {
                $get_name_image = $image->getClientOriginalName();
                $name_image     = current(explode('.',$get_name_image));
                $new_image      = $name_image.rand(0,99).'.'.$image->getClientOriginalExtension();
                $image->move('public/upload/rooms',$new_image);
                $data['room_image'] = $new_image;
                DB::table('room')->where('room_id',$id)->update($data);
                Session::put('msg','Cập nhật thành công');
                return Redirect::to('/add-room');
            }
        }
        $data['room_image'] = '';
        DB::table('room')->where('room_id',$id)->update($data);
        Session::put('msg','Thêm phòng thành công');
        return Redirect::to('/add-room');
    }
}
