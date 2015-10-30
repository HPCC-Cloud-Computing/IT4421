<?php 

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

define("DIR_FILE_UPLOAD","files");

class Utils{

	public static function uploadFile($nameOfFileInput){
		$message = "";
		$target_dir = DIR_FILE_UPLOAD;
		//$fileId = Image::count()+1;
		//$imageExt = substr($_FILES[$nameOfFileInput]["name"],-4);
		//$target_file = $target_dir . basename($fileId.$imageExt);		
		$target_file = $target_dir.basename($FILE[$nameOfFileInput]["name"]);
		$uploadOk = 1;
		$fileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {

		    $check = filesize($_FILES[$nameOfFileInput]["tmp_name"]);
		    if($check !== false) {		        
		        $uploadOk = 1;
		    } else {		        
		        $uploadOk = 0;
		    }
		}
		// Check file size
		if ($_FILES[$nameOfFileInput]["size"] > 500000) {
		    $message  = "Sorry, your file is too large.";
		    $uploadOk = 0;
		    echo "loi";
		    die();
		}
		// Allow certain file formats
		if($fileType != "xls" ) {		    
		    $uploadOk = 0;
			$message  = $message. "Not Image file type!";
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			Session::put("message",$message);
		    return "";
		// if everything is ok, try to upload file
		} else {
			// tra ve duong dan file
		    if (move_uploaded_file($_FILES[$nameOfFileInput]["tmp_name"], $target_file)) {		    	
		    	echo("");
		        return $target_file;
		    } else {		    	
		    	$message = $message."Cannot upload!";
		    	Session::put("message",$message);
		        return "";
		    }
		}
	}
}