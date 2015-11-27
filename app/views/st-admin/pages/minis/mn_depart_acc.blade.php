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

				{{	InsertForm::SearchForm("departid","departname");	}}			

				<br>
				<button type = "submit" class="btn btn-success" data-toggle="modal" data-target="#addDepartModal">Add new data</button> 
				<button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exportExcelFile">Export As Excel</button>
				<button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#importExcelFile">Import Data</button>
				<br>

				
				<br>
				<table class="table table-hover table-bordered table-striped table-responsive">
					
				<thead>
					<td>ID</td>
					<td>Mã sở</td>
					<td>Tên sở</td>
					<td>Action</td>
					<td>Action</td>
				</thead>
				<tbody>
					@foreach ($depts as $dept)
					<tr>
						<td>{{$dept->id}}</td>
						<td>{{$dept->code}}</td>
						<td>{{$dept->name}}</td>
						<td><button class="btn btn-success" data-toggle="modal" data-target="#editDepartModal" onclick="editDepartForm({{$dept->id}})">Edit</button></td>
						<td><button class="btn btn-danger">Delete</button></td>
					</tr>
					@endforeach

				</tbody>

				</table>
				<?php echo $depts->links(); ?>
			</div>
		</div>
	</div>		{{	InsertForm::FileExport("exportExcelFile");	}}
				{{	InsertForm::FileExcel("importExcelFile"); }}
				{{	InsertForm::DepartForm("addDepartModal");	}}		
				{{	InsertForm::DepartForm("editDepartModal");	}}
				<script type="text/javascript">
					function editDepartForm(id){
						console.log(id);
						$.ajax({
		                    url : "{{Asset('/st-admin/minis/mn_depart_acc/edit')}}/"+id,
		                    type : "GET",
		                    data : {
		                         // number : $('#number').val()
		                    },
		                    success : function (result){
		                        // $('#result').html(result);
		                        
		                        console.log(result);	
		                        $modal = $('#editDepartModal').find('input');
		                        // console.log($modal[0]);
		                        $($modal[0]).val("zyz");
		                        // var form = document.getElementById("editDepartModal").find("input");
		                        // console.log(form);
		                    }
		                });
					}

				</script>

@stop
