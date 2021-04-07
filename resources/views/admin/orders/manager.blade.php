@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        DANH SÁCH ĐƠN HÀNG
      </div>
      <div class="row w3-res-tb">
       
      </div>
      <div class="table-responsive">
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              <th style="width:20px;"></th>
              <th>Tên người đặt</th>
              <th> Phòng </th>
              <th> Số lượng </th>
              <th>Tổng tiền</th>
              <th>Tình trạng</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            <?php
                $msg = Session::get('msg');
                if($msg) {
                    echo "<b style='color:green'>".$msg."</b>";
                    Session::put('msg',null);
                }
            ?>
            @foreach($all_order as $key => $order)
              <tr>
                <td><label class="i-checks m-b-none"><i></i></label></td>
                <td> {{$order->name}} </td>
                <td> {{$order->room_name}} </td>
                <td> {{$order->room_qty}} </td>
                <td><span class="text-ellipsis">{{$order->total}}</span></td>
                <td><span class="text-ellipsis">{{$order->status}}</span></td>
                <td>
                  <a href="{{URL::to('/delete-orders/'.$order->order_id)}}" onClick="return confirm('Are you confirm to delete ?')"class="active" style="font-size: 21px;"  ui-toggle-class="">
                    <i class="fa fa-times text-danger text"></i>
                  </a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
          </div>
@endsection