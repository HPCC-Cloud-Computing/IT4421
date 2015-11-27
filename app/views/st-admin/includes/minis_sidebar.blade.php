	
	<div id="minis-sidebar" class="sidebar">
		<div class="user-menu">
			<span class="user-avatar"> {{	HTML::image('/components/img/user-avatar.png','logo_title',array( 'width' => '100%', 'height' => '100%' ))	}}</span>
			<ul>
				<li><a href="">Thông tin tài khoản</a></li>
				<li><a href="">Đăng xuất</a></li>
			</ul>
		</div>

		<ul id="minis-menu" class="wrapper">
			<li><a href="{{Asset('/st-admin/minis')}}">CHỨC NĂNG</a></li>
			<li><a href="{{Asset('/st-admin/minis/mn_schedule')}}">LẬP LỊCH CHO HỆ THỐNG</a></li>
			<li><a href="{{Asset('/st-admin/minis/score_floor_setup')}}">THIẾT LẬP ĐIỂM SÀN</a></li>
			<li><a href="{{Asset('/st-admin/minis/mn_depart_acc')}}">QUẢN LÝ TÀI KHOẢN CÁC SỞ</a></li>
			<li><a href="{{Asset('/st-admin/minis/mn_clus_acc')}}">QUẢN LÝ TÀI KHOẢN CÁC CỤM</a></li>
			<li><a href="{{Asset('/st-admin/minis/mn_uni_acc')}}">QUẢN LÝ TÀI KHOẢN CÁC TRƯỜNG</a></li>'
		</ul>
	</div>

	<!--end sidebar -->