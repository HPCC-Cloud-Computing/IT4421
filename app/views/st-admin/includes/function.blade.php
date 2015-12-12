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


	function makeClusterForm(){
			    modalFormGroup("Usename","text","","username","Username");
	        	modalFormGroup("Password","text","","Password","Password");
	        	modalFormGroup("Email","text","","email","Email");
	        	modalFixedFormGroup("Userable id","number","","userable_type_id",2);
	        	modalFixedFormGroup("Userable type","text","","userable_type","cluster");
				

				//cluster table
				modalFormGroup("Code","text","","cluscode","Code");
				modalFormGroup("Name","text","","clusname","Name");
	}
?>
