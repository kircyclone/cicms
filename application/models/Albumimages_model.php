<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Albumimages_model extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this -> load -> helper('string');
		$thiscontroller = $this->uri->segment(1);
		$thisfunction = $this->uri->segment(2);
	}
	public function imagesalbumlist($albumid=""){
		
		$resultrow = array();
		$qrystr = ($albumid != "")?" where albumid = '".$albumid."'":"";
		$query = "select id,albumid,albumname,addedtime from ".TABLEIMAGEALBUM." ".$qrystr;
		$result = $this -> db -> query($query);
		foreach($result -> result() as $row){
			$resultrow[] = $row;
		}
	return $resultrow;
	}
	public function albumimageslist($albumid){
		//$row = $this -> db -> get_where(TABLEALBUMIMAGES,array('albumid' => $albumid)) -> result();
		
		$resultrow = array();
		$query = "select * from ".TABLEALBUMIMAGES." where albumid = '".$albumid."'";
		$result = $this -> db -> query($query);
		foreach($result -> result() as $row){
			$resultrow[] = $row;
		}
	return $resultrow;
		// echo "<pre>";
		// print_r($resultrow);
		// echo "</pre>";
	}

	public function index(){
		//$this -> addalbum();
	}
	public function addalbum(){
		$albumname = $this -> input -> post('albumname');
		$blogarr = array();
		
		$rowcount = $this -> db -> get_where(TABLEIMAGEALBUM,array("albumname" => $albumname)) -> num_rows();
		if($rowcount > 0){
			$blogarr = array(
				'successmessage'	=> '',
				'failuremessage'	=> 'This Album Name Exists !!!'
			);
			
			return json_encode($blogarr);
		}
		else{
			
			$albumid = $this -> input -> post('albumid'); 
			
			$successmessage = "";
			if($albumid == ""){
				do{
					$albumid = rand(1111,9999);
					$checkquery = "select count(1) as totalcount from ".TABLEIMAGEALBUM." where albumid = '".$albumid."'";
					$checkresult = $this -> db -> query($checkquery);
					$row = $checkresult -> row();

				}while($row -> totalcount >= 1);
				$insertquery = "insert into ".TABLEIMAGEALBUM." (albumid,albumname,addedtime) values ('".$albumid."','".$albumname."',".time().")";
				$this -> db -> query($insertquery);
				$successmessage = "Album Name Successfully Added !!!";
			}else{
				$updatequery = "update ".TABLEIMAGEALBUM." set albumname = '".$albumname."' where albumid = '".$albumid."'";
				
				$this -> db -> query($updatequery);
				//return json_encode(array('successmessage'=>$updatequery."-".mysql_error()));
				$successmessage = "Album Name Successfully Edited !!!";
			}
			if($this->db->affected_rows() > 0){
				$blogarr = array(
					'successmessage'	=> $successmessage,
					'redirect'			=> ''.base_url('adminimages/albumlist')
				);
			}else{
				$blogarr = array(
					'failuremessage'	=> 'Error Adding Album !!!',
					'redirect'			=> ''
				);
			}
			return json_encode($blogarr);
		}
	}
	public function addalbumimage($values){
		$insertquery = "insert into ".TABLEALBUMIMAGES." (albumid,imagename,imagecaption,addedtime) values ('".$values['albumid']."','".$values['imagename']."','".$values['imagecaption']."','".$values['addedtime']."')";
		$this -> db -> query($insertquery);
	}
}