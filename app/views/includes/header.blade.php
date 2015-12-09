<!-- header in clude banner -->
<!--banner -->
<div class="container">
	<h1 class="header-logo col-md-8 col-sm-8 logo hidden-xs">
		<a href="{{Asset('')}}">
			{{	HTML::image('/components/img/logo_title.png','logo_title',array( 'style' => 'max-width: 100%; max-height: 100%'))	}}
		</a>
	</h1>
	<h1 class="col-md-12 col-sm-12 logo visible-xs">
		<a href="{{Asset('')}}">
			{{	HTML::image('/components/img/logo_title.png','logo_title',array( 'style' => 'max-width: 100%; max-height: 100%'))	}}
		</a>
	</h1>
	<div class="header-info col-md-4 col-sm-4 hidden-xs">
		<!--cho nay la cho Xin chao va thanh search -->
		@if(Auth::check())
			@if(Auth::user()->userable_type=='student')
			<ul class="hello-user navbar-right">
				<li class="divider">
					<!-- Xin chào bạn <b>{{Student::find(Auth::user()->userable_id)->firstname.' '.Student::find(Auth::user()->userable_id)->lastname}}</b> -->
					Xin chào bạn <b>{{Auth::user()->userable->firstname.' '.Auth::user()->userable->lastname}}</b>
				</li>
				<li class="divider">
					<a href="{{Asset('/stu/change_pass')}}">Đổi mật khẩu</a>
				</li>
				<li>
					<a href="{{Asset('/logout')}}">Thoát</a>
				</li>
			</ul>
			@endif

			@if(Auth::user()->userable_type=='minister')
			<ul class="hello-user navbar-right">
				<li class="divider">
					Xin chào <b>AnhHP</b>
				</li>
				<li class="divider">
					<a href="#">Trang quản trị</a>
				</li>
				<li class="divider">
					<a href="#">Đổi mật khẩu</a>
				</li>
				<li>
					<a href="#">Thoát</a>
				</li>
			</ul>
			@endif
		@endif
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
<!--end of banner