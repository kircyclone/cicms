<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends CI_Controller {
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
		$this -> load -> helper("jsimgslider");
		$this -> pagecontents = $this -> Pages_model -> showpagecontents('5592');
		$albumarr = $this -> Pages_model -> getimages('9199');
		if(is_array($albumarr) && count($albumarr) > 0)
		$this -> pagecontents .= jsisslider1($albumarr);
		
		
		$bodydata = array(
			'statictitle'	=> STATICTITLE,
			'title'			=> 'About Us',
			'supportingfiles'=>jsisaddfiles1(),
			'pagecontent'	=> $this -> pagecontents
		);
		$this -> load -> view("themes/".$this -> themefoldername1."/servicescontents",$bodydata);
	}
}