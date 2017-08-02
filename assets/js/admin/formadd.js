(function($){
	$(document).ready(function(){
		$("#formentrycount").val("0");
		$("#paymentdue").datepicker({autoclose: true});
	});
})(jQuery);
function addformitem(){
	var inputtype = $("#inputtype").val();
	var labelname 	= $("#labelname").val();
	var classnames 	= $("#classnames").val();
	var cssstyles  	= $("#cssstyles").val();
	//alert(inputtype);
	if(inputtype == ""){
		$("#inputtype").focus();
		return false;
	}
	if(labelname == ""){
		$("#labelname").focus();
		return false;
	}
	
	
	var formentrycount = parseInt($("#formentrycount").val());
	//alert(formentrycount);
	formentrycount = formentrycount + 1;
	
	 // var trhtml = "<div class='box-body col-md-4'><div class='form-group'><label for='pageheading'>Product</label><input type='text' class='form-control' id='productname' name='productname' placeholder='Product Description' /></div></div><div class='box-body col-md-4'><div class='form-group'><label for='pageheading'>Product</label><input type='text' class='form-control' id='productname' name='productname' placeholder='Product Description' /></div></div><div class='box-body col-md-4'><div class='form-group'><label for='pageheading'>Product</label><input type='text' class='form-control' id='productname' name='productname' placeholder='Product Description' /></div></div>";
	
	//var trhtml = "<div class='box-body col-md-3' style='height:20px;'><div class='form-group'><label for='pageheading'>"+productname+"</label></div></div><div class='box-body col-md-3 style='height:20px;'><div class='form-group'><label for='pageheading'>"+quantity+"</label></div></div><div class='box-body col-md-3'><div class='form-group'><label for='pageheading'>"+unitprice+"</label></div></div><div class='box-body col-md-3' style='height:20px;'><div class='form-group'><button type='button' onClick='removethis();'></button></div></div>";

	/*
	var trhtml = "<div class='box-body col-md-4' style='border-bottom:solid 1px #CCCCCC;' id='row"+formentrycount+"1'><div class='form-group'><label for='pageheading' id='productname"+formentrycount+"'>"+productname+"</label></div></div><div class='box-body col-md-2' style='border-bottom:solid 1px #CCCCCC;' id='row"+formentrycount+"2'><div class='form-group'><label for='pageheading' id='labelname"+formentrycount+"'>"+labelname+"</label></div></div><div class='box-body col-md-2' style='border-bottom:solid 1px #CCCCCC;' id='row"+formentrycount+"3'><div class='form-group'><label for='pageheading' id='classnames"+formentrycount+"'>"+classnames+"</label></div></div><div class='box-body col-md-2' style='border-bottom:solid 1px #CCCCCC;' id='row"+formentrycount+"4'><div class='form-group'><label for='pageheading' id='cssstyles"+formentrycount+"'>"+cssstyles+"</label></div></div><div class='box-body col-md-2' id='row"+formentrycount+"5'><div class='form-group' style='border-bottom:solid 1px #CCCCCC;padding-bottom:10px;'><label for='pageheading' id='button"+formentrycount+"'><button type='button' onClick='removethis(\""+formentrycount+"\");' class='btn btn-default'>Delete</button></label></div></div>";
	alert(trhtml);
	*/
	// var tabletrhtml = "<tr><td>1</td><td>Call of Duty</td><td>455-981-221</td><td>El snort testosterone trophy driving gloves handsome</td><td>$64.50</td></tr>";
	/*
	var tabletrhtml = "<tr id='row"+formentrycount+"'><td id='productname"+formentrycount+"'>"+productname+"</td><td style='text-align:center;' id='quantity"+formentrycount+"'>"+quantity+"</td><td style='text-align:right;padding-right:20px;' id='unitprice"+formentrycount+"'>"+unitprice+"</td><td style='text-align:right;padding-right:20px;' id='subtotal"+formentrycount+"'>"+subtotal+"</td><td style='text-align:center;'><button type='button' onClick='removethis(\""+formentrycount+"\");' class='btn btn-default'>Delete</button></td></tr>";
	*/
	var tabletrhtml = "<tr id='row"+formentrycount+"'><td id='inputtype"+formentrycount+"'>"+inputtype+"</td><td id='labelname"+formentrycount+"'>"+labelname+"</td><td id='classnames"+formentrycount+"'>"+classnames+"</td><td id='cssstyles"+formentrycount+"'>"+cssstyles+"</td><td style='text-align:center;'><button type='button' onClick='removethis(\""+formentrycount+"\");' class='btn btn-default'>Delete</button></td></tr>";
	
	$("#formtablebody").append(tabletrhtml);
	
	//$("#formitemtable").append(trhtml);
	
	$("#formentrycount").val(formentrycount);
	//$("#inputtype").val("");
	$("#labelname").val("");
	$("#classnames").val("");
	$("#cssstyles").val("");
	$("#inputtype").focus();
	//$("#formaddmessage").html("New form Item Added Successfuly !!!");
	//setTimeout(function(){$("#formaddmessage").html("");},2000);
	//getsubtotal();
	//showgrandtotal();
}
function removethis(thisvalue){
	//alert(thisvalue);
	var conf = confirm("Are you sure to delete this item ?");
	if(conf){
		$("#inputtype"+thisvalue).html("");
		$("#labelname"+thisvalue).html("");
		$("#classnames"+thisvalue).html("");
		$("#cssstyles"+thisvalue).html("");
		$("#button"+thisvalue).html("");
		
		$("#row"+thisvalue).css("display","none");
		// $("#row"+thisvalue+"1").css("height","0px").css("border-bottom","0px");
		// $("#row"+thisvalue+"2").css("height","0px").css("border-bottom","0px");
		// $("#row"+thisvalue+"3").css("height","0px").css("border-bottom","0px");
		// $("#row"+thisvalue+"4").css("height","0px").css("border-bottom","0px");
		// $("#row"+thisvalue+"5").css("height","0px");
		// $("#row"+thisvalue+"5 > div").css("border-bottom","0px");
		//getcssstyles();
		//showgrandtotal();
	}
}

