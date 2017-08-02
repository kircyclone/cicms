<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	var $thiscontroller,$thisfunction,$editblogid,$ngs;
	public function __construct(){
		parent::__construct();
		$this -> load -> model("Admin_model");
		$this -> load -> model("User_model");
		$this -> thiscontroller = $this->uri->segment(1);
		$this -> thisfunction = $this->uri->segment(2);
		//$this -> editblogid = $this->uri->segment(3);
	}
	public function index()
	{
		redirect("user/userlist");
	}
	public function userlist(){
		$this -> Admin_model -> checklogin();
		//echo "<pre>";print_r($_SESSION);echo "<pre>";exit;
		$hdataarr = array(
			'controller'	=> $this -> thiscontroller,
			'function'		=> $this -> thisfunction,
			'title'			=> 'Photo Album List',
			'ngs'			=> $this -> ngs,
			'userimage'		=> ''
		);
		$this -> load -> view('admin/head',$hdataarr);
		$this -> load -> view('admin/header');
		$this -> load -> view('admin/leftsidebar');
		$userlist = $this -> User_model -> userlist();
		$userstatus = $this -> config -> item("userstatus");
		$bodydata = array(
			"userlist" 		=> $userlist,
			"userstatus"	=> $userstatus,
			"addusermessage"=> "".$this -> uri -> segment(3)
			// "albumimageslistarr"	=> $albumimageslistarr,
			// "albumid"				=> $albumid,
			// "destfolder"			=> $destfolder
		);
		$this -> load -> view('user/userlist',$bodydata);
		$this -> load -> view('admin/footer');
		$bottomdataarr = array(
			'controller'	=> $this -> thiscontroller,
			'function'		=> $this -> thisfunction
		);
		$this -> load -> view('admin/bottom',$bottomdataarr);
	}
	public function userstatuschange(){
		$this -> Admin_model -> checklogin();
		echo $this -> User_model -> userstatuschange();
	}
	public function adduser(){
		$this -> Admin_model -> checklogin();
		//echo "dslfjbskjdfbksjdf";exit;
		$this->load->helper('file');
		$username = $this -> input -> post("username");
		$password = $this -> input -> post("password");
	
		$thistime = time();
		$destfolder 				= $this -> config -> item("employeeimagesfolder");
		$acceptedimagesize 			= $this -> config -> item("acceptedimagesize");
		$allowedempimagefiletypes 	= $this -> config -> item("allowedempimagefiletypes");
		
		
		$imagefile = "";
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
		$filename = "";
		if(is_dir($destfolder.$yearpart."/".$monthpart."/".$datepart)){
			if(is_array($_FILES) && count($_FILES) > 0){
				
				//echo "<pre>";print_r($_FILES);echo "</pre>";
				$returnmessage = array();
				$i = 1;
				$this -> load -> helper("file_upload");
				$returnmess['success'] = 0;
				$returnmess['failure'] = 0;
				 echo "<pre>";
				 print_r($_POST);
				 print_r($_FILES);
				 echo "</pre>";
				 $emppoto = "";
				 $value = $_FILES['employeeimage'];
				//foreach($_FILES as $key => $value){
					//echo "<br />".$value['type'];
					//if(in_array($value['type'],$allowedfiles)){
					//if($allowedfiles[$value['type']] != ""){
					if(isset($allowedempimagefiletypes[$value['type']]) && $value['size'] <= $acceptedimagesize){
						//echo "<br />".$value['type'];
						$imagefile = rand(1000000,9999999);
						$filename = $destfolder.$yearpart."/".$monthpart."/".$datepart."/".$imagefile.$allowedempimagefiletypes[$value['type']];
						if(fileupload($value['tmp_name'],$filename)){
							//$returnmessage[$i]['message'] = "File uploaded";
							$returnmess['success']++;
							
							//$destfolder.$yearpart."/".$monthpart."/".$datepart."/".$imagefile.$allowedempimagefiletypes[$value['type']]
							$emppoto = $destfolder.$yearpart."/".$monthpart."/".$datepart."/".$imagefile.$allowedempimagefiletypes[$value['type']];
							
							//$thistime
							
							// $this -> Albumimages_model -> addalbumimage(array(
								// 'albumid'	=> $albumid,
								// 'imagename'	=> $imagefile.$allowedfiles[$value['type']],
								// 'imagecaption'=> $this -> input -> post("caption".$i)."",
								// 'addedtime'	=> $thistime
							// ));
							
							// $this -> User_model -> adduser(array(
								// 'email'		=> $this -> input -> post('username'),
								// 'password'	=> $this -> input -> post('password'),
								// 'regtime'	=> time(),
								// 'status'	=> 'acive',
								// 'emppoto'	=> $destfolder.$yearpart."/".$monthpart."/".$datepart."/".$imagefile.$allowedfiles[$value['type']]
							// ));
							
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
					//$i++;
				//}
				//exit;
				//redirect("user/userlist/".$albumid."/".$returnmess['success']."/".$returnmess['failure']);
			}else{
				//redirect("user/userlist/".$albumid."/2");
			}
		}else{
			//$returnmessage['message'] = "Error uploading Files !!!";
			//redirect("user/userlist/".$albumid."/3");
		}
		//echo "before";
		// echo $this -> User_model -> adduser(array(
			// 'email'		=> $this -> input -> post('username'),
			// 'password'	=> $this -> input -> post('password'),
			// 'regtime'	=> time(),
			// 'status'	=> 'acive',
			// 'emppoto'	=> "".$emppoto
		// ));
		
		$adduser = $this -> User_model -> adduser($filename);
		
		if($adduser >= 1){
			redirect("user/userlist/1");
		}elseif($adduser == "alreadyexists"){
			redirect("user/userlist/2");
		}
		else{
			redirect("user/userlist/0");
		}
		
		
		//echo "after";
	}
}