<?php
//side bar o ben phai cua man hinh
?>
@if(!Session::has('user'))
<div class="panel">
	<div class="panel-title"> <i class="fa fa-sign-in"></i>
		Đăng nhập
	</div>
	<div class="panel-body">
		<form method="post" action="{{Asset('')}}" id="form-login">
			<div class="div-row">
				<div class="input-group">
					<span class="input-group-addon" id="username-addon"> <i class="fa fa-user"></i>
					</span>
					<input type="text" name="username" id="username" placeholder="Tên đăng nhập" aria-describedby="username-addon" />
				</div>
			</div>
			<div class="div-row">
				<div class="input-group">
					<span class="input-group-addon" id="password-addon" style="font-size: 16px">
						<i class="fa fa-lock"></i>
					</span>
					<input type="password" name="password" id="password" placeholder="Mật khẩu" aria-describedby="password-addon" />
				</div>
			</div>
			<input type="submit" class="btn" style="width: 100%; text-transform: uppercase;" name="" value="Đăng nhập" />
		</form>
	</div>
</div>
@endif
<div class="panel">
	<div class="panel-title">
		<i class="fa fa-calendar"></i>
		Sự kiện
	</div>
	<div class="panel-body" style="padding: 0">
		<div class="main-news">
			<ul class="news">
				<li class="divider">
					<div class="news-item">
						<div class="news-title-sm">
							<a href="#">Event 1</a>
						</div>
						<div class="news-detail">
							<i class="fa fa-clock-o"></i>
							30/10/2015 - 15/11/2015
						</div>
					</div>
				</li>
				<li class="divider">
					<div class="news-item">
						<div class="news-title-sm">
							<a href="#">Event 2</a>
						</div>
						<div class="news-detail">
							<i class="fa fa-clock-o"></i>
							30/10/2015 - 15/11/2015
						</div>
					</div>
				</li>
				<li class="divider">
					<div class="news-item">
						<div class="news-title-sm">
							<a href="#">Event 3</a>
						</div>
						<div class="news-detail">
							<i class="fa fa-clock-o"></i>
							30/10/2015 - 15/11/2015
						</div>
					</div>
				</li>
			</ul>
			<nav class="pagination">
				<ul class="cd-pagination">
					<li class="btn-prev">
						<a href="#0">
							<i class="fa fa-chevron-left"></i>
						</a>
					</li>
					<li>
						<a class="current" href="#0">1</a>
					</li>
					<li>
						<a href="#0">2</a>
					</li>
					<li>
						<a href="#0">3</a>
					</li>
					<li class="btn-next">
						<a href="#0">
							<i class="fa fa-chevron-right"></i>
						</a>
					</li>
				</ul>
			</nav>
			<!-- cd-pagination-wrapper -->
		</div>
	</div>
</div>