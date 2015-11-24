<!--deparment So giao duc-->
@extends('st-admin.layout.layout')

@section('title')
	Trang quan li cua BGDDT
@stop

@section('sidebar')

	@include('st-admin.includes.minis_sidebar')

	<script type="text/javascript">
		var element = document.getElementById("minis-menu").getElementsByTagName("li");
		element[0].classList.add("active");
		console.log(element[0]);
	</script>

@stop

@section('content')
<!-- <div id="main"> -->

	<div class="content">
	
	</div>
	
<script>
//simple table


</script>
@stop
