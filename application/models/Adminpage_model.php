<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminpage_model extends CI_Model{
	var $thiscontroller,$thisfunction;
	public function __construct(){
		parent::__construct();
		$thiscontroller = $this->uri->segment(1);
		$thisfunction = $this->uri->segment(2);
	}
	public function index(){
		
	}
	public function pageslist(){
		$query = "select id,pageid,pageheading,entrytime from ".TABLEPAGES."";
		$result = $this -> db -> query($query);
		foreach($result -> result() as $row){
			$resultrow[] = $row;
		}
	return $resultrow;
	}
	public function pagedetails($pageid){
		$query = "select pageheading,pagedescription,entrytime from ".TABLEPAGES." where pageid = '".$pageid."'";
		$result = $this -> db -> query($query);
		foreach($result -> result() as $row){
			$resultrow[] = $row;
		}
	return $resultrow;
	}
}