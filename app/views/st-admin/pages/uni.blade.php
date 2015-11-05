<!--deparment So giao duc-->
@extends('st-admin.layout.layout')

@section('title')
	Trang quan li cua Truong dai hoc
@stop


@section('content')
<!-- <div id="main"> -->
	
	<!-- sidebar -->
	<div id="sidebar" class="">
		<div class="user-menu">
			<span id="user-avatar"> {{	HTML::image('/components/img/user-avatar.png','logo_title',array( 'width' => '100%', 'height' => '100%' ))	}}</span>
			<ul>
				<li><a href="">Thông tin tài khoản</a></li>
				<li><a href="">Đăng xuất</a></li>
			</ul>
		</div>

		<ul class="wrapper">
			<li><a href="#">CHUC NANG</a></li>
			<li><a href="#">QUẢN LÍ NGÀNH VÀ CHỈ TIÊU</a></li>
		</ul>
	</div>

	<!--end sidebar -->

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
					    <input type="text" class="form-control" id="id" placeholder="Input id to search">
					  </div>
					  <div class="form-group">
					    <input type="email" class="form-control" id="name" placeholder="Input name to search">
					  </div>
					  <button type="submit" class="btn btn-info">Search</button>
					  <button type="submit" class="btn btn-default">Reset</button>
				</form>
				<br>
				<button type = "submit" class="btn btn-success" data-toggle="modal" data-target="#addSectionModal">Add new data</button> 
				<button type="submit" class="btn btn-primary">Export As Excel</button>
				<button type="submit" class="btn btn-danger">Import Data</button>
				<br>

				
				<br>
				<table class="table table-hover table-bordered table-striped table-responsive">
					<thead>
						<td>ID</td>
						<td>Usename</td>
						<td>CNTND</td>
						<td>Edit</td>
						<td>Delete</td>
					</thead>

					<tbody>
						<td>1</td>
						<td>Bui Ngoc Luan</td>
						<td>9</td>
						<td><button type="button" class="btn btn-primary">Edit</button></td>
						<td><button type="button" class="btn btn-danger">Delete</button></td>
					</tbody>
					<tbody>
						<td>2</td>
						<td>Bui Ngoc Luan</td>
						<td>9</td>
						<td><button type="button" class="btn btn-primary">Edit</button></td>
						<td><button type="button" class="btn btn-danger">Delete</button></td>
					</tbody>
					<tbody>
						<td>3</td>
						<td>Bui Ngoc Luan</td>
						<td>9</td>
						<td><button type="button" class="btn btn-primary">Edit</button></td>
						<td><button type="button" class="btn btn-danger">Delete</button></td>
					</tbody>

				</table>
			</div>
		</div>
	</div>
	
<!-- Modal -->
<div class="modal fade" id="addSectionModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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