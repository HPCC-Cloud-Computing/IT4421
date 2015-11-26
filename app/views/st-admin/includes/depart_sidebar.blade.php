
<!-- sidebar -->
<?php
$host = "http://localhost/IT4421/public";
?>
<div class="sidebar">
	<div class="user-menu">
		<span class="user-avatar"> {{	HTML::image('/components/img/user-avatar.png','logo_title',array( 'width' => '100%', 'height' => '100%' ))	}}</span>
		<ul>
			<li><a href="">Thông tin tài khoản</a></li>
			<li><a href="">Đăng xuất</a></li>
		</ul>
	</div>

	<ul class="wrapper">
	<?php echo '
		<li><a href="'.$host.'/st-admin/depart">CHỨC NĂNG</a></li>
		<li><a href="'.$host.'/st-admin/depart/mn_stu_acc">QUẢN LÍ TÀI KHOẢN THÍ SINH</a></li>';
	?>
	</ul>
</div>

<!--end sidebar -->
