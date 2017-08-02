<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this -> load -> helper('string');
		$thiscontroller = $this->uri->segment(1);
		$thisfunction = $this->uri->segment(2);
	}
	public function userlist($columns=array("*"),$where=""){
		$resultrow = array();
		$columnstr = implode($columns,",");
		$query = "select ".$columnstr." from ".TABLEUSER." ".$where;
		$result = $this -> db -> query($query);
		foreach($result -> result() as $row){
			$resultrow[] = $row;
		}
	return $resultrow;
	}
	public function userstatuschange(){
		
		$newvalue 	= $this -> input -> post("newvalue");
		$userid 	= $this -> input -> post("userid");
		
		$updatequery = "update ".TABLEUSER." set status = '".$newvalue."' where id = '".$userid."'";
		// exit;
		 if($this -> db -> query($updatequery)){
			 echo "0";
		 }else{
			 echo "1";
		 }
	}
	public function adduser($photoname=""){
		//echo "nefore";
		//$uerid = rand();
		$fullname = $this -> input -> post("fullname");
		$username = $this -> input -> post("username");
		$password = $this -> input -> post("password");
		$checkusername = $this -> db -> get_where(TABLEUSER," email = '".$username."'");
		//echo "<pre>";print_r($checkusername);echo "</pre>";
		//echo "num_rows - ".$checkusername -> result_id -> num_rows."-";
		//return "chumma";
		//$username = $this -> input -> post("username");
		//$username = $this -> input -> post("username");
		//$photoname = "";
		if($checkusername -> result_id -> num_rows <= 0){
		$insertquery = "insert into ".TABLEUSER." (fullname,email,password,regtime,status,emppoto) values ('".$fullname."','".$username."','".md5($password)."','".time()."','active','".$photoname."')";
		//$this -> db -> insert($adduser);
		return $insertresult = $this -> db -> query($insertquery);
		}else{
			return "alreadyexists";
		}
	}
}