@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                THÊM LOẠI PHÒNG
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
                    <form role="form" action="{{URL::to('/add-type-action')}}" method="post">
                        @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên loại</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="typeName">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Trạng thái</label>
                        <select name="typeStatus" class="form-control m-bot15">
                            <option value="1">Hoạt động</option>
                            <option value="0">Không hoạt động</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-info" name="addType">Submit</button>
                </form>
                </div>

            </div>
        </section>

    </div>
</div>
@endsection