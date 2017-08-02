<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	var $thiscontroller,$thisfunction,$pagecontents;
	public function __construct(){
		parent::__construct();
		$this -> load -> model("Pages_model");
		$this -> thiscontroller = $this->uri->segment(1);
		$this -> thisfunction = $this->uri->segment(2);
		$this -> themefoldername1 = $this -> config -> item("themefoldername1");
	}
	public function index()
	{
		$this -> pagecontents = $this -> Pages_model -> showpagecontents('1833');
		$bodydata = array(
			'statictitle'	=> STATICTITLE,
			'title'			=> 'Home',
			'pagecontent'	=> $this -> pagecontents
		);
		$this -> load -> view("themes/".$this -> themefoldername1."/homecontents",$bodydata);
	}
}
