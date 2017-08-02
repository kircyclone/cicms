<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contactus extends CI_Controller {
	var $thiscontroller,$thisfunction,$pagecontents;
	public function __construct(){
		parent::__construct();
		$this -> load -> model("Forms_model");
		$this -> thiscontroller = $this->uri->segment(1);
		$this -> thisfunction = $this->uri->segment(2);
		$this -> themefoldername1 = $this -> config -> item("themefoldername1");
	}
	public function index()
	{
		// $this -> pagecontents = $this -> Pages_model -> showpagecontents('4651');
		// $bodydata = array(
			// 'statictitle'	=> STATICTITLE,
			// 'title'			=> 'About Us',
			// 'pagecontent'	=> $this -> pagecontents
		// );
		// $this -> load -> view("themes/mechanicalweb/aboutus",$bodydata);
		
		// echo "<pre>";
		// print_r($formcontents);
		// echo "</pre>";
		//echo $formcontents;
		
		
		//$this -> load -> view("themes/mechanicalweb/aboutus",$bodydata);
		
		$formcontents = $this -> Forms_model -> formdisplayhtml1('3941');
		
		$formsubmit = $this -> Forms_model -> formsubmit('3941');
		
		$bodydata = array(
			'statictitle'	=> STATICTITLE,
			'title'			=> 'Contact Us',
			//'supportingfiles'=>jsisaddfiles1(),
			'pagecontent'	=> $formcontents.$formsubmit
		);
		$this -> load -> view("themes/".$this -> themefoldername1."/contactuscontents",$bodydata);
		
		
	}
}