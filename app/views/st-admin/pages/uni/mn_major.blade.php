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

				{{	InsertForm::SearchForm("majorcode","majorname",Asset('/st-admin/uni/mn_major/search'));	}}			


				<br>
				<button type = "submit" class="btn btn-success" data-toggle="modal" data-target="#addMajorModal">Add new data</button> 
				<button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exportExcelFile">Export As Excel</button>
<!-- 				<button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#importExcelFile">Import Data</button> -->
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
	</div>		
	{{	InsertForm::FileExport("exportExcelFile",Asset('/st-admin/uni/mn_major/export_majors'));	}}

	{{	InsertForm::Major("addMajorModal");	}}			
	{{	EditForm::Major("editMajorModal");	}}
				
	<script type="text/javascript">

		function editMajorForm(id){
			console.log(id);
			$.ajax({
                url : "{{Asset('/st-admin/uni/mn_major/edit')}}/"+id,
                type : "GET",
                data : {
                     // number : $('#number').val()
                },
                success : function (result){
                    
                    console.log(result);	
                    var obj = jQuery.parseJSON(result);
                    // console.log(obj.cluster.name);
                    $modal = $('#editMajorModal').find('input');
                    // console.log(obj.major.code);
                    // $($modal[0]).val("ãy");
                    $($modal[0]).val(obj.major.id); // cần add thêm
                    $($modal[1]).val(obj.major.code);
                    $($modal[2]).val(obj.major.university_id);
                    $($modal[3]).val(obj.major.name);
                    $($modal[4]).val(obj.major.target);
                    $($modal[5]).val(obj.major.combidation);
                    $($modal[6]).val(obj.major.condition);
                    $($modal[7]).val(obj.major.info);
                }
            });
		}

		function deleteMajorForm(id){

			$.ajax({
                url : "{{Asset('/st-admin/uni/mn_major/del')}}/"+id,
                type : "GET",
                data : {
                     // number : $('#number').val()
                },
                success : function (result){
		        	// var url = window.location.href;
		            // location.reload(url);
                    console.log(result);	
                    // alert("delete success");
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
		        url : "{{Asset('/st-admin/uni/mn_major/update')}}",
		        type: "POST",
		        data : postData,
		        success:function(data, textStatus, jqXHR) 
		        {
		            //data: return data from server
		            alert('success');
		            console.log(data);
		            var url = window.location.href;
		            location.reload(url);
		        },
		        error: function(jqXHR, textStatus, errorThrown) 
		        {
		            //if fails     
		            alert('fail');
		            console.log(jqXHR);
		        	var url = window.location.href;
		            location.reload(url);		             
		        }
		    });
		    e.preventDefault(); //STOP default action
		    // e.unbind(); //unbind. to stop multiple form submit.
		    $('#editMajorModalclosebtn').click();
		});

		$('#addMajorModal').submit(function(e)
		{
			// console.log('ok');
		    var data = $(this).serializeArray();

		    // console.log(data1[0].value);
		    $.ajax(
		    {
		        url : "{{Asset('/st-admin/uni/mn_major/add')}}",
		        type: "POST",
		        cache: false,
		        data : data,
		        success:function(data, textStatus, jqXHR) 
		        {
		            //data: return data from server
		            // location.reload();
		            alert('insert success');
		            console.log(data);
		            var url = window.location.href;
		            location.reload(url);
		        },
		        error: function(jqXHR, textStatus, errorThrown) 
		        {
		            //if fails      
		            // alert('insert fails');
		            alert('insert fails');
		            console.log(jqXHR);
		        	var url = window.location.href;
		            location.reload(url);		            
		        }
		    });
		    e.preventDefault(); //STOP default action
		    // e.unbind(); //unbind. to stop multiple form submit.
		    $('#addMajorModalclosebtn').click();
		});
		 
			// $('#editMajorForm').submit(); //Submit  the FORM
			

	</script>				
@stop
