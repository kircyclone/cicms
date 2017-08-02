<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminpage extends CI_Controller {
	var $thiscontroller,$thisfunction,$editpageid;
	public function __construct(){
		parent::__construct();
		$this -> load -> model("Admin_model");
		$this -> load -> model("Adminpage_model");
		$this -> thiscontroller = $this->uri->segment(1);
		$this -> thisfunction = $this->uri->segment(2);
		$this -> editpageid = $this->uri->segment(3);
	}
	public function index()
	{
		$this -> Admin_model -> checklogin();
		//$this -> load -> view('adminpage/pageslist');
		redirect("adminpage/pageslist");
	}
	public function pageslist(){
		$this -> Admin_model -> checklogin();
		$hdataarr = array(
			'controller'	=> $this -> thiscontroller,
			'function'		=> $this -> thisfunction,
			'title'			=> 'Pages List'
		);
		$this -> load -> view('admin/head',$hdataarr);
		$this -> load -> view('admin/header');
		$this -> load -> view('admin/leftsidebar');
		
		$pageslistarr = $this -> Adminpage_model -> pageslist();
		$pagelistdata = array(
			'pagelistarr'		=> $pageslistarr
		);
		$this -> load -> view('admin/pageslist',$pagelistdata);
		$this -> load -> view('admin/footer');
		$bottomdataarr = array(
			'controller'	=> $this -> thiscontroller,
			'function'		=> $this -> thisfunction
		);
		$this -> load -> view('admin/bottom',$bottomdataarr);
		
	}
	public function newpage(){
		$this -> Admin_model -> checklogin();
		$pageheading = $this -> input -> post('pageheading');
		$pagedescription = $this -> input -> post('pagedescription');
		
		$hdataarr = array(
			'controller'	=> $this -> thiscontroller,
			'function'		=> $this -> thisfunction,
			'title'			=> 'Add New Page'
		);
		
		if($pageheading == "" || $pagedescription == ""){
			$this -> load -> view('admin/head',$hdataarr);
			$this -> load -> view('admin/header');
			$this -> load -> view('admin/leftsidebar');
			$pagearr = array(
				'message'	=> ''
			);
			$this -> load -> view('admin/newpage',$pagearr);
			$this -> load -> view('admin/footer');
			$bottomdataarr = array(
				'controller'	=> $this -> thiscontroller,
				'function'		=> $this -> thisfunction
			);
			$this -> load -> view('admin/bottom',$bottomdataarr);
		}
		else{
			
			do{
				$pageid = rand(1111,9999);
				$checkquery = "select count(1) as totalcount from ".TABLEPAGES." where pageid = '".$pageid."'";
				$checkresult = $this -> db -> query($checkquery);
				$row = $checkresult -> row();
				 
			}while($row -> totalcount >= 1);
			
			$insertquery = "insert into ".TABLEPAGES." (pageid,pageheading,pagedescription,entrytime) values ('".$pageid."','".$pageheading."','".$pagedescription."',".time().")";
			$this -> db -> query($insertquery);
			if($this->db->affected_rows() > 0){
				$pagearr = array(
					'message'	=> 'Page Successfully Added !!!'
				);
			}else{
				$pagearr = array(
					'message'	=> 'Error Adding Page !!!'
				);
			}
			
			$this -> load -> view('admin/head',$hdataarr);
			$this -> load -> view('admin/header');
			$this -> load -> view('admin/leftsidebar');
			$this -> load -> view('admin/newpage',$pagearr);
			$this -> load -> view('admin/footer');
			$bottomdataarr = array(
				'controller'	=> $this -> thiscontroller,
				'function'		=> $this -> thisfunction
			);
			$this -> load -> view('admin/bottom',$bottomdataarr);
			
		}
	}
	public function editpage(){
		$this -> Admin_model -> checklogin();
		$pageheading = $this -> input -> post('pageheading');
		$pagedescription = $this -> input -> post('pagedescription');
		$submitted	= $this -> input -> post('submitted');
		$hdataarr = array(
			'controller'	=> $this -> thiscontroller,
			'function'		=> $this -> thisfunction,
			'title'			=> 'Edit Page'
		);

		//if($pageheading == "" || $pagedescription == ""){
		//if($this -> editpageid == ""){
		if($submitted == ""){
			if($this -> editpageid != ""){
				$this -> load -> view('admin/head',$hdataarr);
				$this -> load -> view('admin/header');
				$this -> load -> view('admin/leftsidebar');
				$pagedetailsarr = $this -> Adminpage_model -> pagedetails($this -> editpageid);
				$pagearr = array(
					'message'			=> '',
					'submitted' 		=> $this -> editpageid,
					'pageheading' 		=> $pagedetailsarr[0] -> pageheading,
					'pagedescription' 	=> $pagedetailsarr[0] -> pagedescription
				);
				$this -> load -> view('admin/editpage',$pagearr);
				$this -> load -> view('admin/footer');
				$bottomdataarr = array(
					'controller'	=> $this -> thiscontroller,
					'function'		=> $this -> thisfunction
				);
				$this -> load -> view('admin/bottom',$bottomdataarr);
			}else{
				redirect('adminpage/newpage');
			}
		}
		else{
			
			// do{
				// $pageid = rand(1111,9999);
				// $checkquery = "select count(1) as totalcount from ".TABLEPAGES." where pageid = '".$pageid."'";
				// $checkresult = $this -> db -> query($checkquery);
				// $row = $checkresult -> row();
				 
			// }while($row -> totalcount >= 1);
			
			//$insertquery = "insert into ".TABLEPAGES." (pageid,pageheading,pagedescription,entrytime) values ('".$pageid."','".$pageheading."','".$pagedescription."',".time().")";
			$updatequery = "update ".TABLEPAGES." set pageheading = '".$pageheading."', pagedescription = '".$pagedescription."' where pageid = '".$submitted."'";
			$this -> db -> query($updatequery);
			if($this->db->affected_rows() > 0){
				$pagedetailsarr = $this -> Adminpage_model -> pagedetails($submitted);
				$pagearr = array(
					'message'	=> 'Page Successfully Updated !!!',
					'submitted' 		=> $submitted,
					'pageheading' 		=> $pagedetailsarr[0] -> pageheading,
					'pagedescription' 	=> $pagedetailsarr[0] -> pagedescription
				);
			}else{
				$pagedetailsarr = $this -> Adminpage_model -> pagedetails($submitted);
				$pagearr = array(
					'message'	=> 'Error Updating Page !!!',
					'submitted' 		=> $submitted,
					'pageheading' 		=> $pagedetailsarr[0] -> pageheading,
					'pagedescription' 	=> $pagedetailsarr[0] -> pagedescription
				);
			}
			
			$this -> load -> view('admin/head',$hdataarr);
			$this -> load -> view('admin/header');
			$this -> load -> view('admin/leftsidebar');
			$this -> load -> view('admin/editpage',$pagearr);
			$this -> load -> view('admin/footer');
			$bottomdataarr = array(
				'controller'	=> $this -> thiscontroller,
				'function'		=> $this -> thisfunction
			);
			$this -> load -> view('admin/bottom',$bottomdataarr);
			
		}
	}
}