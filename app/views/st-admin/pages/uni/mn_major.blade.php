<!--deparment So giao duc-->
@extends('st-admin.layout.layout')

@section('title')
	Trang quan li cua Cum Thi
@stop

@section('sidebar')

	@include('st-admin.includes.uni_sidebar')

	<script type="text/javascript">
		var element = document.getElementById("uni-menu").getElementsByTagName("li");
		element[1].classList.add("active");
		// console.log(element[0]);
	</script>

@stop

@section('content')
<!-- <div id="main"> -->
	 <div id="main"> -->

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

				{{	InsertForm::SearchForm("majorid","majorname");	}}			


				<br>
				<button type = "submit" class="btn btn-success" data-toggle="modal" data-target="#addMajorModal">Add new data</button> 
				<button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exportExcelFile">Export As Excel</button>
				<button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#importExcelFile">Import Data</button>
				<br>

				
				<br>
				<table class="table table-hover table-bordered table-striped table-responsive">
					
				<thead>
					<td>ID</td>
					<td>Mã ngành</td>
					<td>Tên ngành</td>
					<td>Chỉ tiêu</td>
					<td>Action</td>
					<td>Action</td>
				</thead>
				<tbody>

					@foreach ($majors as $major)
					<tr>
						<td>{{$major->id}}</td>
						<td>{{$major->code}}</td>
						<td>{{$major->name}}</td>
						<td>{{$major->target}}</td>
						<td><button class="btn btn-success" data-toggle="modal" data-target="#editMajorModal" onclick="editMajorForm({{$major->id}})">Edit</button></td>
						<td><button class="btn btn-danger" onclick="deleteMajorForm({{$major->id}})">Delete</button></td>

					</tr>
					@endforeach

				</tbody>

				</table>

			</div>
		</div>
	</div>		{{	InsertForm::FileExport("exportExcelFile");	}}
				{{	InsertForm::FileExcel("importExcelFile"); }}
				{{	InsertForm::Major("addMajorModal");	}}			
				{{	InsertForm::Major("editMajorModal");	}}
				
	<script type="text/javascript">
		function editMajorForm(id){
			console.log(id);
			$.ajax({
                url : "{{Asset('/st-admin/uni/mn_major_acc/edit')}}/"+id,
                type : "GET",
                data : {
                     // number : $('#number').val()
                },
                success : function (result){
                    
                    console.log(result);	
                    $modal = $('#editMajorModal').find('input');

                    $($modal[0]).val("zyz"); // cần add thêm
                }
            });
		}

		function deleteMajorForm(id){

			$.ajax({
                url : "{{Asset('/st-admin/uni/mn_major_acc/del')}}/"+id,
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

		$('#editMajorModal').submit(function(e)
		{
			console.log('ok');
		    var postData = $(this).serializeArray();
		    var formURL = $(this).attr("action");
		    $.ajax(
		    {
		        url : "{{Asset('/st-admin/uni/mn_major_acc/update')}}",
		        type: "POST",
		        data : postData,
		        success:function(data, textStatus, jqXHR) 
		        {
		            //data: return data from server
		        },
		        error: function(jqXHR, textStatus, errorThrown) 
		        {
		            //if fails      
		        }
		    });
		    e.preventDefault(); //STOP default action
		    // e.unbind(); //unbind. to stop multiple form submit.
		    $('#editMajorModalclosebtn').click();
		});
		 
			// $('#editMajorForm').submit(); //Submit  the FORM
			

	</script>				


@stop
