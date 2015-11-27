<!--deparment So giao duc-->
@extends('st-admin.layout.layout')

@section('title')
	Trang quan li cua BGDDT
@stop

@section('sidebar')

	@include('st-admin.includes.minis_sidebar')

	<script type="text/javascript">
		var element = document.getElementById("minis-menu").getElementsByTagName("li");
		element[5].classList.add("active");
	</script>

@stop

@section('content')
<!-- <div id="main"> -->

	<div class="content">
		<div class="row">
			<div class="col-lg-12">
				<button class="hideSidebar">
					<span class="glyphicon glyphicon-arrow-left"></span>
				</button>
				<button class="showSidebar">
					<span class="glyphicon glyphicon-arrow-right"></span>     
			    </button>
				
				<br>
				<br>

				{{	InsertForm::SearchForm("departid","departname");	}}			

				<br>
				<button type = "submit" class="btn btn-success" data-toggle="modal" data-target="#addUniModal">Add new data</button> 
				<button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exportExcelFile">Export As Excel</button>
				<button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#importExcelFile">Import Data</button>
				<br>

				
				<br>
				<table class="table table-hover table-bordered table-striped table-responsive">
				<thead>
					<td>ID</td>
					<td>Mã trường</td>
					<td>Tên trường</td>
					<td>Action</td>
					<td>Action</td>
				</thead>
				<tbody>
					@foreach ($universitys as $university)
					<tr>
						<td>{{$university->id}}</td>
						<td>{{$university->code}}</td>
						<td>{{$university->name}}</td>
						<td><button class="btn btn-success">Edit</button></td>
						<td><button class="btn btn-danger">Delete</button></td>
					</tr>
					@endforeach
				</tbody>
				</table>
				<?php echo $universitys->links(); ?>
			</div>
		</div>
	</div>		
	
	{{	InsertForm::FileExport("exportExcelFile");	}}
	{{	InsertForm::FileExcel("importExcelFile"); }}
	{{	InsertForm::DepartForm("addUniModal");	}}		


@stop
