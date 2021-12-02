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
			<div class="col-10 ad_conntent" >
				<h2 align="center">Loại sản phẩm</h2>
				<h4 align="center">
				
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

					<div class="alert alert-secondary" role="alert" style="display: inline-block;">
						<!-- Button trigger modal -->
						<button type="button" class="btn btn-primary btn_modal" data-toggle="modal" data-target="#modal_add_type">
							Thêm loại sản phẩm mới
						</button>

						<!-- Modal -->
						<div class="modal fade" id="modal_add_type" tabindex="-1" role="dialog" aria-labelledby="modal_add_label" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="modal_add_label">Thêm loại sản phẩm mới</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<form method="post" action="{{ url('addType') }}" enctype="multipart/form-data">
										{{csrf_field()}}	
											<table style="margin: auto;">
												<tr>
													<td><label>Tên loại sản phẩm:</label></td>
													<td><input class="input_info" type="text" name="name" value=""></td>
												</tr>
												<tr>
													<td><input class="input_btn btn btn-secondary" type="reset" value="Nhập lại"></td>
													<td><button class="input_btn btn btn-success" type="submit" id="btn_add" name="add_type">Thêm loại sản phẩm mới</button></td>
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
						<th>Tên loại sản phẩm</th>
						<th>Xoá</th>
						<th>Sửa</th>
					</tr>
				@foreach ($type as $row)
					<tr>
						<td><?php echo $row['id'];?></td>
						<td><?php echo $row['name'];?></td>
						<td>
							<a type="button" class="btn btn-secondary" href="{{ url('deleteType', $row->id) }}">Xoá</a>
						</td>
						<td>
							<a href="{{ url('updateType', $row->id) }}" type="button" class="btn btn-warning">Sửa</a>
						</td>
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