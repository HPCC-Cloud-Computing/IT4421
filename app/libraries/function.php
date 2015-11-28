<?php 
class InsertForm{

	public static function SearchForm($search_id,$search_name){
		echo'
				<form class="form-inline">
					  <div class="form-group">
					    <input type="text" class="form-control" id="'.$search_id.'" placeholder="Input id to search">
					  </div>
					  <div class="form-group">
					    <input type="text" class="form-control" id="'.$search_name.'" placeholder="Input name to search">
					  </div>
					  <button type="submit" class="btn btn-info">Search</button>
					  <button type="submit" class="btn btn-default">Reset</button>
				</form>
			';
	}
// Modal Form Group: label type id name placeholder
//id truyen vao la id cua Modal. trong button Data-target = id.
	public static function ClusterForm($id){
		InsertForm:: insertFormHeader($id);
		InsertForm:: modalFormGroup("Usename","text","","username","Username");
    	InsertForm:: modalFormGroup("Password","text","","password","Password");
    	InsertForm:: modalFormGroup("Email","text","","email","Email");
    	InsertForm:: modalFixedFormGroup("Userable id","number","","userable_type_id",2);
    	InsertForm:: modalFixedFormGroup("Userable type","text","","userable_type","cluster");
		//cluster table
		InsertForm:: modalFormGroup("Code","text","","cluscode","Code");
		InsertForm:: modalFormGroup("Name","text","","clusname","Name");
		InsertForm:: insertFormFooter();

	}

//id truyen vao la id cua Modal. trong button Data-target = id.
	public static function DepartForm($id){
		InsertForm:: insertFormHeader($id);
		InsertForm:: modalFormGroup("Usename","text","","username","Username");
    	InsertForm:: modalFormGroup("Password","text","","password","Password");
    	InsertForm:: modalFormGroup("Email","text","","email","Email");
    	InsertForm:: modalFixedFormGroup("Userable id","number","","userable_type_id",2);
    	InsertForm:: modalFixedFormGroup("Userable type","text","","userable_type","cluster");
		//cluster table
		InsertForm:: modalFormGroup("Code","text","","cluscode","Code");
		InsertForm:: modalFormGroup("Name","text","","clusname","Name");
		InsertForm:: insertFormFooter();
	}

//id truyen vao la id cua Modal. trong button Data-target = id.
	public static function UniForm($id){
		InsertForm:: insertFormHeader($id);
		InsertForm:: modalFormGroup("Usename","text","","username","Username");
		InsertForm:: modalFormGroup("Password","text","","password","Password");
		InsertForm:: modalFormGroup("Email","text","","email","Email");
		InsertForm:: modalFixedFormGroup("Userable id","number","","userable_type_id",2);
		InsertForm:: modalFixedFormGroup("Userable type","text","","userable_type","cluster");
		//university table
		InsertForm::modalFormGroup("Code","text","","","");
		InsertForm:: modalFormGroup("Name","text","","","");
		InsertForm:: modalFormGroup("Information","text","","","");		
		InsertForm:: insertFormFooter();
	}

//id truyen vao la id cua Modal. trong button Data-target = id.
	public static function Student($id){
		InsertForm:: insertFormHeader($id);
		InsertForm:: modalFormGroup("Usename","text","","username","Username");
		InsertForm:: modalFormGroup("Password","text","","password","Password");
		InsertForm:: modalFormGroup("Email","text","","email","Email");
		InsertForm:: modalFixedFormGroup("Userable id","number","","userable_type_id",2);
		InsertForm:: modalFixedFormGroup("Userable type","text","","userable_type","cluster");
		//students table
		InsertForm:: modalFormGroup("Profile Code ","text","","profile_code","profile_code");
		InsertForm:: modalFormGroup("Registration_number","text","","registration_number","registration_number");
		InsertForm:: modalFormGroup("Lastname","text","","lastname","lastname");
		InsertForm:: modalFormGroup("Firstname","text","","firstname","firstname");
		InsertForm:: modalFormGroup("Email","text","","email","Email");
		InsertForm:: modalFormGroup("Indentity_code","text","","indentity_code","indentity_code");
		InsertForm:: modalFormGroup("Birthday","date","","birthday","birthday");
		InsertForm:: modalFormGroup("Sex","text","","sex","sex");
		InsertForm:: modalFormGroup("Plus_score","text","","plus_score","plus_score");
		InsertForm:: modalFormGroup("Department_id","text","","department_id","department_id");	
		InsertForm:: insertFormFooter();
	}

