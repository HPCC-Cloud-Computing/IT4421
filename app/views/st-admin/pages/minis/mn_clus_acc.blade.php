<!--deparment So giao duc-->
@extends('st-admin.layout.layout')

@section('title')
	Trang quan li cua BGDDT
@stop

@section('sidebar')

	@include('st-admin.includes.minis_sidebar')

	<script type="text/javascript">
		var element = document.getElementById("minis-menu").getElementsByTagName("li");
		element[4].classList.add("active");
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
				<button type = "submit" class="btn btn-success" data-toggle="modal" data-target="#addClusModal">Add new data</button> 
				<button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exportExcelFile">Export As Excel</button>
				<button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#importExcelFile">Import Data</button>
				<br>

				
				<br>
				<table class="table table-hover table-bordered table-striped table-responsive">
					
				<thead>
					<td>ID</td>
					<td>Mã Cụm</td>
					<td>Tên Cụm</td>
					<td>Action</td>
					<td>Action</td>
				</thead>
				<tbody>
					@foreach ($clusters as $cluster)
					<tr>
						<td>{{$cluster->id}}</td>
						<td>{{$cluster->code}}</td>
						<td>{{$cluster->name}}</td>
						<td><button class="btn btn-success" data-toggle="modal" data-target="#editClusModal" onclick="editClusForm({{$cluster->id}})">Edit</button></td>
						<td><button class="btn btn-danger" onclick="deleteClusForm({{$cluster->id}})">Delete</button></td>

					</tr>
					@endforeach
				</tbody>

				</table>
				<?php echo $clusters->links(); ?>
			</div>
		</div>
	</div>		{{	InsertForm::FileExport("exportExcelFile");	}}
				{{	InsertForm::FileExcel("importExcelFile"); }}
				{{	InsertForm::ClusForm("addClusModal");	}}			
				{{	EditForm::ClusForm("editClusModal");	}}
				
	<script type="text/javascript">
		function editClusForm(id){
			console.log(id);
			$.ajax({
                url : "{{Asset('/st-admin/minis/mn_clus_acc/edit')}}/"+id,
                type : "GET",
                data : {
                     // number : $('#number').val()
                },
                success : function (result){
                    
                    // console.log(result);	
                    var obj = jQuery.parseJSON(result);
                    // console.log(obj.cluster.name);
                    $modal = $('#editClusModal').find('input');
					
					$($modal[0]).val(obj.cluster.id);
                    $($modal[1]).val(obj.cluster.code); // cần add thêm
                    $($modal[2]).val(obj.cluster.name);
                }
            });
		}

		function deleteClusForm(id){

			$.ajax({
                url : "{{Asset('/st-admin/minis/mn_clus_acc/del')}}/"+id,
                type : "GET",
                data : {
                     // number : $('#number').val()
                },
                success : function (result){
                    
                    console.log(result);	
                    alert("delete success");
                }
            });
		}

		$('#editClusModal').submit(function(e)
		{
			console.log('ok');
		    var data = $(this).serializeArray();

		    var formURL = $(this).attr("action");
		    $.ajax(
		    {
		        url : "{{Asset('/st-admin/minis/mn_clus_acc/update')}}",
		        type: "POST",
		        data : data,
		        success:function(data, textStatus, jqXHR) 
		        {
		            //data: return data from server
		            location.reload();
		        },
		        error: function(jqXHR, textStatus, errorThrown) 
		        {
		            //if fails      
		        }
		    });
		    e.preventDefault(); //STOP default action
		    // e.unbind(); //unbind. to stop multiple form submit.
		    $('#editClusModalclosebtn').click();
		});
		 

		$('#addClusModal').submit(function(e)
		{
			// console.log('ok');
		    var data = $(this).serializeArray();

		    var formURL = $(this).attr("action");
		    $.ajax(
		    {
		        url : "{{Asset('/st-admin/minis/mn_clus_acc/add')}}",
		        type: "POST",
		        data : data,
		        success:function(data, textStatus, jqXHR) 
		        {
		            //data: return data from server
		            // location.reload();
		        },
		        error: function(jqXHR, textStatus, errorThrown) 
		        {
		            //if fails      
		        }
		    });
		    e.preventDefault(); //STOP default action
		    // e.unbind(); //unbind. to stop multiple form submit.
		    $('#editClusModalclosebtn').click();
		});
			

	</script>


@stop
