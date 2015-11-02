<!DOCTYPE html>
<html>
<head>
	@include('st-admin.includes.head')
</head>
<body>
	<header class="header">
		
	</header>	
	<div id="main">
		@include('st-admin.includes.sidebar')
		@yield('content')
	</div>
	<footer>
		@include('st-admin.includes.footer')
	</footer>

</body>
</html>