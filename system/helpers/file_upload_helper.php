<?php
defined('BASEPATH') OR exit('No direct script access allowed');


if ( ! function_exists('fileupload'))
{
	function fileupload($filename,$destfolder){
		if(move_uploaded_file($filename,$destfolder)){
			return true;
		}else{
			return false;
		}
	}
}