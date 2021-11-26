<div class="container-fluid">
@if(Session::has('name'))
	<p align="right" style="margin-bottom: 0;">

		Tên người dùng: {{ Session::get('name') }}

		<a class="" href=" {{ route('logout') }}" style="margin-left: 20px;">Đăng xuất</a>
	</p>

	@else
	<p align="right" style="margin-bottom: 0;">Bạn chưa đăng nhập.</p>
	@endif
</div>
<div class="container-fluid ad_head">
	<ul class="nav">
		<li class="nav-item">
			<a class="nav-link active" href="{{ route('admin') }}">Trang quản trị Admin</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="{{ route('home') }}">Trang chủ</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="{{ route('admin') }}">Sản phẩm</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href='{{ route("adminType") }}'>Loại sản phẩm</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href='{{ route("adminUser") }}'>Người dùng</a>
		</li>
	</ul>
</div>