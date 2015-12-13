<?php
// Author: HuanPC
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

// Khai bao duong dan luu file upload public/files
define("DIR_FILE_UPLOAD", "files");
define("DIR_FILE_EXPORT", "export");
// Ham tien ich
class Utils {
	/**
	 * Ham upload file len server
	 * @param  String $nameOfFileInput : ten file upload len server (input name trong POST)
	 * @return String : duong dan file tren server
	 */
	public static function uploadFile($nameOfFileInput) {
		$message = "";
		$target_dir = DIR_FILE_UPLOAD;
		$file = Input::file($nameOfFileInput);
		// $file = Input::all();
		//$fileId = Image::count()+1;
		//$imageExt = substr($_FILES[$nameOfFileInput]["name"],-4);
		//$target_file = $target_dir . basename($fileId.$imageExt);
		//$target_file = $target_dir.basename($file["name"]);
		// dd($file);
		$target_file = public_path()."/files";
		$uploadOk = 1;				
		$fileType = $file->getClientOriginalExtension();
		// Check if image file is a actual image or fake image
		if (isset($_POST["submit"])) {

			$check = filesize($file->getRealPath());
			if ($check !== false) {
				$uploadOk = 1;
			} else {
				$uploadOk = 0;
			}
		}

		// Check file size
		if ($file->getSize() > 500000) {
			$message = "Sorry, your file is too large.";
			$uploadOk = 0;
			echo "loi";
			die();
		}
		
		// Allow certain file formats
		if ($fileType !== "xls" && $fileType !== "csv") {
			$uploadOk = 0;
			$message = $message . "Not Exel (CSV) file type!";
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			Session::put("message", $message);
			return "";
			// if everything is ok, try to upload file
		} else {
			// tra ve duong dan file
			$file_name = str_random(6) . '_' . $file->getClientOriginalName();
			$file->move($target_file, $file_name);
			echo ("");
			return $target_file . "/" . $file_name;
			//} else {
			//	$message = $message."Cannot upload!";
			//	Session::put("message",$message);
			//    return "";
			//}
		}
	}
	/**
	 * Ham lay du lieu tu file exel upload len server
	 * @param  String $nameOfFileInput : input name trong POST
	 * @return Array : mang chua tung row
	 */
	public static function importExelFile($nameOfFileInput) {
		$resultData = array();
		$filePath = self::uploadFile($nameOfFileInput);		
		$data = new Spreadsheet_Excel_Reader();
		$data->setOutputEncoding('utf-8');
		$data->read($filePath);
		for ($i = 1; $i <= $data->sheets[0]['numRows']; $i++) {
			$row = array();
			for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) {
				array_push($row, $data->sheets[0]['cells'][$i][$j]);
			}
			array_push($resultData, $row);
		}		
		if (count($resultData) > 0) {
			return $resultData;
		}

		return "";
	}
	public static function exportCSVFile($fileName,$text){
		$file = fopen(DIR_FILE_EXPORT.'/'.$fileName,"w");
		fwrite($file,$text);
		fclose($file);
		return DIR_FILE_EXPORT.'/'.$fileName;
	}
}