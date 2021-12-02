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
				<h2>Xoá sản phẩm</h2>
				<div align="center">

					@if(Session::has('success'))
					<div class="alert alert-success" role="alert">
						{{ Session::get('success') }}
					</div>
					@else
					<h3>Xác nhận xoá loại sản phẩm: {{ $row->name }}</h3>

					<form method="post" action="{{ url('deleteType') }}" enctype="multipart/form-data">
						{{csrf_field()}}
						<input hidden="true" class="input_info" type="text" name="id" value="<?php echo $row['id']; ?>">

						<button type="submit" class="btn btn-success" style="border-radius: 0.25rem;">Có</button>
						<a type="button" class="btn btn-secondary" href="{{ url('adminType') }}">Không</a>
					</form>
					@endif

					@if(Session::has('fail'))
					<div class="alert alert-danger" role="alert">
						{{ Session::get('fail') }}
					</div>
					@endif

				</div>
			</div>
		</div>
	</div>

	@include("layouts.scripts")

	@yield("script")

</body>

</html>