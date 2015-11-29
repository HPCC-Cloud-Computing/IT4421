<?php
class EditForm{

// Modal Form Group: label type id name placeholder
//id truyen vao la id cua Modal. trong button Data-target = id.
	public static function ClusForm($id){
		EditForm:: editFormHeader($id);
		//cluster table
		EditForm:: modalFixedFormGroup("Id","text","","id","Id");
		EditForm:: modalFormGroup("Code","text","","code","Code");
		EditForm:: modalFormGroup("Name","text","","name","Name");
		EditForm:: editFormFooter();

	}

//id truyen vao la id cua Modal. trong button Data-target = id.
	public static function DepartForm($id){
		EditForm:: editFormHeader($id);
		//cluster table
		EditForm:: modalFixedFormGroup("Id","text","","id","Id");
		EditForm:: modalFormGroup("Code","text","","code","Code");
		EditForm:: modalFormGroup("Name","text","","name","Name");
		EditForm:: editFormFooter();
	}

//id truyen vao la id cua Modal. trong button Data-target = id.
	public static function UniForm($id){
		EditForm:: editFormHeader($id);
		//university table
		EditForm:: modalFixedFormGroup("Id","text","","id","Id");
		EditForm::modalFormGroup("Code","text","","code","Code");
		EditForm:: modalFormGroup("Name","text","","name","Name");
		EditForm:: modalFormGroup("Information","text","","","");
		
		EditForm:: editFormFooter();
	}

//id truyen vao la id cua Modal. trong button Data-target = id.
	public static function Student($id){
		EditForm:: editFormHeader($id);
		//students table
		EditForm:: modalFormGroup("Profile Code ","text","","profile_code","profile_code");
		EditForm:: modalFormGroup("Registration_number","text","","registration_number","registration_number");
		EditForm:: modalFormGroup("Lastname","text","","lastname","lastname");
		EditForm:: modalFormGroup("Firstname","text","","firstname","firstname");
		EditForm:: modalFormGroup("Email","text","","email","Email");
		EditForm:: modalFormGroup("Indentity_code","text","","indentity_code","indentity_code");
		EditForm:: modalFormGroup("Birthday","date","","birthday","birthday");
		EditForm:: modalFormGroup("Sex","text","","sex","sex");
		EditForm:: modalFormGroup("Plus_score","text","","plus_score","plus_score");
		EditForm:: modalFormGroup("Department_id","text","","department_id","department_id");	
		EditForm:: editFormFooter();
	}

	public static function Major($id){
		EditForm:: editFormHeader($id);
		//major table
		EditForm:: modalFormGroup("Code","text","","code","Code");
		EditForm:: modalFormGroup("University_id","int","","university_id","University_id");
		EditForm:: modalFormGroup("Name","text","","name","Name");
		EditForm:: modalFormGroup("Target","int","","target","Target");
		EditForm:: modalFormGroup("Combidation","text","","combidation","Combidation");
		EditForm:: modalFormGroup("Condition","text","","condition","Condition");
		EditForm:: modalFormGroup("Info","text","","info","Info");
		EditForm:: editFormFooter();
	}	

	public static function Score($id){
		EditForm:: editFormHeader($id);
		//score table
		EditForm:: modalFormGroup("Student ID","int","","student_id","student_id");
		EditForm:: modalFormGroup("Room_id","int","","room_id","room_id");
		EditForm:: modalFormGroup("Subject_id","int","","subject_id","subject_id");
		EditForm:: modalFormGroup("Score","","float","score","score");
		EditForm:: modalFormGroup("State","","float","state","state");
		EditForm:: editFormFooter();
	}

	public static function Notice($id){
		EditForm:: editFormHeader($id);
		//Notice table
		EditForm:: modalFormGroup("Title","text","","title","title");
		EditForm:: modalFormGroup("Content","text","","content","Content");

		EditForm:: editFormFooter();
	}

	public static function Phrase($id){
		EditForm:: editFormHeader($id);

		//Phrase table
		EditForm:: modalFormGroup("Code","text","","code","Code");
		EditForm:: modalFormGroup("Name","text","","name","Name");

		EditForm:: editFormFooter();
	}

	public static function Room($id){
		EditForm:: editFormHeader($id);
		//Notice table
		EditForm:: modalFormGroup("Code","text","","code","Code");
		EditForm:: modalFormGroup("Address","text","","address","Address");
		EditForm:: modalFormGroup("cluster_id","int","","cluster_id","Cluster_id");
		EditForm:: editFormFooter();
	}
	public static function Subject($id){
		EditForm:: editFormHeader($id);
		//subject
		EditForm:: modalFormGroup("Code","text","","code","Code");
		EditForm:: modalFormGroup("Name","text","","name","Name");
		EditForm:: editFormFooter();
	}
	private static function editFormHeader($id){
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

	private static function editFormFooter(){
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

	private static function editFileFormFooter(){
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