function hideform(){
	$("#formitemaddform").hide();
}
function showform(){
	$("#formitemaddform").css("display","block");
	$("#inputtype").focus();
}
function saveform(){
	var formname 	= $("#formname").val();
	if(formname == ""){
		alert("Please add Form Name !!!");
		$("#formname").focus();
	return false;
	}
	var jsondata = {};
	jsondata['formname']		= formname;
	
	var formentrycount = $("#formentrycount").val();
	//var thissubtotal = 0,grandtotal = 0;
	//alert(formentrycount);
	for(var i = 1 ;i <= formentrycount;i++){
		//alert(i);
		//if($("#subtotal"+i).html() != ""){
			//alert($("#classnames"+i).html());
			//grandtotal = grandtotal + parseFloat($("#subtotal"+i).html());
			jsondata['inputtype'+i] 	= $("#inputtype"+i).html();
			jsondata['labelname'+i] 		= $("#labelname"+i).html();
			jsondata['classnames'+i] 	= $("#classnames"+i).html();
			//jsondata['subtotal'+i] 		= $("#subtotal"+i).html();
		//}
	}
	//jsondata['subtotal'] = $("#subtotaldisplayvalue").html();
	//jsondata['taxamount'] = $("#taxamountdisplayvalue").html();
	//jsondata['grandtotal'] = $("#grandtotaldisplayvalue").html();
	//alert($("#grandtotaldisplayvalue").html());

	jsondata['formentrycount'] = formentrycount;
	var url = $("#formsaveurl").val();
	//alert(url);
	if(formentrycount > 0){
		$.ajax({
			url:url,
			data:jsondata,
			type:"post",
			success:function(data){
				//alert(XMLHttpRequest.responseText);
				//alert(data);
				 var jsonreturndata = JSON.parse(data);
				// //alert(jsonreturndata.redirect);
				 if(jsonreturndata.success != "" && jsonreturndata.success != undefined){
					alert("Form added successfully !!!");
					window.location.href = window.location.href;
				 }
				 if(jsonreturndata.errormessage != "" && jsonreturndata.errormessage != undefined){
					 //window.location.href = jsonreturndata.errormessage;
					alert(jsonreturndata.errormessage);
				 }
				// if(jsonreturndata.reply != "" && jsonreturndata.reply != undefined){
					// $("#modalheading").html("Login Error !!!");
					// $("#modaldescription").html(jsonreturndata.reply);
					// $("#alertModal").modal({ show: true});
					// //$(document).find(".md-trigger").click();
				// }
			},
			error:function(xhr, tst, err){
				alert('XHR ERROR ' + err);
			}
		});
	}else{
		alert("Please add form item !!!");
		showform();
		$("#inputtype").focus();
	}
return false;
}