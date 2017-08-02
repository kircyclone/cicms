<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	var $thiscontroller,$thisfunction;
	public function __construct(){
		parent::__construct();
		$this -> load -> model("Admin_model");
		$this -> thiscontroller = $this->uri->segment(1);
		$this -> thisfunction = $this->uri->segment(2);
	}
	public function index()
	{
		$this -> Admin_model -> checklogin();
		//$this -> load -> view('admin/login');
		redirect("admin/dashboard");
	}
	public function loginform(){
		$hdataarr = array(
			'controller'	=> $this -> thiscontroller,
			'function'		=> $this -> thisfunction
		);
		//$this -> load -> view('admin/header',$hdataarr);
		$this -> load -> view('admin/loginform',$hdataarr);
		//$this -> load -> view('admin/footer');
	}
	public function login(){
		if($this -> Admin_model -> login() == "1"){
			$returnarr = array(
				'redirect'	=> '',
				'reply'		=> 'In-Valid User Name / Password'
			);
		}else{	
			$returnarr = array(
				'redirect'	=> base_url('admin/dashboard'),
				'reply'		=> ''
			);
		}
	echo json_encode($returnarr);
	}
	public function logout(){
		$this -> Admin_model -> checklogin();
		$this -> session -> set_userdata("admin","");
		$this -> session -> set_userdata("username","");
		$this -> session -> set_userdata("userimage","");
		$this->session->sess_destroy();
		redirect("admin/loginform");
	}
	
	public function dashboard(){
		$this -> Admin_model -> checklogin();
		$hdataarr = array(
			'controller'	=> $this -> thiscontroller,
			'function'		=> $this -> thisfunction,
			'title'			=> 'Dashboard'
		);
		$this -> load -> view('admin/head',$hdataarr);
		$this -> load -> view('admin/header');
		$this -> load -> view('admin/leftsidebar');
		$this -> load -> view('admin/dashboard');
		$this -> load -> view('admin/footer');
		$bottomdataarr = array(
			'controller'	=> $this -> thiscontroller,
			'function'		=> $this -> thisfunction
		);
		//print_r($_SESSION);
		$this -> load -> view('admin/bottom',$bottomdataarr);
	}
	
	
}