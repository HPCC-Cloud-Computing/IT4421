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

				<form class="form-inline">
					  <div class="form-group">
					    <input type="text" class="form-control" id="search_id" placeholder="Input id to search">
					  </div>
					  <div class="form-group">
					    <input type="text" class="form-control" id="search_name" placeholder="Input name to search">
					  </div>
					  <button type="submit" class="btn btn-info">Search</button>
					  <button type="submit" class="btn btn-default">Reset</button>
				</form>
				<br>
				<button type = "submit" class="btn btn-success" data-toggle="modal" data-target="#addStudentModal">Add new data</button> 
				<button type="submit" class="btn btn-primary">Export As Excel</button>
				<button type="submit" class="btn btn-danger">Import Data</button>
				<br>

				
				<br>
				<table class="table table-hover table-bordered table-striped table-responsive">
					<thead>
						<td>ID</td>
						<td>Usename</td>
						<td>Name</td>
						<td>Edit</td>
						<td>Delete</td>
					</thead>

					<tbody>
						<td>1</td>
						<td>SGDDTHaNoi</td>
						<td>So giao duc dao tao Ha Noi</td>
						<td><button type="button" class="btn btn-primary">Edit</button></td>
						<td><button type="button" class="btn btn-danger">Delete</button></td>
					</tbody>
					<tbody>
						<td>1</td>
						<td>SGDDTHaiDuong</td>
						<td>So giao duc dao tao Hai Duong</td>
						<td><button type="button" class="btn btn-primary">Edit</button></td>
						<td><button type="button" class="btn btn-danger">Delete</button></td>
					</tbody>

				</table>
			</div>
		</div>
	</div>
	

<!-- Modal -->
<div class="modal fade" id="addStudentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
	    <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Insert Form</h4>
	    </div>

	     <div class="modal-body">
	        <?php
	        	//label ,type, id ,name ,placeholder
	        	// user table
	        	modalFormGroup("Usename","text","","username","Username");
	        	modalFormGroup("Password","text","","Password","Password");
	        	modalFormGroup("Email","text","","email","Email");
	        	modalFixedFormGroup("Userable id","number","","userable_type_id",2);
	        	modalFixedFormGroup("Userable type","text","","userable_type","cluster");
				

				//cluster table
				modalFormGroup("Code","text","","cluscode","Code");
				modalFormGroup("Name","text","","clusname","Name");

				//depart table
				modalFormGroup("Code","text","","departcode","Code");
				modalFormGroup("Name","text","","departname","Name");

				//university table
				modalFormGroup("Code","text","","","");
				modalFormGroup("Name","text","","","");
				modalFormGroup("Information","text","","","");				

				//major table
				modalFormGroup("Code","text","","code","Code");
				modalFormGroup("University_id","int","","university_id","University_id");
				modalFormGroup("Name","text","","name","Name");
				modalFormGroup("Target","int","","target","Target");
				modalFormGroup("Combidation","text","","combidation","Combidation");
				modalFormGroup("Condition","text","","condition","Condition");
				modalFormGroup("Info","text","","info","Info");

				//Score
				modalFormGroup("Student ID","int","","","");
				modalFormGroup("Room_id","int","","","");
				modalFormGroup("Subject_id","int","","","");
				modalFormGroup("Score","","float","","");
				
				//Notices
				modalFormGroup("Title","text","","","");
				modalFormGroup("Content","text","","","");

				//phases
				modalFormGroup("Code","text","","","");
				modalFormGroup("Name","text","","","");


				//Room
				modalFormGroup("Code","text","","","");
				modalFormGroup("Address","text","","","");
				modalFormGroup("cluster_id","int","","","");

				//subject
				modalFormGroup("Code","text","","","");
				modalFormGroup("Name","text","","","");

				//
				modalFormGroup("","","","","");
				


	        	//students table

	        	modalFormGroup("Profile Code ","text","","profile_code","profile_code");
	        	modalFormGroup("Registration_number","text","","registration_number","registration_number");
	        	modalFormGroup("Lastname","text","","lastname","lastname");
	        	modalFormGroup("Firstname","text","","firstname","firstname");
	        	modalFormGroup("Email","text","","email","Email");
	        	modalFormGroup("Indentity_code","text","","indentity_code","indentity_code");
	        	modalFormGroup("Birthday","date","","birthday","birthday");
	        	modalFormGroup("Sex","text","","sex","sex");
	        	modalFormGroup("Plus_score","text","","plus_score","plus_score");
	        	modalFormGroup("Department_id","text","","department_id","department_id");


	  			
	        ?>
	      	<div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-success">Add</button>
	     </div>
    </div>
  </div>
</div>

<?php 
	function  modalFormGroup($label,$type,$id,$name,$placeholder){
		echo "<div class='form-group'>
				<label>".$label."</label>
				<input type=".$type." class='form-control' id='".$id."' name='".$name."' placeholder='".$placeholder."'>
			</div>";
	};

	function modalFixedFormGroup($label,$type,$id,$name,$value){
		echo "<div class='form-group'>
				<label>".$label."</label>
				<input type='".$type."' class='form-control' id='".$id."' name='".$name."' value='".$value."' readonly>
			</div>";	
	}
?>

<!-- </div>	 -->
@stop