<!DOCTYPE html>
<html>
<head>
	@include('st-admin.includes.head')
</head>
<body>
	<header class="header">
		@include('st-admin.includes.header')
	</header>
	
	<div id="main">
		<!-- Menu manager-->
		<div class="col-md-2">
			@include('st-admin.includes.sidebar');
		</div>

		<!-- Content-->
		<div class="col-md-10">
			@yield('content')
		</div>
	</div>
	
	<footer>
		@include('st-admin.includes.footer');
	</footer>

</body>
</html>