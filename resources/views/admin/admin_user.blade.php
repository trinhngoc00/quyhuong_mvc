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
				<h2 align="center">Người dùng</h2>
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
						<td><?php echo $row['id'];?></td>
						<td><?php echo $row['username'];?></td>
						<td><?php echo $row['name'];?></td>
						<td><?php echo $row['address'];?></td>
						<td><?php echo $row['phone'];?></td>
						<td><a href="update.php?id=<?php echo $row['id'];?>&flag=user">Sửa</a></td>
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