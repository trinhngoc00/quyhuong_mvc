<!DOCTYPE html>
<html lang="{{App::getLocale()}}">

<head>
	@include("layouts.head")

	@yield("css_header")

	@yield("js_header")
</head>

<body class="nav-md">
	@include("layouts.header_admin")

	<div class="container-fluid ad_content">
		<div class="row">
			@include("layouts.admin_menu")

			<div class="col-10 ad_conntent">
				<h2 align="center">Sửa người dùng</h2>

				@if(Session::has('success'))
				<div class="alert alert-success" role="alert">
					{{ Session::get('success') }}
				</div>
				@endif

				@if(Session::has('fail'))
				<div class="alert alert-danger" role="alert">
					{{ Session::get('fail') }}
				</div>
				@endif

				<form method="post" action="{{ url('updateUser') }}" enctype="multipart/form-data">
					{{csrf_field()}}
					<input hidden="true" class="input_info" type="text" name="id" value="<?php echo $row['id']; ?>">
					<table style="margin: auto;">
						<tr>
							<td><label>Tên người dùng:</label></td>
							<td><input class="input_info" type="text" name="username" id="user" value="{{ $row->username }}" placeholder="trinhngoc00"></td>
						</tr>
						<tr>
							<td><label>Mật khẩu:</label></td>
							<td><input class="input_info" type="password" name="password" id="pass" value=""></td>
						</tr>
						<tr>
							<td><label>Họ tên:</label></td>
							<td><input class="input_info" type="text" name="name" id="" value="{{ $row->name }}" placeholder="Trịnh Hồng Ngọc"></td>
						</tr>
						<tr>
							<td><label>Địa chỉ:</label></td>
							<td><input class="input_info" type="text" name="address" id="" value="{{ $row->address }}" placeholder="162 Đường Phan Đình Phùng"></td>
						</tr>
						<tr>
							<td><label>Số điện thoại:</label></td>
							<td><input class="input_info" type="text" name="phone" id="" value="{{ $row->phone }}" placeholder="0123456789"></td>
						</tr>
						<tr>
							<td><input class="input_btn btn btn-secondary" type="reset" value="Nhập lại"></td>
							<td><button class="input_btn btn btn-success" type="submit" id="btn_add" name="btn_add">Cập nhật</button></td>
						</tr>
					</table>
				</form>


			</div>
		</div>
	</div>
	@include("layouts.scripts")

	@yield("script")

</body>

</html>