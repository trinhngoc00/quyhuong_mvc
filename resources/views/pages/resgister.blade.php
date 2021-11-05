@extends("layouts.app")
@section("css_header")
@endsection

@section("content")
	<div class="container">
		<h2 align="center" style="margin-top: 20px;">Đăng ký tài khoản</h2>
        @if(count($errors) > 0)
            @foreach($errors->all() as $err)
                <p style="color:red; text-align:center;">{{ $err }}</p>
            @endforeach
        @endif
				@if(Session::has('success'))
				<p style="color:green; text-align:center;">{{ Session::get('success') }}</p>
				@endif
		<div class="formLogin">
			<form method="post" action="{{ url('/resgister') }}">
                {{ csrf_field() }}
				<table class="" border="0" cellpadding="0" cellspacing="0" style="margin: auto;">
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
						<td><input class="input_btn btn btn-success" type="submit" value="Đăng ký" id="btn_resgister" name="resgister"></td>
					</tr>
				</table>
			</form>
		</div>
	</div>
@endsection

@section("script")

@endsection

