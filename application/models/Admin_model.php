<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model{
	var $thiscontroller,$thisfunction;
	public function __construct(){
		parent::__construct();
		$thiscontroller = $this->uri->segment(1);
		$thisfunction = $this->uri->segment(2);
	}
	public function index(){
		
	}
	public function checklogin(){
		$userid = $this -> session -> userdata("admin");
		$this -> Admin_model -> handlesession();
		if($userid == ""){
			//header("Location: ".site_url('admin/loginform'));
			redirect("admin/loginform");
		}
		else{
			//redirect("admin/dashboard");
		}
	}
	public function handlesession(){
		$data = array(
			'sessionid' 		=> session_id(),
			'adminid'			=> $this -> session -> userdata("admin")."",
			'remoteipaddress'	=> $_SERVER['REMOTE_ADDR'],
			'browser'			=> $this->input->user_agent(),
			'controllername'	=> $this->uri->segment(1)."",
			'functionname'		=> $this->uri->segment(2)."",
			'hittime'			=> time(),
		);
		$this -> db -> insert(TABLESESSIONDETAILS,$data);
	}
	public function login(){
		$email = $this -> input -> post("email");
		$password = $this -> input -> post("password");
		$query = "select * from ".TABLEUSER." where email = '".$email."' and password = md5('".$password."') and status = 'active'";
		//$query = "select * from ".TABLEUSER." where email = 'kircyclone@gmail.com' and password = md5('kiruba')";
		$result = $this -> db -> query($query);
		if($result -> num_rows() > 0){
			$fullname = "";
			$userimage = "";
			foreach($result -> result() as $row){
				$email 		= $row -> email;
				$fullname 	=  $row -> fullname;
				$userimage 	=  $row -> emppoto;
			//print_r($row);echo $row -> email."-".$row -> fullname."-".$row -> emppoto;exit;
			}
			$this -> session -> set_userdata("admin",$email);
			$this -> session -> set_userdata("username",$fullname);
			$this -> session -> set_userdata("userimage",$userimage);
			return 0;
		}else{
			return 1;
		}
	
	}
}