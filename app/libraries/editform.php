<?php
class EditForm{

// Modal Form Group: label type id name placeholder
//id truyen vao la id cua Modal. trong button Data-target = id.
	public static function ClusForm($id){
		EditForm:: editFormHeader($id);
		//cluster table
		EditForm:: modalFixedFormGroup("Id","text","","id","Id");
		EditForm:: modalFormGroup("Mã cụm","text","","code","Mã");
		EditForm:: modalFormGroup("Tên cụm","text","","name","Tên");
		EditForm:: editFormFooter();

	}

//id truyen vao la id cua Modal. trong button Data-target = id.
	public static function DepartForm($id){
		EditForm:: editFormHeader($id);
		//cluster table
		EditForm:: modalFixedFormGroup("Id","text","","id","Id");
		EditForm:: modalFormGroup("Mã sở","text","","code","Mã");
		EditForm:: modalFormGroup("Tên sở","text","","name","Tên");
		EditForm:: editFormFooter();
	}

//id truyen vao la id cua Modal. trong button Data-target = id.
	public static function UniForm($id){
		EditForm:: editFormHeader($id);
		//university table
		EditForm:: modalFixedFormGroup("Id","text","","id","Id");
		EditForm:: modalFormGroup("Mã Trường","text","","code","BKA,NEU,...");
		EditForm:: modalFormGroup("Tên Trường","text","","name","Đại học Bách Khoa Hà Nội...");
		EditForm:: modalFormGroup("Thông tin tổng quan về trường","text","","info","Thông tin về trường");		
		
		EditForm:: editFormFooter();
	}

//id truyen vao la id cua Modal. trong button Data-target = id.
	public static function StuForm($id){
		EditForm:: editFormHeader($id);
		//students table
		EditForm:: modalFixedFormGroup("Id","text","","id","Id");
		EditForm:: modalFormGroup("Mã hồ sơ","text","","profile_code","Mã hồ sơ");
		EditForm:: modalFormGroup("Số báo danh","text","","registration_number","Số báo danh");
		EditForm:: modalFormGroup("Họ","text","","firstname","Họ");
		EditForm:: modalFormGroup("Tên","text","","lastname","Tên");
		EditForm:: modalFormGroup("Chứng minh thư nhân dân","text","","indentity_code","Chứng minh thư nhân dân");
		EditForm:: modalFormGroup("Ngày sinh","date","","birthday","Ngày sinh");
		EditForm:: modalFormGroup("Giới tính","text","","sex","Giới tính");
		EditForm:: modalFormGroup("Điểm cộng","text","","plus_score","Điểm cộng");
		EditForm:: modalFixedFormGroup("Mã sở","text","","department_id","Mã sở");		
		EditForm:: editFormFooter();
	}

	public static function Major($id){
		EditForm:: editFormHeader($id);
		//major table
		EditForm:: modalFixedFormGroup("Id","text","","id","Id");
		EditForm:: modalFormGroup("Mã ngành","text","","code","Mã");
		EditForm:: modalFormGroup("Mã trường","int","","university_id","Mã trường");
		EditForm:: modalFormGroup("Tên ngành","text","","name","Tên");
		EditForm:: modalFormGroup("Chỉ tiêu","int","","target","Chỉ tiêu");
		EditForm:: modalFormGroup("Khối","text","","combidation","A,B,C,D,A1...");
		EditForm:: modalFormGroup("Điều kiện","text","","condition",">=500");
		EditForm:: modalFormGroup("Thông tin ngành","text","","info","Đại học A là một trường...");
		EditForm:: editFormFooter();
	}	

	public static function Score($id){
		EditForm:: editFormHeader($id);
		//score table
		EditForm:: modalFixedFormGroup("Id","text","","id","Id");
		EditForm:: modalFormGroup("Mã sinh viên","int","","student_id","student_id");
		EditForm:: modalFormGroup("Mã phòng","int","","room_id","room_id");
		EditForm:: modalFormGroup("Mã môn học","int","","subject_id","subject_id");
		EditForm:: modalFormGroup("Điểm","","float","score","score");
		EditForm:: modalFormGroup("Trạng thái","","float","state","state");
		EditForm:: editFormFooter();
	}

	public static function Notice($id){
		EditForm:: editFormHeader($id);
		//Notice table
		EditForm:: modalFixedFormGroup("Id","text","","id","Id");
		EditForm:: modalFormGroup("Tiêu đề","text","","title","title");
		EditForm:: modalFormGroup("Nội dung","text","","content","Content");


		EditForm:: editFormFooter();
	}

	public static function Phrase($id){
		EditForm:: editFormHeader($id);

		//Phrase table
		EditForm:: modalFixedFormGroup("Id","text","","id","Id");
		EditForm:: modalFormGroup("Mã","text","","code","Mã");
		EditForm:: modalFormGroup("Tên ngành","text","","name","Tên");

		EditForm:: editFormFooter();
	}

	public static function Room($id){
		EditForm:: editFormHeader($id);
		//Notice table
		EditForm:: modalFixedFormGroup("Id","text","","id","Id");
		EditForm:: modalFormGroup("Mã phòng","text","","code","Mã");
		EditForm:: modalFormGroup("Địa chỉ","text","","address","Address");
		EditForm:: modalFormGroup("Mã cụm thi","int","","cluster_id","Mã cụm thi");
		EditForm:: editFormFooter();
	}
	public static function Subject($id){
		EditForm:: editFormHeader($id);
		//subject
		EditForm:: modalFixedFormGroup("Id","text","","id","Id");
		EditForm:: modalFormGroup("Mã môn học","text","","code","Mã");
		EditForm:: modalFormGroup("Tên môn học","text","","name","Tên");
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