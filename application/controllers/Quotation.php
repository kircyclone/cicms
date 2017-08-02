<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quotation extends CI_Controller {
	var $thiscontroller,$thisfunction,$editpageid;
	public function __construct(){
		parent::__construct();
		$this -> load -> model("Admin_model");
		$this -> load -> model("Quotation_model");
		$this -> thiscontroller = $this->uri->segment(1);
		$this -> thisfunction = $this->uri->segment(2);
		$this -> editpageid = $this->uri->segment(3);
	}
	public function index()
	{
		$this -> Admin_model -> checklogin();
		//$this -> load -> view('quotation/quotationslist');
		//echo "Hello World !!!";
		redirect("quotation/quotationslist");
	}

	public function quotationslist(){
		$this -> Admin_model -> checklogin();
		$hdataarr = array(
			'controller'	=> $this -> thiscontroller,
			'function'		=> $this -> thisfunction,
			'title'			=> 'Quotations List'
		);
		$this -> load -> view('admin/head',$hdataarr);
		$this -> load -> view('admin/header');
		$this -> load -> view('admin/leftsidebar');
		
		$quotationslistarr = $this -> Quotation_model -> quotationslist();
		//echo "<pre>";print_r($quotationslistarr);echo "</pre>";
		$quotationlistdata = array(
			'quotationslist'		=> $quotationslistarr
		);
		$this -> load -> view('quotation/quotationslist',$quotationlistdata);
		$this -> load -> view('admin/footer');
		$bottomdataarr = array(
			'controller'	=> $this -> thiscontroller,
			'function'		=> $this -> thisfunction
		);
		$this -> load -> view('admin/bottom',$bottomdataarr);
		
	}
	public function addnewquotation(){
		$this -> Admin_model -> checklogin();
		$hdataarr = array(
			'controller'	=> $this -> thiscontroller,
			'function'		=> $this -> thisfunction,
			'title'			=> 'Add New Quotation'
		);
		$this -> load -> view('admin/head',$hdataarr);
		$this -> load -> view('admin/header');
		$this -> load -> view('admin/leftsidebar');
		
		//$quotationslistarr = $this -> Quotation_model -> quotationslist();
		$quotationlistdata = array(
			'companyname'			=> $this -> config -> item("companyname"),
			'companyaddress'		=> $this -> config -> item("companyaddress"),
			'companyphone'			=> $this -> config -> item("companyphone"),
			'companyemail'			=> $this -> config -> item("companyemail"),
			'companyaccountno'		=> $this -> config -> item("companyaccountno"),
			'taxpercentage'			=> $this -> config -> item("taxpercentage")
		);
		$this -> load -> view('quotation/quotationform',$quotationlistdata);
		$this -> load -> view('admin/footer');
		$bottomdataarr = array(
			'controller'	=> $this -> thiscontroller,
			'function'		=> $this -> thisfunction
		);
		$this -> load -> view('admin/bottom',$bottomdataarr);
	}
	public function quotationformsave(){
		$i = 1;
		//echo "<pre>";print_r($_POST);echo "</pre>";
		
		
		$fromaddress 	= $this -> input -> post("fromaddress");
		$fromphone 		= $this -> input -> post("fromphone");
		$fromemail 		= $this -> input -> post("fromemail");
		$pagedescription= $this -> input -> post("pagedescription");
		$orderid		= $this -> input -> post("orderid");

		$toname 		= $this -> input -> post("toname");
		$toaddress 		= $this -> input -> post("toaddress");
		$tophone 		= $this -> input -> post("tophone");
		$toemail 		= $this -> input -> post("toemail");
		//$accountno 		= $this -> input -> post("accountno");


		$total 			= $this -> input -> post("subtotal");
		$tax 			= $this -> input -> post("taxamount");
		$gtotal 		= $this -> input -> post("grandtotal");


		$quotationentrycount = $this -> input -> post("quotationentrycount");

		$masvalquery = "select id from ".TABLEQUOTATION." order by id desc limit 1";
		$masvalresult = $this -> db -> query($masvalquery);

		$id = 0;
		foreach ($masvalresult -> result() as $row){
				$id = $row->id;
		}

		$quotationid = $id + 1;
		$numberlength = strlen((string)$quotationid);
		$quotationidsize = $this -> config -> item("quotationidsize");
		$prefixzeros = str_repeat("0",$quotationidsize-$numberlength);
		$quotationid = $this -> config -> item("quotationprefix").$prefixzeros.$quotationid;
		
		$insertquery = "insert into ".TABLEQUOTATION." (quotationid,fromaddress,fromphone,fromemail,toname,toaddress,tophone,toemail,orderid,total,tax,gtotal,quotationdatetime) values ('".$quotationid."','".$fromaddress."','".$fromphone."','".$fromemail."','".$toname."','".$toaddress."','".$tophone."','".$toemail."','".$orderid."','".$total."','".$tax."','".$gtotal."','".time()."')";
		
		if($this -> db -> query($insertquery) > 0){
			for($i = 1;$i <= $quotationentrycount;$i++){
				//echo "<br />".$i;
				
				$itemname = $this -> input -> post("productname".$i);
				if($itemname != ""){
					$quantity = $this -> input -> post("quantity".$i);
					$unitprice = $this -> input -> post("unitprice".$i);
					$subtotal = $this -> input -> post("subtotal".$i);
					
					$insertquery = "insert into ".TABLEQUOTATIONITEMS." (quotationid,itemname,itemdescription,quantity,price,subtotal) values ('".$quotationid."','".$itemname."','".$itemname."','".$quantity."','".$unitprice."','".$subtotal."')";
					$this -> db -> query($insertquery);
				}
			}
			//redirect("quotation/quotationprint/".$quotationid);
			echo json_encode(array(
				'successredirect' 	=> base_url("quotation/quotationprint/".$quotationid)
			));
		}
		else{
			echo json_encode(array(
				'errormessage' 	=> base_url("quotation/quotationprint/".$quotationid)
			));
		}
	}
	public function quotationprint($quotationid=""){
		$this -> Admin_model -> checklogin();
		
		if($quotationid != ""){
			$hdataarr = array(
				'controller'	=> $this -> thiscontroller,
				'function'		=> $this -> thisfunction,
				'title'			=> 'Print Quotation'
			);
			$this -> load -> view('admin/head',$hdataarr);

			$quotationquery = "select * from ".TABLEQUOTATION." where quotationid = '".$quotationid."'";
			$quotationresult = $this -> db -> query($quotationquery);
			if($quotationresult -> num_rows() > 0){
			foreach($quotationresult -> result() as $quotationrow){
				$quotationdataarr['quotationid'] = $quotationrow -> quotationid;
				$quotationdataarr['fromaddress'] = $quotationrow -> fromaddress;
				
				$quotationdataarr['fromphone'] 	= $quotationrow -> fromphone;
				$quotationdataarr['fromemail'] 	= $quotationrow -> fromemail;
				
				$quotationdataarr['toname'] 	= $quotationrow -> toname;
				$quotationdataarr['toaddress'] 	= $quotationrow -> toaddress;
				$quotationdataarr['tophone'] 	= $quotationrow -> tophone;
				$quotationdataarr['toemail'] 	= $quotationrow -> toemail;
				$quotationdataarr['total'] 		= $quotationrow -> total;
				$quotationdataarr['tax'] 		= $quotationrow -> tax;
				$quotationdataarr['gtotal'] 	= $quotationrow -> gtotal;
				
			}
			$i = -1;
			$quotationitemsquery = "select * from ".TABLEQUOTATIONITEMS." where quotationid = '".$quotationid."'";
			$quotationitemsresult = $this -> db -> query($quotationitemsquery);
			foreach($quotationitemsresult -> result() as $quotationitemsrow){
				$i++;
				$quotationdataarr['items'][$i]['itemname'] 	= $quotationitemsrow -> itemname;
				$quotationdataarr['items'][$i]['quantity'] 	= $quotationitemsrow -> quantity;
				$quotationdataarr['items'][$i]['price'] 	= $quotationitemsrow -> price;
				$quotationdataarr['items'][$i]['subtotal'] 	= $quotationitemsrow -> subtotal;
			}
			$quotationdataarr['windowonload']	= "window.print();";
			$this -> load -> view('quotation/quotationprint',$quotationdataarr);
			}else{
				$quotationdataarr['errormessage']	= "In-Valid Quotation Id !!! <a href='javascript:history.back(-1);'>Back</a>";
				$this -> load -> view('quotation/quotationerror',$quotationdataarr);
			}
			
			
		}else{
			
		}
	}
	/*
	public function testfile($passedid){
		return "Hello World !!!";
	}
	public function quotationprintpdf($quotationid){
		$pdfname = $quotationid."_".date("d-m-Y").".pdf";
		$file_url = base_url("quotation/testfile/".$quotationid);
		header('Content-Type: application/pdf');
		header('Content-Length: ' . filesize($file_url));
		//header("Content-Transfer-Encoding: Binary");
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s', filemtime($file_url)) . ' GMT');
		header('Accept-Ranges: bytes');  // For download resume
		header("Content-disposition: attachment; filename=".$pdfname);
		readfile($file_url);
	}
	*/
}