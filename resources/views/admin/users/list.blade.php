@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Danh sách khách hàng
      </div>
      <div class="row w3-res-tb">
       
      </div>
      <div class="table-responsive">
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              <th style="width:20px;"></th>
              <th>Tên khách hàng</th>
              <th>Email</th>
              <th>Điện thoại</th>
              <th>Địa chỉ</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            <?php
                $msg = Session::get('msg');
                if($msg) {
                    echo "<b style='color:green; padding-left:500px;'>".$msg."</b>";
                    Session::put('msg',null);
                }
            ?>
            @foreach($listUsers as $key => $users)
              <tr>
                <td><label class="i-checks m-b-none"><i></i></label></td>
                <td> {{$users->name}} </td>
                <td> {{$users->email}} </td>
                <td> {{$users->phone}} </td>
                <td> {{$users->address}} </td>
                  {{-- <a href="{{URL::to('/edit-type/'.$users->id)}}" class="active" style="font-size: 21px;" ui-toggle-class="">
                    <i class="fa fa-pencil-square-o text-success text-active"></i>
                  </a> --}}
                  <td>
                    <a href="{{URL::to('/delete-user/'.$users->id)}}" 
                      onClick="return confirm('Bạn thực sự muốn xóa ?')" class="active" style="font-size: 21px;"  ui-toggle-class="">
                      <i class="fa fa-times text-danger text"></i>
                    </a>
                  </td>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <footer class="panel-footer">
        <div class="row">
          <div class="col-sm-7 text-right text-center-xs">                
            <ul class="pagination pagination-sm m-t-none m-b-none">
              <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
              <li><a href="">1</a></li>
              <li><a href="">2</a></li>
              <li><a href="">3</a></li>
              <li><a href="">4</a></li>
              <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
          </div>
@endsection