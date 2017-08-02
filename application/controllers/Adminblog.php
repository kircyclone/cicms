<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminblog extends CI_Controller {
	var $thiscontroller,$thisfunction,$editblogid;
	public function __construct(){
		parent::__construct();
		$this -> load -> model("Admin_model");
		$this -> load -> model("Adminblog_model");
		$this -> thiscontroller = $this->uri->segment(1);
		$this -> thisfunction = $this->uri->segment(2);
		$this -> editblogid = $this->uri->segment(3);
	}
	public function index()
	{
		$this -> Admin_model -> checklogin();
		//$this -> load -> view('adminblog/blogslist');
		redirect("adminblog/blogslist");
	}
	public function blogslist(){
		$this -> Admin_model -> checklogin();
		$hdataarr = array(
			'controller'	=> $this -> thiscontroller,
			'function'		=> $this -> thisfunction,
			'title'			=> 'Blogs List'
		);
		$this -> load -> view('admin/head',$hdataarr);
		$this -> load -> view('admin/header');
		$this -> load -> view('admin/leftsidebar');
		
		$blogslistarr = $this -> Adminblog_model -> blogslist();
		//echo "<pre>";print_r($blogslistarr);echo "</pre>";
		$bloglistdata = array(
			'bloglistarr'		=> $blogslistarr
		);
		$this -> load -> view('admin/blogslist',$bloglistdata);
		$this -> load -> view('admin/footer');
		$bottomdataarr = array(
			'controller'	=> $this -> thiscontroller,
			'function'		=> $this -> thisfunction
		);
		$this -> load -> view('admin/bottom',$bottomdataarr);
		
	}
	public function newblog(){
		$this -> Admin_model -> checklogin();
		$blogname = $this -> input -> post('blogname');
		
		$hdataarr = array(
			'controller'	=> $this -> thiscontroller,
			'function'		=> $this -> thisfunction,
			'title'			=> 'Add New Blog'
		);
		
		//if($blogheading == "" || $blogdescription == ""){
		if($blogname == ""){
			$this -> load -> view('admin/head',$hdataarr);
			$this -> load -> view('admin/header');
			$this -> load -> view('admin/leftsidebar');
			$blogarr = array(
				'message'	=> ''
			);
			$this -> load -> view('admin/newblog',$blogarr);
			$this -> load -> view('admin/footer');
			$bottomdataarr = array(
				'controller'	=> $this -> thiscontroller,
				'function'		=> $this -> thisfunction
			);
			$this -> load -> view('admin/bottom',$bottomdataarr);
		}
		else{
			$checkquery = "select count(1) as alreadycount from ".TABLEBLOGS." where blogname = '".$blogname."'";
			$checkresult = $this -> db -> query($checkquery);
			$row = $checkresult -> row();
			if($row -> alreadycount > 0){
				$blogarr = array(
					'message'	=> 'Blog Name Already Exists !!!'
				);
				echo json_encode($blogarr);exit;
			}
			do{
				$blogid = rand(1111,9999);
				$checkquery = "select count(1) as totalcount from ".TABLEBLOGS." where blogid = '".$blogid."'";
				$checkresult = $this -> db -> query($checkquery);
				$row = $checkresult -> row();
 
			}while($row -> totalcount >= 1);
			
			$insertquery = "insert into ".TABLEBLOGS." (blogid,blogname,createdby,createdtime) values ('".$blogid."','".$blogname."','',".time().")";
			$this -> db -> query($insertquery);
			if($this->db->affected_rows() > 0){
				$blogarr = array(
					'message'	=> 'Blog Successfully Added !!!'
				);
			}else{
				$blogarr = array(
					'message'	=> 'Error Adding Blog !!!'
				);
			}
		echo json_encode($blogarr);
			// $this -> load -> view('admin/head',$hdataarr);
			// $this -> load -> view('admin/header');
			// $this -> load -> view('admin/leftsidebar');
			// $this -> load -> view('admin/newblog',$blogarr);
			// $this -> load -> view('admin/footer');
			// $bottomdataarr = array(
				// 'controller'	=> $this -> thiscontroller,
				// 'function'		=> $this -> thisfunction
			// );
			// $this -> load -> view('admin/bottom',$bottomdataarr);
			
		}
	}
	public function editblog(){
		//echo "<pre>";print_r($_POST);echo "</pre>";exit;
		$this -> Admin_model -> checklogin();
		
		//$blogheading = $this -> input -> post('blogheading');
		//$blogdescription = $this -> input -> post('blogdescription');
		$submitted	= $this -> input -> post('submitted');
		$blogname = $this -> input -> post("blogname");
		$blogid = $this -> input -> post("blogid");

		$hdataarr = array(
			'controller'	=> $this -> thiscontroller,
			'function'		=> $this -> thisfunction,
			'title'			=> 'Edit Page'
		);

		//if($blogheading == "" || $blogdescription == ""){
		//if($this -> editblogid == ""){
		if($submitted == ""){
			if($this -> editblogid != ""){
				$blogdetailsarr = $this -> Adminblog_model -> blogdetails($this -> editblogid);
				//echo "<pre>";print_r($blogdetailsarr);echo "<pre>";exit;
				if(is_array($blogdetailsarr) && count($blogdetailsarr) > 0){
					$this -> load -> view('admin/head',$hdataarr);
					$this -> load -> view('admin/header');
					$this -> load -> view('admin/leftsidebar');
					
					
					$blogarr = array(
						'message'			=> '',
						'submitted' 		=> $this -> editblogid,
						'blogname' 		=> $blogdetailsarr[0] -> blogname
					);
					$this -> load -> view('admin/editblog',$blogarr);
					$this -> load -> view('admin/footer');
					$bottomdataarr = array(
						'controller'	=> $this -> thiscontroller,
						'function'		=> $this -> thisfunction
					);
					$this -> load -> view('admin/bottom',$bottomdataarr);
				}else{
					redirect('adminblog/blogslist');
				}
			}else{
				redirect('adminblog/blogslist');
			}
		}
		else{
			//echo "<pre>";print_r($_POST);echo "</pre>";
			// do{
				// $blogid = rand(1111,9999);
				// $checkquery = "select count(1) as totalcount from ".TABLEPAGES." where blogid = '".$blogid."'";
				// $checkresult = $this -> db -> query($checkquery);
				// $row = $checkresult -> row();
				 
			// }while($row -> totalcount >= 1);
			
			//$insertquery = "insert into ".TABLEPAGES." (blogid,blogheading,blogdescription,entrytime) values ('".$blogid."','".$blogheading."','".$blogdescription."',".time().")";
			//$updatequery = "update ".TABLEPAGES." set blogheading = '".$blogheading."', blogdescription = '".$blogdescription."' where blogid = '".$submitted."'";
			$updatequery = "update ".TABLEBLOGS." set blogname = '".$blogname."' where blogid = '".$blogid."'";
			$this -> db -> query($updatequery);
			if($this->db->affected_rows() > 0){
				/*
				$blogdetailsarr = $this -> Adminblog_model -> blogdetails($submitted);
				$blogarr = array(
					'message'	=> 'Blog Successfully Updated !!!',
					'submitted' 		=> $submitted,
					'blogheading' 		=> $blogdetailsarr[0] -> blogheading,
					'blogdescription' 	=> $blogdetailsarr[0] -> blogdescription
				);
				*/
				$blogarr = array(
					'message'	=> 'Blog Successfully Updated !!!'
				);
				
			}else{
				$blogdetailsarr = $this -> Adminblog_model -> blogdetails($submitted);
				$blogarr = array(
					'message'	=> 'Error Updating Blog !!!'
				);
			}
			redirect("adminblog/editblog/".$blogid);exit;
			/*
			$this -> load -> view('admin/head',$hdataarr);
			$this -> load -> view('admin/header');
			$this -> load -> view('admin/leftsidebar');
			$this -> load -> view('admin/editblog',$blogarr);
			$this -> load -> view('admin/footer');
			$bottomdataarr = array(
				'controller'	=> $this -> thiscontroller,
				'function'		=> $this -> thisfunction
			);
			$this -> load -> view('admin/bottom',$bottomdataarr);
			*/
		}
	}
	public function addblogentry(){
		$message = '';
		$pagearr = array();
		//$this -> session -> set_userdata("message","Its working !!!");
		$blogid 			= $this -> input -> post("blogid");
		//$blogentryid		= $this -> input -> post("blogentryid");
		$blogentryidpost 	= $this -> input -> post("blogentryidpost");
		$blogheading 		= $this -> input -> post("blogheading");

		if($blogheading != "" && $blogid != "" && $blogentryidpost != ""){
			$blogcontent = $this -> input -> post("blogcontent");
			$blogheading = $this -> input -> post("blogheading");
			
			// do{
				// $blogentryid = rand(1111,9999);
				// $checkquery = "select count(1) as totalcount from ".TABLEBLOGENTRY." where blogentryid = '".$blogentryid."' and blogid = '".$blogentryidpost."'";
				// $checkresult = $this -> db -> query($checkquery);
				// $row = $checkresult -> row();
 
			// }while($row -> totalcount >= 1);
			
			//$insertquery = "insert into ".TABLEBLOGENTRY." (blogentryid,blogid,entryheading,entrycontent,entrytime) values ('".$blogentryid."','".$blogid."','".$blogheading."','".$blogcontent."',".time().")";
			$updatequery = "update ".TABLEBLOGENTRY." set entryheading = '".$blogheading."', entrycontent = '".$blogcontent."' where blogentryid = '".$blogid."' and blogid = '".$blogentryidpost."'";
			$this -> db -> query($updatequery);
			if($this -> db -> affected_rows() > 0){
				$message = "Blog Entry edited Successully !!!";
			}else{
				$message = "No Updatation Done !!!".$updatequery;
			}
			
		}
		if($blogheading != "" && $blogid != "" && $blogentryidpost == ""){
			$blogcontent = $this -> input -> post("blogcontent");
			$blogheading = $this -> input -> post("blogheading");
			
			do{
				$blogentryid = rand(1111,9999);
				$checkquery = "select count(1) as totalcount from ".TABLEBLOGENTRY." where blogentryid = '".$blogentryid."'";
				$checkresult = $this -> db -> query($checkquery);
				$row = $checkresult -> row();
 
			}while($row -> totalcount >= 1);
			
			$insertquery = "insert into ".TABLEBLOGENTRY." (blogentryid,blogid,entryheading,entrycontent,entrytime) values ('".$blogentryid."','".$blogid."','".$blogheading."','".$blogcontent."',".time().")";
			$this -> db -> query($insertquery);
			if($this -> db -> affected_rows() > 0){
				$message = "New Blog Entry Added Successully !!!";
			}else{
				$message = "No Updatation Done !!!";
			}
		}

		$hdataarr = array(
			'controller'	=> $this -> thiscontroller,
			'function'		=> $this -> thisfunction,
			'title'			=> 'Add Blog Entry Form'
		);
		$this -> load -> view('admin/head',$hdataarr);
		$this -> load -> view('admin/header');
		$this -> load -> view('admin/leftsidebar');
		$pagearr['message']	= $message;
		$pageentryid = $this -> uri -> segment(4);
		$pagearr['pageentryid'] = $pageentryid;
		$pagearr['pagetitle']	= ($pageentryid == '')?"New Blog Entry Form":"Edit Blog Entry Form";
		$pagearr['submitbuttoncaption']	= ($pageentryid == '')?"Add New Blog Entry":"Edit Blog Entry";
		//if($this -> uri -> segment(4) != "") $pagearr['blogentrycontent'] = $this -> Adminblog_model -> blogentrydetails($this -> uri -> segment(4),$this -> uri -> segment(3));
		$pagearr['blogentrycontent'] = json_encode(array('entryheading' => '','entrycontent' => ''));
		if($pageentryid != "") $pagearr['blogentrycontent'] = $this -> Adminblog_model -> blogentrydetails($pageentryid,$this -> uri -> segment(3));
		$this -> load -> view('admin/newblogentry',$pagearr);
		$this -> load -> view('admin/footer');
		$bottomdataarr = array(
			'controller'	=> $this -> thiscontroller,
			'function'		=> $this -> thisfunction
		);
		$this -> load -> view('admin/bottom',$bottomdataarr);
	}
	public function blogentrylist(){
		$this -> Admin_model -> checklogin();
		$hdataarr = array(
			'controller'	=> $this -> thiscontroller,
			'function'		=> $this -> thisfunction,
			'title'			=> 'Blogs List'
		);
		$this -> load -> view('admin/head',$hdataarr);
		$this -> load -> view('admin/header');
		$this -> load -> view('admin/leftsidebar');
		
		$blogid = $this -> uri -> segment(3);
		
		$blogslistarr = $this -> Adminblog_model -> blogentrylist($blogid);
		$bloglistdata = array(
			'bloglistarr'		=> $blogslistarr,
			'slno'				=> 0
		);
		$this -> load -> view('admin/blogentrylist',$bloglistdata);
		$this -> load -> view('admin/footer');
		$bottomdataarr = array(
			'controller'	=> $this -> thiscontroller,
			'function'		=> $this -> thisfunction
		);
		$this -> load -> view('admin/bottom',$bottomdataarr);
		
	}
}