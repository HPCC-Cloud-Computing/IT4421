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
	public static function ClusForm($id){
		InsertForm:: insertFormHeader($id);
		InsertForm:: modalFormGroup("Tài khoản","text","","username","Tài khoản");
    	InsertForm:: modalFormGroup("Mật khẩu","text","","password","Mật khẩu");
    	InsertForm:: modalFormGroup("Email","text","","email","Email");
    	// InsertForm:: modalFixedFormGroup("Userable id","number","","userable_type_id",1);
    	// InsertForm:: modalFixedFormGroup("Userable type","text","","userable_type","cluster");
		//cluster table
		InsertForm:: modalFormGroup("Mã cụm","text","","code","Mã");
		InsertForm:: modalFormGroup("Tên cụm","text","","name","Tên");
		InsertForm:: insertFormFooter();

	}

//id truyen vao la id cua Modal. trong button Data-target = id.
	public static function DepartForm($id){
		InsertForm:: insertFormHeader($id);
		InsertForm:: modalFormGroup("Tài khoản","text","","username","Tài khoản");
    	InsertForm:: modalFormGroup("Mật khẩu","text","","password","Mật khẩu");
    	InsertForm:: modalFormGroup("Email","text","","email","Email");
    	// InsertForm:: modalFixedFormGroup("Userable id","number","","userable_type_id",2);
    	// InsertForm:: modalFixedFormGroup("Userable type","text","","userable_type","deparment");
		//cluster table
		InsertForm:: modalFormGroup("Mã sở","text","","code","Mã");
		InsertForm:: modalFormGroup("Tên sở","text","","name","Tên");
		InsertForm:: insertFormFooter();
	}

//id truyen vao la id cua Modal. trong button Data-target = id.
	public static function UniForm($id){
		InsertForm:: insertFormHeader($id);
		InsertForm:: modalFormGroup("Tài khoản","text","","username","Tài khoản");
		InsertForm:: modalFormGroup("Mật khẩu","text","","password","Mật khẩu");
		InsertForm:: modalFormGroup("Email","text","","email","Email");
		// InsertForm:: modalFixedFormGroup("Userable id","number","","userable_type_id",3);
		// InsertForm:: modalFixedFormGroup("Userable type","text","","userable_type","university");
		//university table
		InsertForm::modalFormGroup("Mã Trường","text","","code","BKA,NEU,...");
		InsertForm:: modalFormGroup("Tên Trường","text","","name","Đại học Bách Khoa Hà Nội...");
		InsertForm:: modalFormGroup("Thông tin tổng quan về trường","text","","info","Thông tin về trương..");		
		InsertForm:: insertFormFooter();
	}

//id truyen vao la id cua Modal. trong button Data-target = id.
	public static function Student($id){
		InsertForm:: insertFormHeader($id);
		InsertForm:: modalFormGroup("Tên tài khoản","text","","username","Tài khoản");
		InsertForm:: modalFormGroup("Mật khẩu","text","","password","Mật khẩu");
		//students table
		InsertForm:: modalFormGroup("Mã hồ sơ","text","","profile_code","Mã hồ sơ");
		InsertForm:: modalFormGroup("Số báo danh","text","","registration_number","Số báo danh");
		InsertForm:: modalFormGroup("Họ","text","","firstname","Họ");
		InsertForm:: modalFormGroup("Tên","text","","lastname","Tên");
		InsertForm:: modalFormGroup("Chứng minh thư nhân dân","text","","indentity_code","Chứng minh thư nhân dân");
		InsertForm:: modalFormGroup("Ngày sinh","date","","birthday","Ngày sinh");
		InsertForm:: modalFormGroup("Giới tính","text","","sex","Giới tính");
		InsertForm:: modalFormGroup("Điểm cộng","text","","plus_score","Điểm cộng");
		InsertForm:: modalFormGroup("Mã sở","text","","department_id","Mã sở");	
		InsertForm:: insertFormFooter();
	}

	public static function Major($id){
		InsertForm:: insertFormHeader($id);
		//major table
		InsertForm:: modalFormGroup("Mã ngành","text","","code","Mã");
		InsertForm:: modalFormGroup("Mã trường","int","","university_id","Mã trường");
		InsertForm:: modalFormGroup("Tên ngành","text","","name","Tên");
		InsertForm:: modalFormGroup("Chỉ tiêu","int","","target","Chỉ tiêu");
		InsertForm:: modalFormGroup("Khối","text","","combidation","A,B,C,D,A1...");
		InsertForm:: modalFormGroup("Điều kiện","text","","condition",">=500");
		InsertForm:: modalFormGroup("Thông tin ngành","text","","info","Đại học A là một trường...");
		InsertForm:: insertFormFooter();
	}	

	public static function Score($id){
		InsertForm:: insertFormHeader($id);
		//score table
		InsertForm:: modalFormGroup("Mã sinh viên","int","","student_id","student_id");
		InsertForm:: modalFormGroup("Mã phòng","int","","room_id","room_id");
		InsertForm:: modalFormGroup("Mã môn học","int","","subject_id","subject_id");
		InsertForm:: modalFormGroup("Điểm","","float","score","score");
		InsertForm:: modalFormGroup("Trạng thái","","float","state","state");
		InsertForm:: insertFormFooter();
	}

	public static function Notice($id){
		InsertForm:: insertFormHeader($id);
		//Notice table
		InsertForm:: modalFormGroup("Tiêu đề","text","","title","title");
		InsertForm:: modalFormGroup("Nội dung","text","","content","Content");

		InsertForm:: insertFormFooter();
	}

	public static function Phrase($id){
		InsertForm:: insertFormHeader($id);

		//Phrase table
		EditForm:: modalFormGroup("Mã","text","","code","Mã");
		EditForm:: modalFormGroup("Tên giai đoạn","text","","name","Giai đoạn");
		EditForm:: modalFormGroup("Trạng thái","text","","state","Trạng thái");
		EditForm:: modalFormGroup("Bắt đầu","date","","starttime","Bắt đầu");
		EditForm:: modalFormGroup("Kết thúc","date","","endtime","Kết thúc");

		InsertForm:: insertFormFooter();
	}

	public static function Room($id){
		InsertForm:: insertFormHeader($id);
		//Notice table
		InsertForm:: modalFormGroup("Mã phòng","text","","code","Mã");
		InsertForm:: modalFormGroup("Địa chỉ","text","","address","Address");
		InsertForm:: modalFormGroup("Mã cụm thi","int","","cluster_id","Mã cụm thi");
		InsertForm:: insertFormFooter();
	}
	public static function Subject($id){
		InsertForm:: insertFormHeader($id);
		//subject
		InsertForm:: modalFormGroup("Mã môn học","text","","code","Mã");
		InsertForm:: modalFormGroup("Tên môn học","text","","name","Tên");
		InsertForm:: insertFormFooter();
	}

	public static function FileExcel($id){
		InsertForm:: insertFormHeader($id);
		//subject
		InsertForm:: modalFileFormGroup("Xuất file excel","","excelfile");
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
		        <button id="'.$id.'closebtn" type="button" class="close" data-dismiss="modal" aria-label="Đóng"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">Insert Form</h4>
	    	</div>

	     	<div class="modal-body">';
	}

	private static function insertFormFooter(){
		echo '</div>
					<div class="modal-footer">
				        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
				        <button type="submit" class="btn btn-success">Thêm</button>
				     </div>
			    </div>
			  </div>
			</form>
		';
	}

	private static function insertFileFormFooter(){
		echo '</div>
					<div class="modal-footer">
				        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
				        <button type="submit" class="btn btn-success">Tải file lên</button>
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
