<!--deparment So giao duc-->
@extends('st-admin.layout.layout')

@section('title')
	Trang quan li cua BGDDT
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

				<!-- Hien thi cac giai doan tuyen sinh -->
				<table class="table table-hover table-bordered table-striped table-responsive">
					<thead>
						<td>ID</td>
						<td>Giai doan</td>
						<td>Noi dung</td>
						<td>Trang thai</td>
						<td>Bat dau</td>
						<td>Ket thuc</td>
						<td>Thiet lap</td>
					</thead>

					<tbody>
						<td>1</td>
						<td>Truoc tuyen sinh</td>
						<td>Chuan bi tai khoan cho cac so, truong, cum</td>
						<td>Tu dong</td>
						<td>01/04/2015 0:00</td>
						<td>15/04/2015 24:00</td>
						<td><button type="button" class="btn btn-primary">Edit</button></td>
					</tbody>
					<tbody>
						<td>1</td>
						<td>Truoc tuyen sinh</td>
						<td>Chuan bi tai khoan cho cac so, truong, cum</td>
						<td>Tu dong</td>
						<td>01/04/2015 0:00</td>
						<td>15/04/2015 24:00</td>
						<td><button type="button" class="btn btn-primary">Edit</button></td>
					</tbody>
					<tbody>
						<td>1</td>
						<td>Truoc tuyen sinh</td>
						<td>Chuan bi tai khoan cho cac so, truong, cum</td>
						<td>Tu dong</td>
						<td>01/04/2015 0:00</td>
						<td>15/04/2015 24:00</td>
						<td><button type="button" class="btn btn-primary">Edit</button></td>
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
	        	//label type id name placeholder
	        	// user table
	        	modalFormGroup("Usename","text","","username","Username");
	        	modalFormGroup("Password","text","","Password","Password");
	        	modalFormGroup("Email","text","","email","Email");
	        	modalFixedFormGroup("Userable id","number","","userable_id",2);
	        	modalFixedFormGroup("Userable type","text","","userable_type","student");

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