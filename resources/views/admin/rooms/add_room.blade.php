@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm phòng
            </header>
            <div class="panel-body">
                <?php
                    $msg = Session::get('msg');
                    if($msg) {
                        echo "<b style='color:green; padding-left:500px;'>".$msg."</b>";
                        Session::put('msg',null);
                    }
                ?>
                <div class="position-center">
                    <form role="form" action="{{URL::to('/add-room-action')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên phòng</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Image</label>
                        <input type="file" class="form-control" id="exampleInputEmail1" name="image">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Loại</label>
                        <select name="type" class="form-control m-bot15">
                            @foreach($typeName as $key=>$value)
                            <option value="{{$value->type_id}}">{{$value->type_name}}</option>
                            @endforeach 
                        </select>
                    </div> 
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mô tả</label>
                        <textarea style="resize:none" rows="8" class="form-control" name="description" id="exampleInputPassword1">
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Giá</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="price">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Tình trạng</label>
                        <select name="status" class="form-control m-bot15">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-info" name="addRoom">Submit</button>
                </form>
                </div>

            </div>
        </section>

    </div>
</div>
@endsection