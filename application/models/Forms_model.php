<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forms_model extends CI_Model{
	var $thiscontroller,$thisfunction;
	public function __construct(){
		parent::__construct();
		$thiscontroller = $this->uri->segment(1);
		$thisfunction = $this->uri->segment(2);
	}
	public function index(){
		
	}
	public function formslist(){
		$query = "select * from ".TABLEFORMS." group by formid order by id desc";
		$result = $this -> db -> query($query);
		$resultrow = array();
		foreach($result -> result() as $row){
			$resultrow[] = $row;
		}
	return $resultrow;
	}
	public function formentrieslist($formid=""){
		$where = "";
		if($formid != ""){
			$where = " where formid = '".$formid."'";
		}
		$query = "select * from ".TABLEFORMENTRIES." ".$where." order by id desc";
		$result = $this -> db -> query($query);
		$resultrow = array();
		foreach($result -> result() as $row){
			$resultrow[] = $row;
		}
	return $resultrow;
	}
	public function formcontentoutput($formid){
		$formquery = "select * from ".TABLEFORMS." where formid = '".$formid."'";
		$formresult = $this -> db -> query($formquery);
		$i = 0;
		foreach($formresult -> result() as $formrow){
			$formcontent[$i]['formname']	= $formrow -> formname;
			$formcontent[$i]['inputs']		= $formrow -> columns;
			$i++;
		}
	return $formcontent;
	}
	public function formdisplayhtml1($formid){
		$formcontents = $this -> Forms_model -> formcontentoutput($formid);
		//echo "<pre>";print_r($formcontents);echo "</pre>";
		$formhtml = '<div class="row" id="form'.$formid.'">';
			$count = 0;
			foreach($formcontents as $formcontentsrow){
				//print_r($formcontentsrow);
				$count++;
				if($count == 1)	$formhtml .= '<h4>'.$formcontentsrow['formname'].'</h4>';
				$formhtml .= '<div class="col-sm-4">';
					$thisinputs = json_decode($formcontentsrow['inputs']);
					$formhtml .= '<label>'.$thisinputs -> labelname.'</label>';
					$thisinput = "";
					if($thisinputs -> inputtype == "text") $thisinput = '<input type="text" id="'.strtolower(str_replace(" ","",$thisinputs -> labelname)).'" name="'.strtolower(str_replace(" ","",$thisinputs -> labelname)).'" placeholder="'.strtolower(str_replace(" ","",$thisinputs -> labelname)).'" class="'.$thisinputs -> classnames.'" style="'.$thisinputs -> cssstyles.'" />';

					if($thisinputs -> inputtype == "textarea") $thisinput = '<textarea id="'.strtolower(str_replace(" ","",$thisinputs -> labelname)).'" name="'.strtolower(str_replace(" ","",$thisinputs -> labelname)).'" placeholder="'.strtolower(str_replace(" ","",$thisinputs -> labelname)).'" class="'.$thisinputs -> classnames.'" style="'.$thisinputs -> cssstyles.'"></textarea>';
					
					$formhtml .= ''.$thisinput.'';
				$formhtml .= '</div>';
			}
			$formhtml .= '<div class="col-sm-4">';
				$thisinput = '<button type="submit" id="submit" name="submit" onClick="return formsubmit(\''.$formid.'\');">Submit</button>';
				$formhtml .= ''.$thisinput.'';
			$formhtml .= '</div>';
		$formhtml .= '</div>';
		//$formhtml .= $this -> Forms_model -> formsubmit($formid);
	return $formhtml;
	}
	public function formsubmit($formid){
		
		$formsubmit = '<script src="'.base_url("/assets/modules/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js").'"></script>';
		
		$formsubmit .= '<script type="text/javascript">';
		$formsubmit .= 'function formsubmit(thisval){
			//alert(thisval);
			var jsondata = {};
			jsondata["formid"] = "'.$formid.'";
			//var jsondata["formentries"] = {};
			$("#form'.$formid.' :input").each(function(){
				//alert($("#"+this.id).val());
				//alert(this.id);
				jsondata[this.id] = $("#"+this.id).val();
			});
			var url = "'.base_url("forms/formsubmitsave").'";
			//alert(url);
			$.ajax({
			url:url,
			data:jsondata,
			type:"post",
			success:function(data){
				//alert(data);
				if(data == "1"){
					alert("Form Successfully submitted !!!");
				}else{
					alert("Error submitting the form !!! Please try again !!!");
				}
			},
			error:function(xhr, tst, err){
				alert("XHR ERROR " + err);
			}
		});
		return false;	
		}
		';
		$formsubmit .= '';
		$formsubmit .= '';
		$formsubmit .= '</script>';
	return $formsubmit;
	}
}