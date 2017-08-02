<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller {
	var $thiscontroller,$thisfunction,$editpageid;
	public function __construct(){
		parent::__construct();
		$this -> load -> model("Admin_model");
		$this -> load -> model("Invoice_model");
		$this -> thiscontroller = $this->uri->segment(1);
		$this -> thisfunction = $this->uri->segment(2);
		$this -> editpageid = $this->uri->segment(3);
	}
	public function index()
	{
		$this -> Admin_model -> checklogin();
		$this -> load -> view('invoice/invoiceslist');
		echo "Hello World !!!";
	}

	public function invoiceslist(){
		$this -> Admin_model -> checklogin();
		$hdataarr = array(
			'controller'	=> $this -> thiscontroller,
			'function'		=> $this -> thisfunction,
			'title'			=> 'Invoices List'
		);
		$this -> load -> view('admin/head',$hdataarr);
		$this -> load -> view('admin/header');
		$this -> load -> view('admin/leftsidebar');
		
		$invoiceslistarr = $this -> Invoice_model -> invoiceslist();
		//echo "<pre>";print_r($invoiceslistarr);echo "</pre>";
		$invoicelistdata = array(
			'invoiceslist'		=> $invoiceslistarr
		);
		$this -> load -> view('invoice/invoiceslist',$invoicelistdata);
		$this -> load -> view('admin/footer');
		$bottomdataarr = array(
			'controller'	=> $this -> thiscontroller,
			'function'		=> $this -> thisfunction
		);
		$this -> load -> view('admin/bottom',$bottomdataarr);
		
	}
	public function addnewinvoice(){
		$this -> Admin_model -> checklogin();
		$hdataarr = array(
			'controller'	=> $this -> thiscontroller,
			'function'		=> $this -> thisfunction,
			'title'			=> 'Add New invoice'
		);
		$this -> load -> view('admin/head',$hdataarr);
		$this -> load -> view('admin/header');
		$this -> load -> view('admin/leftsidebar');
		
		//$invoiceslistarr = $this -> invoice_model -> invoiceslist();
		$invoicelistdata = array(
			'companyname'			=> $this -> config -> item("companyname"),
			'companyaddress'		=> $this -> config -> item("companyaddress"),
			'companyphone'			=> $this -> config -> item("companyphone"),
			'companyemail'			=> $this -> config -> item("companyemail"),
			'companyaccountno'		=> $this -> config -> item("companyaccountno"),
			'taxpercentage'			=> $this -> config -> item("taxpercentage")
		);
		$this -> load -> view('invoice/invoiceform',$invoicelistdata);
		$this -> load -> view('admin/footer');
		$bottomdataarr = array(
			'controller'	=> $this -> thiscontroller,
			'function'		=> $this -> thisfunction
		);
		$this -> load -> view('admin/bottom',$bottomdataarr);
	}
	public function invoiceformsave(){
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
		
		$orderid 		= $this -> input -> post("orderid");
		$accountno 		= $this -> input -> post("accountno");
		$paymentdue 	= $this -> input -> post("paymentdue");


		$invoiceentrycount = $this -> input -> post("invoiceentrycount");

		$masvalquery = "select id from ".TABLEINVOICE." order by id desc limit 1";
		$masvalresult = $this -> db -> query($masvalquery);

		$id = 0;
		foreach ($masvalresult -> result() as $row){
				$id = $row->id;
		}

		$invoiceid = $id + 1;
		$numberlength = strlen((string)$invoiceid);
		$invoiceidsize = $this -> config -> item("invoiceidsize");
		$prefixzeros = str_repeat("0",$invoiceidsize-$numberlength);
		$invoiceid = $this -> config -> item("invoiceprefix").$prefixzeros.$invoiceid;

		$insertquery = "insert into ".TABLEINVOICE." (invoiceid,fromaddress,fromphone,fromemail,toname,toaddress,tophone,toemail,orderid,accountno,paymentdue,total,tax,gtotal,invoicedatetime) values ('".$invoiceid."','".$fromaddress."','".$fromphone."','".$fromemail."','".$toname."','".$toaddress."','".$tophone."','".$toemail."','".$orderid."','".$accountno."','".strtotime(str_replace("/","-",$paymentdue))."','".$total."','".$tax."','".$gtotal."','".time()."')";
//$insertquery1 = $paymentdue."-".strtotime(str_replace("/","-",$paymentdue));
		if($this -> db -> query($insertquery) > 0){
			for($i = 1;$i <= $invoiceentrycount;$i++){
				//echo "<br />".$i;
				
				$itemname = $this -> input -> post("productname".$i);
				if($itemname != ""){
					$quantity = $this -> input -> post("quantity".$i);
					$unitprice = $this -> input -> post("unitprice".$i);
					$subtotal = $this -> input -> post("subtotal".$i);
					
					$insertquery = "insert into ".TABLEINVOICEITEMS." (invoiceid,itemname,itemdescription,quantity,price,subtotal) values ('".$invoiceid."','".$itemname."','".$itemname."','".$quantity."','".$unitprice."','".$subtotal."')";
					$this -> db -> query($insertquery);
				}
			}
			echo json_encode(array(
				'successredirect' 	=> base_url("invoice/invoiceprint/".$invoiceid)
			));
		}
		else{
			echo json_encode(array(
				'errormessage' 	=> "Error !!!"
			));
		}


		
	}
	public function invoiceprint($invoiceid=""){
		$this -> Admin_model -> checklogin();
		
		if($invoiceid != ""){
			$hdataarr = array(
				'controller'	=> $this -> thiscontroller,
				'function'		=> $this -> thisfunction,
				'title'			=> 'Print invoice'
			);
			$this -> load -> view('admin/head',$hdataarr);

			$invoicequery = "select * from ".TABLEINVOICE." where invoiceid = '".$invoiceid."'";
			$invoiceresult = $this -> db -> query($invoicequery);
			foreach($invoiceresult -> result() as $invoicerow){
				$invoicedataarr['invoiceid'] = $invoicerow -> invoiceid;
				$invoicedataarr['fromaddress'] = $invoicerow -> fromaddress;
				
				$invoicedataarr['fromphone'] 	= $invoicerow -> fromphone;
				$invoicedataarr['fromemail'] 	= $invoicerow -> fromemail;
				
				$invoicedataarr['toname'] 	= $invoicerow -> toname;
				$invoicedataarr['toaddress'] 	= $invoicerow -> toaddress;
				$invoicedataarr['tophone'] 	= $invoicerow -> tophone;
				$invoicedataarr['toemail'] 	= $invoicerow -> toemail;
				$invoicedataarr['total'] 		= $invoicerow -> total;
				$invoicedataarr['tax'] 		= $invoicerow -> tax;
				$invoicedataarr['gtotal'] 	= $invoicerow -> gtotal;
				
				$invoicedataarr['orderid'] 	= $invoicerow -> orderid;
				$invoicedataarr['accountno']= $invoicerow -> accountno;
				$invoicedataarr['paymentdue'] 	= $invoicerow -> paymentdue;
				//$invoicedataarr['gtotal'] 	= $invoicerow -> gtotal;
				
			}
			$i = -1;
			$invoiceitemsquery = "select * from ".TABLEINVOICEITEMS." where invoiceid = '".$invoiceid."'";
			$invoiceitemsresult = $this -> db -> query($invoiceitemsquery);
			foreach($invoiceitemsresult -> result() as $invoiceitemsrow){
				$i++;
				$invoicedataarr['items'][$i]['itemname'] 	= $invoiceitemsrow -> itemname;
				$invoicedataarr['items'][$i]['quantity'] 	= $invoiceitemsrow -> quantity;
				$invoicedataarr['items'][$i]['price'] 	= $invoiceitemsrow -> price;
				$invoicedataarr['items'][$i]['subtotal'] 	= $invoiceitemsrow -> subtotal;
			}
			$invoicedataarr['windowonload']	= "window.print();";
			$this -> load -> view('invoice/invoiceprint',$invoicedataarr);
		}else{
			
		}
	}
	public function convertinvoice($quotationid){
		$this -> Admin_model -> checklogin();
		if($quotationid == ""){
			$returnmessage = array(
				"errormessage"	=> "In-Valid Quotation Id"
			);
		}else{			
			$masvalquery = "select id from ".TABLEINVOICE." order by id desc limit 1";
			$masvalresult = $this -> db -> query($masvalquery);

			$id = 0;
			foreach ($masvalresult -> result() as $row){
					$id = $row->id;
			}

			$invoiceid = $id + 1;
			$numberlength = strlen((string)$invoiceid);
			$invoiceidsize = $this -> config -> item("invoiceidsize");
			$prefixzeros = str_repeat("0",$invoiceidsize-$numberlength);
			$invoiceid = $this -> config -> item("invoiceprefix").$prefixzeros.$invoiceid;
			$paymentdue = strtotime("+30days");
	
			$invcounter = 0;
			$quotationquery = "select * from ".TABLEQUOTATION." where quotationid = '".$quotationid."'";
			$quotationresult = $this -> db -> query($quotationquery);
			$orderid = "";
			foreach($quotationresult -> result() as $quotationrow){
				$insertinvoicequery = "insert into ".TABLEINVOICE." (invoiceid,quotationid,fromaddress,fromphone,fromemail,toname,toaddress,tophone,toemail,orderid,accountno,paymentdue,total,tax,gtotal,invoicedatetime) values ('".$invoiceid."','".$quotationrow -> quotationid."','".$quotationrow -> fromaddress."','".$quotationrow -> fromphone."','".$quotationrow -> fromemail."','".$quotationrow -> toname."','".$quotationrow -> toaddress."','".$quotationrow -> tophone."','".$quotationrow -> toemail."','".$orderid."','".$this -> config -> item("companyaccountno")."','".$paymentdue."','".$quotationrow -> total."','".$quotationrow -> tax."','".$quotationrow -> gtotal."','".time()."')";
				if($this -> db -> query ($insertinvoicequery) > 0) $invcounter++;
			}
			if($invcounter > 0){
				$i = -1;
				$quotationitemsquery = "select * from ".TABLEQUOTATIONITEMS." where quotationid = '".$quotationid."'";
				$quotationitemsresult = $this -> db -> query($quotationitemsquery);
				foreach($quotationitemsresult -> result() as $quotationitemsrow){
					$insertquery = "insert into ".TABLEINVOICEITEMS." (invoiceid,itemname,itemdescription,quantity,price,subtotal) values ('".$invoiceid."','".$quotationitemsrow -> itemname."','".$quotationitemsrow -> itemname."','".$quotationitemsrow -> quantity."','".$quotationitemsrow -> price."','".$quotationitemsrow -> subtotal."')";
					$this -> db -> query($insertquery);
				}
				$returnmessage = array(
					"successredirect" => base_url("invoice/invoiceprint/".$invoiceid)
				);
			}
		}
		echo json_encode($returnmessage);
	}
}