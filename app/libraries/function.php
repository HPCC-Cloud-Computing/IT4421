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

//id truyen vao la id cua Modal. trong button Data-target = id.
	public static function ClusterForm($id){
		InsertForm:: insertFormHeader($id);
		InsertForm:: modalFormGroup("Usename","text","","username","Username");
    	InsertForm:: modalFormGroup("Password","text","","Password","Password");
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
    	InsertForm:: modalFormGroup("Password","text","","Password","Password");
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
		InsertForm:: modalFormGroup("Password","text","","Password","Password");
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
		InsertForm:: modalFormGroup("Password","text","","Password","Password");
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
		InsertForm:: modalFormGroup("Student ID","int","","","");
		InsertForm:: modalFormGroup("Room_id","int","","","");
		InsertForm:: modalFormGroup("Subject_id","int","","","");
		InsertForm:: modalFormGroup("Score","","float","","");

		InsertForm:: insertFormFooter();
	}

	public static function Notice($id){
		InsertForm:: insertFormHeader($id);
		//Notice table
		InsertForm:: modalFormGroup("Title","text","","","");
		InsertForm:: modalFormGroup("Content","text","","","");

		InsertForm:: insertFormFooter();
	}

	public static function Phrase($id){
		InsertForm:: insertFormHeader($id);

		//Phrase table
		InsertForm:: modalFormGroup("Code","text","","","");
		InsertForm:: modalFormGroup("Name","text","","","");

		InsertForm:: insertFormFooter();
	}

	public static function Room($id){
		InsertForm:: insertFormHeader($id);
		//Notice table
		InsertForm:: modalFormGroup("Code","text","","","");
		InsertForm:: modalFormGroup("Address","text","","","");
		InsertForm:: modalFormGroup("cluster_id","int","","","");
		InsertForm:: insertFormFooter();
	}
	public static function Subject($id){
		InsertForm:: insertFormHeader($id);
		//subject
		InsertForm:: modalFormGroup("Code","text","","","");
		InsertForm:: modalFormGroup("Name","text","","","");
		InsertForm:: insertFormFooter();
	}
	private static function insertFormHeader($id){
		echo '<div class="modal fade" id="'.$id.'" tabindex="-1" role="dialog" 
			aria-labelledby="myModalLabel">
  			<div class="modal-dialog" role="document">
    		<div class="modal-content">
	    	<div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Insert Form</h4>
	    	</div>

	     	<div class="modal-body">';
	}

	private static function insertFormFooter(){
		echo '<div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-success">Add</button>
				     </div>
			    </div>
			  </div>
			</div>
		';
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

 }
	
?>
