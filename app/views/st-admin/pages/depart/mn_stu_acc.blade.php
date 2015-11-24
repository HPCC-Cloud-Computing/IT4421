<!--deparment So giao duc-->
@extends('st-admin.layout.layout')

@section('title')
	Trang quan li cua BGDDT
@stop

@section('sidebar')

	@include('st-admin.includes.depart_sidebar')

	<script type="text/javascript">
		var element = document.getElementById("minis-menu").getElementsByTagName("li");
		element[1].classList.add("active");
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

				{{	InsertForm::SearchForm("clusid","clusname");	}}			


				<br>
				<button type = "submit" class="btn btn-success" data-toggle="modal" data-target="#addStuModal">Add new data</button> 
				<button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exportExcelFile">Export As Excel</button>
				<button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#importExcelFile">Import Data</button>
				<br>

				
				<br>
				<table class="table table-hover table-bordered table-striped table-responsive">
					
				<thead>
					<td>ID</td>
					<td>Số báo danh</td>
					<td>Tên thí sinh</td>
					<td>Action</td>
					<td>Action</td>
				</thead>
				<tbody>
					<td>1</td>
					<td>BKA14008</td>
					<td>Nguyễn Tuấn Kiên</td>
					<td><button class="btn btn-success">Edit</button></td>
					<td><button class="btn btn-danger">Delete</button></td>
				</tbody>

				</table>
					<ul class="pagination">
					  <li><a href="#">1</a></li>
					  <li><a href="#">2</a></li>
					  <li><a href="#">3</a></li>
					  <li><a href="#">4</a></li>
					  <li><a href="#">5</a></li>
					</ul>
			</div>
		</div>
	</div>		{{	InsertForm::FileExport("exportExcelFile");	}}
				{{	InsertForm::FileExcel("importExcelFile"); }}
				{{	InsertForm::Student("addStuModal");	}}			


@stop
