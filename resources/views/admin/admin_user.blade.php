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
													<td><label>Tên người dùng:</label></td>
													<td><input class="input_info" type="text" name="username" id="user" value="" placeholder="trinhngoc00"></td>
												</tr>
												<tr>
													<td><label>Mật khẩu:</label></td>
													<td><input class="input_info" type="password" name="password" id="pass" value=""></td>
												</tr>
												<tr>
													<td><label>Họ tên:</label></td>
													<td><input class="input_info" type="text" name="name" id="" value="" placeholder="Trịnh Hồng Ngọc"></td>
												</tr>
												<tr>
													<td><label>Địa chỉ:</label></td>
													<td><input class="input_info" type="text" name="address" id="" value="" placeholder="162 Đường Phan Đình Phùng"></td>
												</tr>
												<tr>
													<td><label>Số điện thoại:</label></td>
													<td><input class="input_info" type="text" name="phone" id="" value="" placeholder="0123456789"></td>
												</tr>
												<tr>
													<td><input class="input_btn btn btn-secondary" type="reset" value="Nhập lại"></td>
													<td><button class="input_btn btn btn-success" type="submit" id="btn_add" name="btn_add">Thêm người dùng mới</button></td>
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
						<td><a href="{{ url('updateUser',$row->id) }}">Sửa</a></td>
					</tr>
					@endforeach
				</table>
			</div>
		</div>
	</div>

	@include("layouts.scripts")

	@yield("script")

</body>

</html>