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

				{{	InsertForm::SearchForm("unicode","uniname",Asset('/st-admin/minis/mn_uni_acc/search'));	}}			

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
						<td><button class="btn btn-success" data-toggle="modal" data-target="#editUniModal" onclick="editUniForm({{$university->id}})">Edit</button></td>
						<td><button class="btn btn-danger" onclick="deleteUniForm({{$university->id}})">Delete</button></td>
					</tr>
					@endforeach
				</tbody>
				</table>
				<?php echo $universitys->links(); ?>
			</div>
		</div>
	</div>		
	
	{{	InsertForm::FileExport("exportExcelFile");	}}
	{{	InsertForm::FileExcel("importExcelFile",Asset('/st-admin/minis/mn_uni_acc/add/add_many')); }}
	{{	InsertForm::UniForm("addUniModal");	}}		
	{{	EditForm::UniForm("editUniModal");	}}
				
	<script type="text/javascript">
		function editUniForm(id){
			console.log(id);
			$.ajax({
                url : "{{Asset('/st-admin/minis/mn_uni_acc/edit')}}/"+id,
                type : "GET",
                data : {
                     // number : $('#number').val()
                },
                success : function (result){
                    var obj = jQuery.parseJSON(result);
                    console.log(result);	
                    $modal = $('#editUniModal').find('input');

                    $($modal[0]).val(obj.university.id);
                    $($modal[1]).val(obj.university.code); // cần add thêm
                    $($modal[2]).val(obj.university.name);
                    $($modal[3]).val(obj.university.info);
                }
            });
		}

		function deleteUniForm(id){

			$.ajax({
                url : "{{Asset('/st-admin/minis/mn_uni_acc/del')}}/"+id,
                type : "GET",
                data : {
                     // number : $('#number').val()
                },
                success : function (result){
		        	var url = window.location.href;
		            location.reload(url);
                    console.log(result);	
                    alert("delete success");
                }
            });
		}

		$('#editUniModal').submit(function(e)
		{
			console.log('ok');
		    var postData = $(this).serializeArray();
		    var formURL = $(this).attr("action");
		    $.ajax(
		    {
		        url : "{{Asset('/st-admin/minis/mn_uni_acc/update')}}",
		        type: "POST",
		        data : postData,
		        success:function(data, textStatus, jqXHR) 
		        {
		            //data: return data from server
		        	var url = window.location.href;
		            location.reload(url);
		        },
		        error: function(jqXHR, textStatus, errorThrown) 
		        {
		            //if fails      
		        }
		    });
		    e.preventDefault(); //STOP default action
		    // e.unbind(); //unbind. to stop multiple form submit.
		    $('#editUniModalclosebtn').click();
		});
		 
			// $('#editUniForm').submit(); //Submit  the FORM
			

		$('#addUniModal').submit(function(e)
		{
			console.log('ok');
		    var data1 = $(this).serializeArray();

		    // console.log(data1[0].value);
		    var data = {
		    	university:{
		    		code:data1[3].value,
		    		name:data1[4].value,
		    		info:data1[5].value
		    	},
		    	user:{
		    		username:data1[0].value,
		    		password:data1[1].value,
		    		email:data1[2].value
		    	}
		    };

		    $.ajax(
		    {
		        url : "{{Asset('st-admin/minis/mn_uni_acc/add/add_one')}}",
		        type: "POST",
		        data : data,
		        success:function(data, textStatus, jqXHR) 
		        {
		            //data: return data from server
					var url = window.location.href;		            
    				location.reload(url);
                    console.log(result);	
		            // alert("insert success");
		            
		        },
		        error: function(jqXHR, textStatus, errorThrown) 
		        {
		            //if fails      
		            // alert("insert fail");
					var url = window.location.href;		            
    				location.reload(url);
		            		        }
		    });
		    e.preventDefault(); //STOP default action
		    // e.unbind(); //unbind. to stop multiple form submit.
		    $('#editUniModalclosebtn').click();
		});
	</script>


@stop
