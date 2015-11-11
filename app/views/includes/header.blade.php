<!-- header in clude banner -->
<!--banner -->
<div class="container">
	<h1 class="header-logo col-md-8 col-sm-8 logo">
		<a href="/">
			{{	HTML::image('/components/img/logo_title.png','logo_title',array( 'max-width' => '100%', 'max-height' => '100%' ))	}}
		</a>
	</h1>
	<div class="header-info col-md-4 col-sm-4 hidden-xs">
		<!--cho nay la cho Xin chao va thanh search -->

		<ul class="hello-user navbar-right">
			<li class="divider">
				Xin chào bạn <b>Nguyễn Văn A</b>
			</li>
			<li>
				<a href="#">Thoát</a>
			</li>
		</ul>
		<br />

		<div class="form-group input-group" style="margin-top: 25px; float: right">
			<input type="text" style="width: 200px; height: 28px" placeholder="Nhập từ khóa...">
			<span class="input-group-btn">
				<button class="btn btn-search" type="button"> <i class="fa fa-search"></i>
				</button>
			</span>
		</div>
	</div>
</div>
<!--end of banner-->