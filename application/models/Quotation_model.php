<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quotation_model extends CI_Model{
	var $thiscontroller,$thisfunction;
	public function __construct(){
		parent::__construct();
		$thiscontroller = $this->uri->segment(1);
		$thisfunction = $this->uri->segment(2);
	}
	public function index(){
		
	}
	public function quotationslist(){
		$query = "select quotationid,toname,tophone,toemail,gtotal,quotationdatetime from ".TABLEQUOTATION." order by id desc";
		$result = $this -> db -> query($query);
		$resultrow = array();
		foreach($result -> result() as $row){
			$resultrow[] = $row;
		}
	return $resultrow;
	}
}