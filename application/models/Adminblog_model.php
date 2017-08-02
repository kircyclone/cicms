<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminblog_model extends CI_Model{
	var $thiscontroller,$thisfunction;
	public function __construct(){
		parent::__construct();
		$this -> load -> helper('string');
		$thiscontroller = $this->uri->segment(1);
		$thisfunction = $this->uri->segment(2);
	}
	public function index(){
		
	}
	public function blogslist(){
		$resultrow = array();
		$query = "select id,blogid,blogname,createdtime from ".TABLEBLOGS."";
		$result = $this -> db -> query($query);
		foreach($result -> result() as $row){
			$resultrow[] = $row;
		}
	return $resultrow;
	}
	public function blogentrylist($blogid){
		$resultrow = array();
		$query = "select id,blogid,blogentryid,entryheading,entrytime from ".TABLEBLOGENTRY." where blogid = '".$blogid."'";
		$result = $this -> db -> query($query);
		foreach($result -> result() as $row){
			$resultrow[] = $row;
		}
	return $resultrow;
	}
	public function blogentrydetails($blogid,$blogentryid){
		$resultrow = array();
		$query = "select id,blogid,blogentryid,entryheading,entrycontent,entrytime from ".TABLEBLOGENTRY." where blogid = '".$blogid."' and blogentryid = '".$blogentryid."'";
		$result = $this -> db -> query($query);
		foreach($result -> result() as $row){
			$resultrow = $row;
		}
		//pre($resultrow);
		// echo "<pre>";
		// print_r($resultrow);
		// echo "</pre>";
	return $resultrow;
	}
	public function blogdetails($blogid){
		$resultrow = array();
		$query = "select blogname,createdtime from ".TABLEBLOGS." where blogid = '".$blogid."'";
		$result = $this -> db -> query($query);
		//echo "<pre>";print_r($result);echo "</pre>";exit;
		foreach($result -> result() as $row){
			$resultrow[] = $row;
		}
	return $resultrow;
	}
}