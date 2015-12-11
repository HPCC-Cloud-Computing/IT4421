<div  class="sidebar">
	<div class="user-menu">
		<span class="user-avatar"> {{	HTML::image('/components/img/user-avatar.png','logo_title',array( 'width' => '100%', 'height' => '100%' ))	}}</span>
		<ul>
			
			<li><a href="{{ Asset('/logout')}}">Đăng xuất</a></li>
		</ul>
	</div>

	<ul id="clus-menu" class="wrapper">
		<li><a href="{{ Asset('/st-admin/clus')}}">CHỨC NĂNG</a></li>
		<li><a href="{{	Asset('/st-admin/clus/mn_stu_acc')}}">QUẢN LÍ TÀI KHOẢN THÍ SINH</a></li>
		<li><a href="{{ Asset('/st-admin/clus/score')}}">CẬP NHẬT ĐIỂM THI</a></li>
		<li><a href="{{	Asset('/st-admin/clus/syn_result')}}">TỔNG HỢP KẾT QUẢ THI</a></li>
	</ul>
</div>

<!--end sidebar -->