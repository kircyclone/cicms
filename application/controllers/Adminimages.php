<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminimages extends CI_Controller {
	var $thiscontroller,$thisfunction,$editblogid,$ngs;
	public function __construct(){
		parent::__construct();
		$this -> load -> model("Admin_model");
		$this -> load -> model("Albumimages_model");
		$this -> thiscontroller = $this->uri->segment(1);
		$this -> thisfunction = $this->uri->segment(2);
		$this -> editblogid = $this->uri->segment(3);
	}
	public function index()
	{
		redirect("adminimages/albumlist");
	}
	public function albumlist()
	{
		$this -> Admin_model -> checklogin();
		$hdataarr = array(
			'controller'	=> $this -> thiscontroller,
			'function'		=> $this -> thisfunction,
			'title'			=> 'Photo Album List'
		);
		$this -> load -> view('admin/head',$hdataarr);
		$this -> load -> view('admin/header');
		$this -> load -> view('admin/leftsidebar');
		
		$imagesalbumlistarr = $this -> Albumimages_model -> imagesalbumlist();
		//echo "<pre>";print_r($imagesalbumlistarr);echo "</pre>";
		$imagesalbumlistdata = array(
			'imagesalbumlistarr'		=> $imagesalbumlistarr,
			'albumid'					=> $this -> uri -> segment(3)
		);
		$this -> load -> view('admin/albumlist',$imagesalbumlistdata);
		$this -> load -> view('admin/footer');
		$bottomdataarr = array(
			'controller'	=> $this -> thiscontroller,
			'function'		=> $this -> thisfunction
		);
		$this -> load -> view('admin/bottom',$bottomdataarr);
	}
	public function addalbum()
	{
		$this -> Admin_model -> checklogin();
		echo $this -> Albumimages_model -> addalbum();
	}
	public function showhideimage(){
		$albumimageid = $this -> input -> post("albumimageid");
		$showhide 	  = $this -> input -> post("showhide");
		$updatequery = "update ".TABLEALBUMIMAGES." set status = '".$showhide."' where id = '".$albumimageid."'";
	echo $this -> db -> query($updatequery);
	}
	public function albumimageslist()
	{
		$this -> Admin_model -> checklogin();
		$albumid = $this -> uri -> segment(3);
		$hdataarr = array(
			'controller'	=> $this -> thiscontroller,
			'function'		=> $this -> thisfunction,
			'title'			=> 'Photo Album List',
			'ngs'			=> $this -> ngs
		);
		$this -> load -> view('admin/head',$hdataarr);
		$this -> load -> view('admin/header');
		$this -> load -> view('admin/leftsidebar');
		
		$albumdetailsarr = $this -> Albumimages_model -> imagesalbumlist($albumid);
		//pre($albumdetailsarr);
		$albumimageslistarr = $this -> Albumimages_model -> albumimageslist($albumid);
		//echo "<pre>";print_r($albumimageslistarr);echo "</pre>";
		$albumimageslistdata = array(
			'albumimageslistarr'		=> $albumimageslistarr
		);
		$destfolder = $this -> config -> item("imageuploadfolder");
		$bodydata = array(
			"albumdetailsarr" 		=> $albumdetailsarr,
			"albumimageslistarr"	=> $albumimageslistarr,
			"albumid"				=> $albumid,
			"destfolder"			=> $destfolder
		);
		$this -> load -> view('admin/albumimageslist',$bodydata);
		$this -> load -> view('admin/footer');
		$bottomdataarr = array(
			'controller'	=> $this -> thiscontroller,
			'function'		=> $this -> thisfunction
		);
		$this -> load -> view('admin/bottom',$bottomdataarr);
	}
	public function addimages()
	{
		
	}
	public function addalbumimages(){
		$this -> Admin_model -> checklogin();
		$this->load->helper('file');
		$albumid = $this -> input -> post("albumid");
		$allowedfiles = $this -> config -> item("imagetype");
		// echo "<pre>";
		// print_r($allowedfiles);
		//exit;
		$thistime = time();
		$destfolder = $this -> config -> item("imageuploadfolder");
		$acceptedimagesize = $this -> config -> item("acceptedimagesize");
		$yearpart = date("Y",$thistime);
		if(!is_dir($destfolder.$yearpart)){
			mkdir($destfolder.$yearpart);
			write_file($destfolder.$yearpart."/index.html",$this -> config -> item("dummyhtmlfile"));
		}
		
		$monthpart = date("m",$thistime);
		if(!is_dir($destfolder.$yearpart."/".$monthpart)){
			mkdir($destfolder.$yearpart."/".$monthpart);
			write_file($destfolder.$yearpart."/".$monthpart."/index.html",$this -> config -> item("dummyhtmlfile"));
		}
		$datepart = date("d",$thistime);
		if(!is_dir($destfolder.$yearpart."/".$monthpart."/".$datepart)){
			mkdir($destfolder.$yearpart."/".$monthpart."/".$datepart);
			write_file($destfolder.$yearpart."/".$monthpart."/".$datepart."/index.html",$this -> config -> item("dummyhtmlfile"));
		}
		
		if(is_dir($destfolder.$yearpart."/".$monthpart."/".$datepart)){
			if(is_array($_FILES) && count($_FILES) > 0){
				
				//echo "<pre>";print_r($_FILES);echo "</pre>";
				$returnmessage = array();
				$i = 1;
				$this -> load -> helper("file_upload");
				$returnmess['success'] = 0;
				$returnmess['failure'] = 0;
				// echo "<pre>";
				// print_r($_FILES);
				// echo "</pre>";
				foreach($_FILES as $key => $value){
					//echo "<br />".$value['type'];
					//if(in_array($value['type'],$allowedfiles)){
					//if($allowedfiles[$value['type']] != ""){
					if(isset($allowedfiles[$value['type']]) && $value['size'] <= $acceptedimagesize){
						//echo "<br />".$value['type'];
						$imagefile = rand(1000000,9999999);
						
						//write_file($destfolder.$yearpart."/".$monthpart."/".$datepart."/index.php",$this -> config -> item("dummyhtmlfile"));
						
						if(fileupload($value['tmp_name'],$destfolder.$yearpart."/".$monthpart."/".$datepart."/".$imagefile.$allowedfiles[$value['type']])){
							//$returnmessage[$i]['message'] = "File uploaded";
							$returnmess['success']++;
							
							//$thistime
							
							$this -> Albumimages_model -> addalbumimage(array(
								'albumid'	=> $albumid,
								'imagename'	=> $imagefile.$allowedfiles[$value['type']],
								'imagecaption'=> $this -> input -> post("caption".$i)."",
								'addedtime'	=> $thistime
							));
							// echo "<br />caption".$i."-".$this -> input -> post("caption".$i);
							
							// print_r(array(
								// 'albumid'	=> $albumid,
								// 'imagename'	=> $imagefile.$allowedfiles[$value['type']],
								// 'imagecaption'=> $this -> input -> post("caption".$i),
								// 'addedtime'	=> $thistime
							// ));
							
						}
						else{
							//$returnmessage[$i]['message'] = "File not uploaded";
							$returnmess['failure']++;
						}
					}else{
						//$returnmessage[$i]['message'] = "File type not allowed";
						$returnmess['failure']++;
					}
					$i++;
				}
				//exit;
				redirect("adminimages/albumimageslist/".$albumid."/".$returnmess['success']."/".$returnmess['failure']);
			}else{
				redirect("adminimages/albumimageslist/".$albumid."/2");
			}
		}else{
			//$returnmessage['message'] = "Error uploading Files !!!";
			redirect("adminimages/albumimageslist/".$albumid."/3");
		}
		//echo "<pre>";print_r($returnmessage);echo "</pre>";
	}
	public function deleteimage(){
		$this -> Admin_model -> checklogin();
		$albumimageid = $this -> input -> post("albumimageid");
		if($albumimageid != ""){
			$selectquery = "select * from ".TABLEALBUMIMAGES." where id = '".$albumimageid."'";
			$result = $this -> db -> query($selectquery);
			if($result -> num_rows() > 0){
				$row = $result -> row_array(0);
				$imagelocation = $this -> config -> item("imageuploadfolder")."/".date("Y/m/d/",$row['addedtime']).$row['imagename'];
				if(is_file($imagelocation)){
					@unlink($imagelocation);
				}
				//echo $imagelocation;
				$deletequery = "delete from ".TABLEALBUMIMAGES." where id = '".$albumimageid."'";
				echo $this -> db -> query($deletequery);
			}
		}else{
			//echo "Go Fuck Yourself !!!";
			redirect("");
		}
	}
}