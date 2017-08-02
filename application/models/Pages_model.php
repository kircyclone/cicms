<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages_model extends CI_Model{
	var $thiscontroller,$thisfunction;
	public function __construct(){
		parent::__construct();
		$thiscontroller = $this->uri->segment(1);
		$thisfunction = $this->uri->segment(2);
	}
	public function index(){
		
	}
	public function showpagecontents($pageid='1833'){
		if($pageid != ""){
			$query = "select pagedescription from ".TABLEPAGES." where pageid = ".$pageid;
			$result = $this -> db -> query($query);
			foreach($result -> result() as $row){
				//$resultrow[] = $row;
				$pagecontents = $row -> pagedescription;
			}
		}
		else{
			$pagecontents = 'In-Valid Page Content';
		}
		return $pagecontents;
	//return $resultrow;
	}
	public function blogpage($blogid){
		if($blogid != ""){
			$query = "select blogname from ".TABLEBLOGS." where blogid = ".$blogid;
			$result = $this -> db -> query($query);
			foreach($result -> result() as $row){
				//$resultrow[] = $row;
				$pagecontents = $row -> blogname;
			}
		}
		else{
			$pagecontents = '-';
		}
		return $pagecontents;
	}
	public function blogpageentries($blogid,$pagenumber=0,$perpage=5){
		if($blogid != ""){
			$query = "select blogentryid,entryheading,entrycontent from ".TABLEBLOGENTRY." where blogid = ".$blogid." limit ".$pagenumber." , ".$perpage."";
			$result = $this -> db -> query($query);
			if(is_array($result -> result()) & count($result -> result()) > 0){
				$i = 0;
				foreach($result -> result() as $row){
					//$resultrow[] = $row;
					$pagecontents[$i]['entryheading'] = $row -> entryheading;
					$pagecontents[$i]['entrycontent'] = $row -> entrycontent;
					$i++;
				}
			}
		}
		else{
			$pagecontents = 'In-Valid Page Content';
		}
		return $pagecontents;
	}
	public function getimages($albumid){
		if($albumid != ""){
			$query = "select * from ".TABLEALBUMIMAGES." where albumid = ".$albumid."";
			$result = $this -> db -> query($query);
			if(is_array($result -> result()) & count($result -> result()) > 0){
				$i = 0;
				foreach($result -> result() as $row){
					//$resultrow[] = $row;
					$getimages[$i]['imagename'] = $row -> imagename;
					$getimages[$i]['imagecaption'] = $row -> imagecaption;
					$getimages[$i]['addedtime'] = $row -> addedtime;
					$i++;
				}
			}
		return $getimages;
		}else{
			return array();
		}
	}
}