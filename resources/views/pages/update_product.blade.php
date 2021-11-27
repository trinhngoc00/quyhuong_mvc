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
				<h2 align="center">Sửa sản phẩm</h2>

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

				<form method="post" action="{{ url('updateProduct') }}" enctype="multipart/form-data">
					<input hidden="true" class="input_info" type="text" name="id" value="<?php echo $row['id']; ?>">
					<table style="margin: auto;">
						<tr>
							<td><label>ID_loại:</label></td>
							<td><input class="input_info" type="text" name="id_type" value="<?php echo $row['id_type']; ?>"></td>
						</tr>
						<tr>
							<td><label>Tên sản phẩm:</label></td>
							<td><input class="input_info" type="text" name="name" value="<?php echo $row['name']; ?>"></td>
						</tr>
						<tr>
							<td><label>Số lượng:</label></td>
							<td><input class="input_info" type="text" name="amount" id="" value="<?php echo $row['amount']; ?>"></td>
						</tr>
						<tr>
							<td><label>Đơn giá:</label></td>
							<td><input class="input_info" type="text" name="price" id="" value="<?php echo $row['price']; ?>"></td>
						</tr>
						<tr>
							<td><label>Giá khuyến mại:</label></td>
							<td><input class="input_info" type="text" name="price_sale" id="" value="<?php echo $row['price_sale']; ?>"></td>
						</tr>
						<tr>
							<td><label>Ảnh:</label></td>
							<td><input type="file" name="image_up" style="width: 100%;"></td>
						</tr>
						<tr>
							<td><label>Mô tả:</label></td>
							<td><input class="input_info" type="text" name="description" id="" value="<?php echo $row['description']; ?>"></td>
						</tr>
						<tr>
							<td><input class="input_btn btn btn-secondary" type="reset" value="Nhập lại"></td>
							<td><input class="input_btn btn btn-success" type="submit" value="Cập nhật sản phẩm" id="btn_update" name="update"></td>
						</tr>
					</table>
				</form>

				
			</div>
		</div>
	</div>
	<?php include 'layouts/scripts.php'; ?>

</body>

</html>