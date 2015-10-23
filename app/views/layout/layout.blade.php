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
</head>
<body>
	<!header outside class container because header in full screens>
	<header class='header'>
			@include('includes.header')
		
		<!-- navigator bar -->
			@yield('navigator')
		<!-- navigator different with different actor, and we in clude navigator in pages -->

	</header>
	
	<div class="container">
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


		<footer>
			@include('includes.footer')
		</footer>

	</div>
</body>
</html>