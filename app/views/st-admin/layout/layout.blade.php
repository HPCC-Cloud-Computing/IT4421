<!DOCTYPE html>
<html>
<head>
	@include('st-admin.includes.head')
</head>
<body>
	<header class="header">
		
	</header>	
	<div id="main">

	
	@if(Session::has('message'))
	<p class="alert {{ Session::get('alert-class', 'alert-info') }}" style="margin-bottom:0">{{ Session::get('message') }}</p>
	@endif

		@yield('sidebar')

		@yield('content')				

	</div>
	<footer>
		@include('st-admin.includes.footer')
	</footer>

</body>
</html>