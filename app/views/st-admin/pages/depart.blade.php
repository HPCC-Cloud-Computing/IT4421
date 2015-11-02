<!--deparment So giao duc-->
@extends('st-admin.layout.layout')

@section('title')
	Trang quan li cua So Giao Duc
@stop

@section('content')
<!-- <div id="main"> -->

	<div id="content">
		<div class="row">
			<div class="col-lg-12">
				<button id="hideSidebar">
					<span class="glyphicon glyphicon-arrow-left"></span>
				</button>
				<button id="showSidebar">
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
				<button type = "submit" class="btn btn-success" data-toggle="modal" data-target="#addModal">Add new data</button> 
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
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
	    <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Insert Form</h4>
	    </div>

	     <div class="modal-body">
	        <div class="form-group">
				<label for="exampleInputEmail1">Name</label>
				<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
			</div>
		    <div class="form-group">
			    <label for="exampleInputEmail1">CMTND</label>
			    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
		  	</div>
		    <div class="form-group">
			    <label for="exampleInputEmail1">Address</label>
			    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
		  	</div>
	      	</div>
	      	<div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-success">Add</button>
	     </div>
    </div>
  </div>
</div>



	<script type="text/javascript">
		$('#showSidebar').click(function(e){
			e.preventDefault();
        	$("#main").removeClass("toggled");
		});
		$('#hideSidebar').click(function(e){
			e.preventDefault();
        	$("#main").addClass("toggled");
		})
	</script>	
<!-- </div>	 -->
@stop