	public static function Major($id){
		InsertForm:: insertFormHeader($id);
		//major table
		InsertForm:: modalFormGroup("Code","text","","code","Code");
		InsertForm:: modalFormGroup("University_id","int","","university_id","University_id");
		InsertForm:: modalFormGroup("Name","text","","name","Name");
		InsertForm:: modalFormGroup("Target","int","","target","Target");
		InsertForm:: modalFormGroup("Combidation","text","","combidation","Combidation");
		InsertForm:: modalFormGroup("Condition","text","","condition","Condition");
		InsertForm:: modalFormGroup("Info","text","","info","Info");
		InsertForm:: insertFormFooter();
	}	

	public static function Score($id){
		InsertForm:: insertFormHeader($id);
		//score table
		InsertForm:: modalFormGroup("Student ID","int","","student_id","student_id");
		InsertForm:: modalFormGroup("Room_id","int","","room_id","room_id");
		InsertForm:: modalFormGroup("Subject_id","int","","subject_id","subject_id");
		InsertForm:: modalFormGroup("Score","","float","score","score");
		InsertForm:: modalFormGroup("State","","float","state","state");
		InsertForm:: insertFormFooter();
	}

	public static function Notice($id){
		InsertForm:: insertFormHeader($id);
		//Notice table
		InsertForm:: modalFormGroup("Title","text","","title","title");
		InsertForm:: modalFormGroup("Content","text","","content","Content");

		InsertForm:: insertFormFooter();
	}

	public static function Phrase($id){
		InsertForm:: insertFormHeader($id);

		//Phrase table
		InsertForm:: modalFormGroup("Code","text","","code","Code");
		InsertForm:: modalFormGroup("Name","text","","name","Name");

		InsertForm:: insertFormFooter();
	}

	public static function Room($id){
		InsertForm:: insertFormHeader($id);
		//Notice table
		InsertForm:: modalFormGroup("Code","text","","code","Code");
		InsertForm:: modalFormGroup("Address","text","","address","Address");
		InsertForm:: modalFormGroup("cluster_id","int","","cluster_id","Cluster_id");
		InsertForm:: insertFormFooter();
	}
	public static function Subject($id){
		InsertForm:: insertFormHeader($id);
		//subject
		InsertForm:: modalFormGroup("Code","text","","code","Code");
		InsertForm:: modalFormGroup("Name","text","","name","Name");
		InsertForm:: insertFormFooter();
	}

	public static function FileExcel($id){
		InsertForm:: insertFormHeader($id);
		//subject
		InsertForm:: modalFileFormGroup("Input Excel File","","excelfile");
		InsertForm:: insertFileFormFooter();
	}
	public static function FileExport($id){
		InsertForm:: insertFormHeader($id);
		//subject
		echo "<h4>Bạn có muốn xuât dữ liệu ra file không<h4>";

		InsertForm::exportFileFormFooter();
	}

	private static function insertFormHeader($id){
		echo '<form class="modal fade" id="'.$id.'" tabindex="-1" role="dialog" 
			aria-labelledby="myModalLabel">
  			<div class="modal-dialog" role="document">
    		<div class="modal-content">
	    	<div class="modal-header">
		        <button id="'.$id.'closebtn" type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">Insert Form</h4>
	    	</div>

	     	<div class="modal-body">';
	}

	private static function insertFormFooter(){
		echo '</div>
					<div class="modal-footer">
				        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				        <button type="submit" class="btn btn-success">Add</button>
				     </div>
			    </div>
			  </div>
			</form>
		';
	}

	private static function insertFileFormFooter(){
		echo '</div>
					<div class="modal-footer">
				        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				        <button type="submit" class="btn btn-success">Upload File</button>
				    </div>
			    </div>
			  </div>
			</form>
		';	
	}
	private static function exportFileFormFooter(){
		echo '</div>
					<div class="modal-footer">
				        <button type="submit" class="btn btn-success">Xuất File</button>
				        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
				     </div>
			    </div>
			  </div>
			</form>
		';			
	}
	// label type id name placeholder
	private static function modalFileFormGroup($label,$id,$name){
		echo "<div class='form-group'>
				<label>".$label."</label>
				<input type='file' class='form-control' id='".$id."' name='".$name."''>
			</div>";
	}
	private static function  modalFormGroup($label,$type,$id,$name,$placeholder){
		echo "<div class='form-group'>
				<label>".$label."</label>
				<input type=".$type." class='form-control' id='".$id."' name='".$name."' placeholder='".$placeholder."'>
			</div>";
	}

	private static function modalFixedFormGroup($label,$type,$id,$name,$value){
		echo "<div class='form-group'>
				<label>".$label."</label>
				<input type='".$type."' class='form-control' id='".$id."' name='".$name."' value='".$value."' readonly>
			</div>";	
	}

	private static function modalFormGroupValue($label,$type,$id,$name,$value){
		echo "<div class='form-group'>
				<label>".$label."</label>
				<input type=".$type." class='form-control' id='".$id."' name='".$name."' value='".$value."'>
			</div>";
	}
 }


	
?>
