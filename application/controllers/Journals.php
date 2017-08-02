<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Journals extends CI_Controller {
	var $thiscontroller,$thisfunction,$pagecontents;
	public function __construct(){
		parent::__construct();
		$this -> load -> model("Pages_model");
		$this -> thiscontroller = $this->uri->segment(1);
		$this -> thisfunction = $this->uri->segment(2);
		$this -> load -> helper('string');
	}
	public function index()
	{
		$this -> blogheading = $this -> Pages_model -> blogpage('3245');
		pre($this -> blogheading);
		$this -> blogenries = $this -> Pages_model -> blogpageentries('3245');
		pre($this -> blogenries);
	}
}
