<div class="container">
	@if(Session::has('name'))
	<p align="right" style="margin-bottom: 0;">

		Tên người dùng: {{ Session::get('name') }}

		<a class="" href=" {{ route('logout') }}" style="margin-left: 20px;">Đăng xuất</a>
	</p>

	@else
	<p align="right" style="margin-bottom: 0;">Bạn chưa đăng nhập.</p>
	@endif
</div>
<header>
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-light  " style="">
			<div>
				<a class="link-head" href="{{ route('home') }}" style="display: flex;">
					<img src="{{ asset('img/quyhuong.png') }}" width="50px;" style="height: fit-content;">
					<div style="padding: 5px 10px;" class="name-title">
						Bakery Quý Hương
					</div>
				</a>
			</div>

			<div style=""><button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					MENU
				</button></div>

			<div class="collapse navbar-collapse" id="navbarNav" style="justify-content: flex-end;">
				<ul class="navbar-nav">
					<li class="nav-item active">
						<a class="nav-link" href="{{ route('home') }}">Trang chủ<span class="sr-only">(current)</span></a>
					</li>

					<li class="nav-item li-parent">
						<a class="nav-link" href="{{ route('product') }}">sản phẩm</a>
						<div class="wrapper-submenu">
							<ul>
								@foreach($all_type as $row)
								<li class="nav-item">
									<a href="{{ url('typeProduct', $row->id) }}" class="nav-link">{{$row->name}}</a>
								</li>
								@endforeach
							</ul>
						</div>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="{{ url('typeProduct/1') }}">Bánh gato</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ url('typeProduct/7') }}">Bánh miếng nhỏ</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ url('typeProduct/9') }}">Bánh sự kiện</a>
					</li>

					@if(Session::has('name'))
					@else
						<li class="nav-item">
							<a class="nav-link" href="{{ route('login') }}">Đăng nhập</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('resgister') }}">Đăng kí</a>
						</li>
					@endif

					@if(Session::has('name') && Session::get('name') == 'admin')
						<li class="nav-item">
							<a class="nav-link" href="{{ url('admin') }}">Trang quản trị</a>
						</li>
						@endif
					
					<li class="nav-item nav-item-icon" id="icon-search">
						<a class="nav-link" type="button"><i class="fa fa-search"></i></a>
					</li>

					<li class="nav-item nav-item-icon li-parent">

						<a href="shopping_cart.php" class="nav-link"><span class="fa fa-cart-arrow-down"></span><span class="badge badge-dark"></span></a>

						<!-- <div class="wrapper-submenu " style="width: 300px; right: 0;">
									<div id="change-item-cart">
										<div>Tổng tiền: <span>0 VND</span> </div>
									</div>
								</div> -->
					</li>
				</ul>

				<div class="form-search">
					<form method="post" action="{{url('search')}}">
						{{csrf_field()}}
						<input type="text" name="keyword" placeholder="Search" value="socola">
						<button type="submit" name="submit_search" value="Tìm"><i class="fa fa-search"></i></button>
					</form>
				</div>
			</div>
		</nav>
	</div>
</header>