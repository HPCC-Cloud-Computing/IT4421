<?php
/*layout chung trong project 
 *gom co 
 		header
 			--banner
 			--navigator
 		body
 			--content --sidebar
 		footer	
*/
?>

<!DOCTYPE html>
<html>
<head>
	@include('includes.head')
	@yield('style')
	@yield('javascript')
</head>
<body>
	<!--header outside class container because header in full screens-->
	<header class='header'>
			@include('includes.header')
		
		<!-- navigator bar -->
		@if(Auth::check())
			@if(Auth::user()->userable_type == 'student')
				@include('includes.nav_user')
			@else
				@include('includes.nav_guest')
			@endif
		@else
			@include('includes.nav_guest')
		@endif
		<!-- navigator different with different actor, and we in clude navigator in pages -->

	</header>
	@if(Session::has('message'))
	<p style="margin-top:-10px" class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
	@endif
	<div class="container content">
		@yield('breadcrumbs')
	</div>
	
	{{-- Content --}}
	<div class="container content" style="min-height: 300px">
		<div id='main' class='row'>
			<!--main content-->
			<div id='content' class='content-left col-xs-12 col-sm-9 col-md-9'>
				@yield('content')		
			</div>
			
			<!--sidebar content-->
			<div id="sidebar" class='sidebar-right col-xs-12 col-sm-3 col-md-3'>
				@include('includes.sidebar')
			</div>

		</div>
	</div>

	{{-- Footer --}}
	<footer class="footer">
		@include('includes.footer')
	</footer>

</body>
</html>