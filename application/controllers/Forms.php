<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forms extends CI_Controller {
	var $thiscontroller,$thisfunction;
	public function __construct(){
		parent::__construct();
		$this -> load -> model("Admin_model");
		$this -> load -> model("Forms_model");
		$this -> thiscontroller = $this->uri->segment(1);
		$this -> thisfunction = $this->uri->segment(2);
	}
	public function index()
	{
		redirect("forms/formslist");
	}
	public function formslist(){
		$this -> Admin_model -> checklogin();
		$hdataarr = array(
			'controller'	=> $this -> thiscontroller,
			'function'		=> $this -> thisfunction,
			'title'			=> 'Forms List'
		);
		$this -> load -> view('admin/head',$hdataarr);
		$this -> load -> view('admin/header');
		$this -> load -> view('admin/leftsidebar');
		
		$formslistarr = $this -> Forms_model -> formslist();
		//echo "<pre>";print_r($formslistarr);echo "</pre>";
		$formslistdata = array(
			'formslist'		=> $formslistarr
		);
		$this -> load -> view('forms/formslist',$formslistdata);
		$this -> load -> view('admin/footer');
		$bottomdataarr = array(
			'controller'	=> $this -> thiscontroller,
			'function'		=> $this -> thisfunction
		);
		$this -> load -> view('admin/bottom',$bottomdataarr);
	}
	public function formentrieslist(){
		$this -> Admin_model -> checklogin();
		$hdataarr = array(
			'controller'	=> $this -> thiscontroller,
			'function'		=> $this -> thisfunction,
			'title'			=> 'Forms List'
		);
		$this -> load -> view('admin/head',$hdataarr);
		$this -> load -> view('admin/header');
		$this -> load -> view('admin/leftsidebar');
		
		$formid = $this -> uri -> segment(3);

		$formentrieslistarr = $this -> Forms_model -> formentrieslist($formid);
		//echo "<pre>";print_r($formslistarr);echo "</pre>";
		$formentrieslistdata = array(
			'formentrieslist'		=> $formentrieslistarr
		);
		$this -> load -> view('forms/formentrieslist',$formentrieslistdata);
		$this -> load -> view('admin/footer');
		$bottomdataarr = array(
			'controller'	=> $this -> thiscontroller,
			'function'		=> $this -> thisfunction
		);
		$this -> load -> view('admin/bottom',$bottomdataarr);
	}
	public function formentrydetails(){
		$formentryid = $this -> input -> post("formentryid");
		//$getformitemsquery = $this -> db -> select('columns') -> from(TABLEFORMENTRIES) -> where("id",$formentryid) -> get();
		$getformitemsquery = $this -> db -> select('formentries,formid') -> from(TABLEFORMENTRIES) -> where("id",$formentryid) -> get();
		//echo "<pre>";print_r($getformitemsquery);echo "</pre>".$getformitemsquery -> result_id -> num_rows;
		if($getformitemsquery -> result_id -> num_rows > 0){
			foreach($getformitemsquery -> result() as $getformitemskey){
				//echo "<pre>";print_r($getformitemskey);echo "</pre>";
				$formentriesarr = json_decode($getformitemskey -> formentries);
				$formid = $getformitemskey -> formid;
			}
			$formidquery = $this -> db -> select('columns') -> from(TABLEFORMS) -> where("formid",$formid) -> get();
			//echo "<pre>";print_r($formentriesarr);echo "</pre>";
			$formidarr = $formidquery -> result();
			
			foreach($formidarr as $formidarrkey){
				//echo "<pre>";print_r($formidarrkey);echo "</pre>";
				$columnnamesarr = json_decode($formidarrkey -> columns);
				//echo "<pre>";print_r($columnnamesarr);echo "</pre>";
				//echo $columnnamesarr -> labelname."<br />";
				//echo "<br />".
				$labelname = strtolower(str_replace(" ","",$columnnamesarr -> labelname));
				//echo "<br />".$formentriesarr -> $labelname;
				
				$finalvalues[] = array($columnnamesarr -> labelname,$formentriesarr -> $labelname);			
			}
			foreach($finalvalues as $finalvalueskey){
				//print_r($finalvalueskey);
				echo "<b>".$finalvalueskey[0]."</b> : ".$finalvalueskey[1]."<br />";
			}
			//echo "<pre>";print_r($finalvalues);echo "</pre>";
		}else{
			echo "In-Valid Entry !!!";
		}
	}
	public function addnewform(){
		$this -> Admin_model -> checklogin();
		$hdataarr = array(
			'controller'	=> $this -> thiscontroller,
			'function'		=> $this -> thisfunction,
			'title'			=> 'Add New Form'
		);
		$this -> load -> view('admin/head',$hdataarr);
		$this -> load -> view('admin/header');
		$this -> load -> view('admin/leftsidebar');
		/*
		//$quotationslistarr = $this -> Quotation_model -> quotationslist();
		$quotationlistdata = array(
			'companyname'			=> $this -> config -> item("companyname"),
			'companyaddress'		=> $this -> config -> item("companyaddress"),
			'companyphone'			=> $this -> config -> item("companyphone"),
			'companyemail'			=> $this -> config -> item("companyemail"),
			'companyaccountno'		=> $this -> config -> item("companyaccountno"),
			'taxpercentage'			=> $this -> config -> item("taxpercentage")
		);
		*/
		$this -> load -> view('forms/formsentry');
		$this -> load -> view('admin/footer');
		$bottomdataarr = array(
			'controller'	=> $this -> thiscontroller,
			'function'		=> $this -> thisfunction
		);
		$this -> load -> view('admin/bottom',$bottomdataarr);
	}
	public function editform($formid){
		$this -> Admin_model -> checklogin();
		$hdataarr = array(
			'controller'	=> $this -> thiscontroller,
			'function'		=> $this -> thisfunction,
			'title'			=> 'Edit Form'
		);
		$this -> load -> view('admin/head',$hdataarr);
		$this -> load -> view('admin/header');
		$this -> load -> view('admin/leftsidebar');
		/*
		//$quotationslistarr = $this -> Quotation_model -> quotationslist();
		$quotationlistdata = array(
			'companyname'			=> $this -> config -> item("companyname"),
			'companyaddress'		=> $this -> config -> item("companyaddress"),
			'companyphone'			=> $this -> config -> item("companyphone"),
			'companyemail'			=> $this -> config -> item("companyemail"),
			'companyaccountno'		=> $this -> config -> item("companyaccountno"),
			'taxpercentage'			=> $this -> config -> item("taxpercentage")
		);
		*/
		$this -> load -> view('forms/editform');
		$this -> load -> view('admin/footer');
		$bottomdataarr = array(
			'controller'	=> $this -> thiscontroller,
			'function'		=> $this -> thisfunction
		);
		$this -> load -> view('admin/bottom',$bottomdataarr);
	}
	public function formaddsave(){
		$formname 	= $this -> input -> post("formname");
		$formentrycount 	= $this -> input -> post("formentrycount");
		$i = 0;
		$success = 0;
		do{
			$formid = rand(1000,9999);
			$formidquery = "select id from ".TABLEFORMS." where formid = ".$formid."";
			$formidresult = $this -> db -> query($formidquery);
			//echo "<br />num_rows - ".$formidresult -> num_rows();
			if($formidresult -> num_rows() <= 0) $success = 1;
		}while($success == 0);
		//exit;
		for($i = 1;$i <= $formentrycount;$i++){
			$inputtype = $this -> input -> post("inputtype".$i);
			if($inputtype != ""){
				$labelname = $this -> input -> post("labelname".$i);
				$classnames = $this -> input -> post("classnames".$i);
				$cssstyles = $this -> input -> post("cssstyles".$i);
				
				$columnsarr = array(
					"inputtype"		=> $inputtype,
					"labelname"		=> $labelname,
					"classnames"	=> $classnames,
					"cssstyles"		=> $cssstyles
				);
				$columnsjson = json_encode($columnsarr);
				$insertquery = "insert into ".TABLEFORMS." (formid,formname,columns,addedby,addedtime) values ('".$formid."','".$formname."','".$columnsjson."','".$this -> session -> userdata("admin")."','".time()."')";
				$this -> db -> query($insertquery);
			}
		}
		if($i > 0)
		$returnmessage = array(
			"success"	=> "success"
		);
		else
		$returnmessage = array(
			"errormessage"	=> "No Form added !!! Please try again !!!"
		);
		echo json_encode($returnmessage);
	}
	public function formsubmitsave(){
		//$getformitemsquery = "select * from ";
		$formname = "";
		$formid 	 = $this -> input -> post("formid");
		//$formentries = $this -> input -> post("formentries");
		$getformitemsquery = $this -> db -> select('columns,formname') -> from(TABLEFORMS) -> where("formid",$formid) -> get();
		//echo "<pre>";print_r($getformitemsquery);echo "</pre>";
		//echo $getformitemscount = $getformitemsquery -> affected_rows;
		//echo $getformitemsquery -> result_id  -> num_rows;exit;
		if($getformitemsquery -> result_id  -> num_rows > 0){
			foreach($getformitemsquery -> result() as $getformitemsquerykey){
				//echo "<pre>";print_r($getformitemsquerykey);echo "</pre>";
				$getformitemsquerykeyarr = json_decode($getformitemsquerykey -> columns);
				//echo "<pre>";print_r($getformitemsquerykeyarr);echo "</pre>";
				$labelname = strtolower(str_replace(" ","",$getformitemsquerykeyarr -> labelname));
				$getformitemsquerykeyarrval[$labelname] = $this -> input -> post($labelname);
				$formname = $getformitemsquerykey -> formname;
			}
			$formentries = json_encode($getformitemsquerykeyarrval);
			$insertquery = "insert into ".TABLEFORMENTRIES." (formid,formname,formentries,enterytime) values ('".$formid."','".$formname."','".$formentries."','".time()."')";
			echo $this -> db -> query($insertquery);
		}else{
			echo "In-Valid Form !!!";
		}
	}
}