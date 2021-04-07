@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Danh sách loại phòng
      </div>
      <div class="row w3-res-tb">
       
      </div>
      <div class="table-responsive">
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              <th style="width:20px;"></th>
              <th>Tên loại</th>
              <th>Trạng thái</th>
              <th>Display</th>
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
            @foreach($listType as $key => $type)
              <tr>
                <td><label class="i-checks m-b-none"><i></i></label></td>
                <td> {{$type->type_name}} </td>
                <td><span class="text-ellipsis">
                  <?php
                    if($type->status==0) {
                  ?>
                    <a href="{{URL::to('/inactive-type/'.$type->type_id)}}" style="color:red">Không hoạt động</a>
                  <?php
                    }
                    else {
                  ?>
                    <a href="{{URL::to('/active-type/'.$type->type_id)}}" style="color:green">Đang hoạt động</a>
                  <?php
                    }
                  ?>
                </span></td>
                <td>
                  <a href="{{URL::to('/edit-type/'.$type->type_id)}}" class="active" style="font-size: 21px;" ui-toggle-class="">
                    <i class="fa fa-pencil-square-o text-success text-active"></i>
                  </a>
                  <a href="{{URL::to('/delete-type/'.$type->type_id)}}" onClick="return confirm('Bạn thực sự muốn xóa ?')"class="active" style="font-size: 21px;"  ui-toggle-class="">
                    <i class="fa fa-times text-danger text"></i>
                  </a>
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