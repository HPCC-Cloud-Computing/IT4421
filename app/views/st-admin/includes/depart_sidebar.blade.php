
<div class="sidebar">
	<div class="user-menu">
		<span class="user-avatar"> {{	HTML::image('/components/img/user-avatar.png','logo_title',array( 'width' => '100%', 'height' => '100%' ))	}}</span>
		<ul>
			<li><a href="{{ Asset('/logout')}}">Đăng xuất</a></li>
		</ul>
	</div>
	<ul id="depart-menu" class="wrapper">
		<li><a href="{{Asset('/st-admin/depart')}}">CHỨC NĂNG</a></li>
		<li><a href="{{Asset('/st-admin/depart/mn_stu_acc')}}">QUẢN LÍ TÀI KHOẢN THÍ SINH</a></li>
		<li><a href="{{Asset('/st-admin/depart/syn_result')}}">TỔNG HỢP KẾT QUẢ THI</a></li>
	</ul>
</div>

<!--end sidebar -->
