@extends("layouts.app")
@section("css_header")
<style>
	tr td {
		text-align: left;
	}

	td:last-child {
		text-align: center;
	}
</style>
@endsection

@section("content")
<div class="container">
	<h2 align="center" style="margin-top: 20px;">Đăng ký tài khoản</h2>
	</br>


	@if(Session::has('success'))
	<p style="color:green; text-align:center;">{{ Session::get('success') }}</p>
	@endif


	<div class="formLogin">
		<form method="post" action="{{ url('/resgister') }}">
			{{ csrf_field() }}
			<table class="" border="0" cellpadding="0" cellspacing="0" style="margin: auto;">
				<tr>
					<td><label>Tên người dùng:</label></td>
					<td><input class="input_info" type="text" name="username" id="user" value="" placeholder="Nhập username"></td>
				</tr>
				<tr>
					<td><label>Mật khẩu:</label></td>
					<td><input class="input_info" type="password" name="password" id="pass" placeholder="Nhập password"></td>
				</tr>
				<tr>
					<td><label>Họ tên:</label></td>
					<td><input class="input_info" type="text" name="name" id="" value="" placeholder="Nhập họ tên"></td>
				</tr>
				<tr>
					<td><label>Địa chỉ:</label></td>
					<td><input class="input_info" type="text" name="address" id="" value="" placeholder="Nhập địa chỉ"></td>
				</tr>
				<tr>
					<td><label>Số điện thoại:</label></td>
					<td><input class="input_info" type="text" name="phone" id="" value="" placeholder="Nhập số điện thoại"></td>
				</tr>
				<tr>
					<td><input class="input_btn btn btn-secondary" type="reset" value="Nhập lại"></td>
					<td><input class="input_btn btn btn-success" type="submit" value="Đăng ký" id="btn_resgister" name="resgister"></td>
				</tr>
			</table>
		</form>
		@if(count($errors) > 0)
		@foreach($errors->all() as $err)
		<div class="alert alert-danger alert-dismissible" role="alert" style="display: flex;justify-content: space-between;">
			<span style="color:red; text-align:center;">{{ $err }}</span>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				<span class="sr-only">Close</span>
			</button>
		</div>
		@endforeach
		@endif
	</div>
</div>
@endsection

@section("script")

@endsection