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
				<h2 align="center">Sửa loại sản phẩm</h2>

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

				<form method="post" action="{{ url('updateType') }}" enctype="multipart/form-data">
				{{csrf_field()}}
					<input hidden="true" class="input_info" type="text" name="id" value="<?php echo $row['id']; ?>">
					<table style="margin: auto;">
						<tr>
							<td><label>Tên loại sản phẩm:</label></td>
							<td><input class="input_info" type="text" name="name" value="<?php echo $row['name']; ?>"></td>
						</tr>
						
						<tr>
							<td><input class="input_btn btn btn-secondary" type="reset" value="Nhập lại"></td>
							<td><button class="input_btn btn btn-success" type="submit" id="btn_update" name="update">Cập nhật loại sản phẩm</button></td>
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