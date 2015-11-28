<!--deparment So giao duc-->
@extends('st-admin.layout.layout')

@section('title')
	Trang quan li cua BGDDT
@stop

@section('sidebar')

	@include('st-admin.includes.minis_sidebar')

	<script type="text/javascript">
		var element = document.getElementById("minis-menu").getElementsByTagName("li");
		element[2].classList.add("active");
	</script>

@stop

@section('content')
<div class="content">
	<form>
	<div class="form-group">
		<label>Thiết lập điểm sàn</label>
		<input type="text" class="form-control" place-holder="Điểm sàn" />
		<button type="submit" class="btn btn-success">Thiết lập</button>
	</div>

	</form>

	<div class="score">
		
	</div>

</div> 	
@stop