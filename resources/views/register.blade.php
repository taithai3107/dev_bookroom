<!DOCTYPE html>
<head>
	<title>Đăng ký</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Đăng ký</h2>
			</div>
			<div class="panel-body">
                <form  method="POST" action="{{URL::to('/register')}}">
					@csrf
                    <div class="form-group">
                    <label for="usr">Họ và tên:</label>
                    <input required="true" type="text" name="name" class="form-control" id="usr">
                    </div>
                    <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input required="true" type="email" name="email" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                    <label for="pwd">Mật khẩu:</label>
                    <input required="true" type="password" name="password" class="form-control" id="pwd">
                    </div>
                    <div class="form-group">
                    <label for="confirmation_pwd">Số điện thoại:</label>
                    <input required="true" type="text" name="phone" class="form-control" id="confirmation_pwd">
                    </div>
                    <div class="form-group">
                    <label for="address">Địa chỉ:</label>
                    <input type="text" name="address" class="form-control" id="address">
                    </div>
                    <button class="btn btn-success">Chấp nhận</button>
                </form>
			</div>
		</div>
	</div>
</body>
</html>