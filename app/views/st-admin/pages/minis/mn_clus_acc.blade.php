<!--deparment So giao duc-->
@extends('st-admin.layout.layout')

@section('title')
	Trang quan li cua BGDDT
@stop

@section('sidebar')

	@include('st-admin.includes.minis_sidebar')

	<script type="text/javascript">
		var element = document.getElementById("minis-menu").getElementsByTagName("li");
		element[3].classList.add("active");
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
				<button type = "submit" class="btn btn-success" data-toggle="modal" data-target="#addClusterModal">Add new data</button> 
				<button type="submit" class="btn btn-primary">Export As Excel</button>
				<button type="submit" class="btn btn-danger">Import Data</button>
				<br>

				
				<br>
				<table class="table table-hover table-bordered table-striped table-responsive">
					


				</table>
			</div>
		</div>
	</div>
		
				{{	InsertForm::ClusterForm("addClusterModal");	}}		


@stop
