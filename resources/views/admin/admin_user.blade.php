<!DOCTYPE html>
<html lang="{{App::getLocale()}}">

<head>
	@include("layouts.head")

	@yield("css_header")

	@yield("js_header")
</head>

<body>

	@include("layouts.header_admin")
	<div class="container-fluid ad_content">
		<div class="row">
			@include("layouts.admin_menu")

			<div class="col-10 ad_conntent">
				<h2 align="center">Người dùng</h2>
				
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

				<h4 align="center">
					<div class="alert alert-secondary" role="alert" style="display: inline-block;">
						<form method="post" action="{{ url('searchUser') }}" class="form_search">
							{{csrf_field()}}
							<input type="text" name="keyword" placeholder="Search" value="">
							<button type="submit" name="submit_search" value="Tìm"><i class="fa fa-search"></i> Tìm kiếm</button>
						</form>

						<!-- Button modal -->
						<button type="button" class="btn btn-primary btn_modal" data-toggle="modal" data-target="#modal_add">
							Thêm người dùng mới
						</button>

						<!-- Modal -->
						<div class="modal fade" id="modal_add" tabindex="-1" role="dialog" aria-labelledby="modal_add_label" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="modal_add_label">Thêm người dùng mới</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<form method="post" action="{{ url('addUser') }}" enctype="multipart/form-data">
											{{csrf_field()}}
											<table style="margin: auto;">
												<tr>
													<td><label>ID_loại:</label></td>
													<td><input class="input_info" type="text" name="id_type" value="1"></td>
												</tr>
												<tr>
													<td><label>Tên sản phẩm:</label></td>
													<td><input class="input_info" type="text" name="name" value="111"></td>
												</tr>
												<tr>
													<td><label>Số lượng:</label></td>
													<td><input class="input_info" type="text" name="amount" id="" value="1"></td>
												</tr>
												<tr>
													<td><label>Đơn giá:</label></td>
													<td><input class="input_info" type="text" name="price" id="" value="10000"></td>
												</tr>
												<tr>
													<td><label>Giá khuyến mại:</label></td>
													<td><input class="input_info" type="text" name="price_sale" id="" value="8000"></td>
												</tr>
												<tr>
													<td><label>Ảnh:</label></td>
													<td><input type="file" name="image_up" style="width: 100%;"></td>
												</tr>
												<tr>
													<td><label>Mô tả:</label></td>
													<td><input class="input_info" type="text" name="description" id="" value="111"></td>
												</tr>
												<tr>
													<td><input class="input_btn btn btn-secondary" type="reset" value="Nhập lại"></td>
													<td><button class="input_btn btn btn-success" type="submit" id="btn_add" name="btn_add">Thêm sản phẩm mới</button></td>
												</tr>
											</table>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</h4>

				<table style="margin: auto;">
					<tr>
						<th>ID</th>
						<th>Username</th>
						<th>Họ tên</th>
						<th>Địa chỉ</th>
						<th>Điện thoại</th>
						<th>Sửa</th>
					</tr>

					@foreach ($cus as $row)
					<tr>
						<td><?php echo $row['id']; ?></td>
						<td><?php echo $row['username']; ?></td>
						<td><?php echo $row['name']; ?></td>
						<td><?php echo $row['address']; ?></td>
						<td><?php echo $row['phone']; ?></td>
						<td><a href="update.php?id=<?php echo $row['id']; ?>&flag=user">Sửa</a></td>
					</tr>
					@endforeach
				</table>
			</div>
		</div>
	</div>
	@include("layouts.footer")

	@include("layouts.scripts")

	@yield("script")

</body>

</html>