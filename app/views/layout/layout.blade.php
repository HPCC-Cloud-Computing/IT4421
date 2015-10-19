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

<<!DOCTYPE html>
<html>
<head>
	@include('inludes.head')
</head>
<body>
	<div class="container">

		<header class='row'>
			@include('includes.header')
		</header>


		<div id='main' class='row'>
			<!mail content>
			<div id='content' class='col-md-8'>
				@yield('content')		
			</div>
			
			<!sidebar content>
			<div id="sidebar" class='col-md-4'>
				@include('includes.sidebar')
			</div>

		</div>


		<footer class='row'>
			@include('includes.footer')
		</footer>

	</div>
</body>
</html>