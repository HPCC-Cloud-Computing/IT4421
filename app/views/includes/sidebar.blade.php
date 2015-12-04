<?php
//side bar o ben phai cua man hinh
?>

@if(!Auth::check())
<div class="panel">
	<div class="panel-title"> <i class="fa fa-sign-in"></i>
		Đăng nhập
	</div>
	<div class="panel-body">
		<form method="post" action="{{Asset('/login')}}" id="form-login">
			<div class="div-row">
				<div class="input-group">
					<span class="input-group-addon" id="username-addon"> <i class="fa fa-user"></i>
					</span>
					<input type="text" name="username" id="username" placeholder="Tên đăng nhập" aria-describedby="username-addon" onkeypress="login_keypress(event);" />
				</div>
				<p id="username-error-mess" style="display:none"></p>
			</div>
			<div class="div-row">
				<div class="input-group">
					<span class="input-group-addon" id="password-addon" style="font-size: 16px">
						<i class="fa fa-lock"></i>
					</span>
					<input type="password" name="password" id="password" placeholder="Mật khẩu" aria-describedby="password-addon" onkeypress="login_keypress(event);" />
				</div>
				<p id="password-error-mess" style="display:none"></p>
			</div>
			<div class="div-row">
				<p id="login-error-mess" style="display:none"></p>
			</div>
			<input type="submit" id="btn-login" class="btn" style="width: 100%; text-transform: uppercase;" value="Đăng nhập" />
		</form>
	</div>
</div>

<script type="text/javascript">
	function login_keypress(e){
		if(e.keyCode == 13)
			login_click();
	}
	function login_click(){
		var username = $('input[name="username"]').val(),
			password = $('input[name="password"]').val(),
			check = 1;
		if(username == null || username ==''){
			$("#username-error-mess").css({"color":"red","display":"block"});
			$("#username-error-mess").html('Mời bạn nhập username');
			check = 0;
		}
		if(password == null || password ==''){
			$("#password-error-mess").css({"color":"red","display":"block"});
			$("#password-error-mess").html('Mời bạn nhập password');
			check = 0;
		}

		if(check){
			$.ajax({
				type: "POST",
				url: "{{url('/login')}}",
				cache: false,
				data: {username: username, password: password},
				success: function(data){
					console.log(data);
					if (data=="false"){
						$("#login-error-mess").css({"color":"red","display":"block"});
						$("#login-error-mess").html('Tai khoan khong chinh xac');
					}
					else{
						window.location.href = '{{Asset('/')}}';
					}
				}
			});
		}
		return false;
	}
</script>
@endif

<div class="panel">
	<div class="panel-title"> <i class="fa fa-calendar"></i>
		Sự kiện
	</div>
	<div class="panel-body" style="padding: 0">
		<div class="main-news">
			<ul class="news">
			@foreach (Phase::all() as $phase)
				<li class="divider">
					<div class="news-item">
						<div class="news-title-sm">
							<a href="#">{{$phase->name}}</a>
						</div>
						<div class="news-detail">
							<i class="fa fa-clock-o"></i>
							{{$phase->starttime}} - {{$phase->endtime}}
						</div>
					</div>
				</li>
			</ul>
			@endforeach
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