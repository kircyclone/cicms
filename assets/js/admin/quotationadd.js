(function($){
	$(document).ready(function(){
		$("#quotationentrycount").val("0");
		$("#paymentdue").datepicker({autoclose: true});
	});
})(jQuery);
function addquotationitem(){
	var productname = $("#productname").val();
	var quantity 	= $("#quantity").val();
	var unitprice 	= $("#unitprice").val();
	//alert(productname);
	if(productname == ""){
		$("#productname").focus();
		return false;
	}
	if(quantity == ""){
		$("#quantity").focus();
		return false;
	}
	if(unitprice == ""){
		$("#unitprice").focus();
		return false;
	}
	
	var quotationentrycount = parseInt($("#quotationentrycount").val());
	//alert(quotationentrycount);
	quotationentrycount = quotationentrycount + 1;
	
	 // var trhtml = "<div class='box-body col-md-4'><div class='form-group'><label for='pageheading'>Product</label><input type='text' class='form-control' id='productname' name='productname' placeholder='Product Description' /></div></div><div class='box-body col-md-4'><div class='form-group'><label for='pageheading'>Product</label><input type='text' class='form-control' id='productname' name='productname' placeholder='Product Description' /></div></div><div class='box-body col-md-4'><div class='form-group'><label for='pageheading'>Product</label><input type='text' class='form-control' id='productname' name='productname' placeholder='Product Description' /></div></div>";
	
	//var trhtml = "<div class='box-body col-md-3' style='height:20px;'><div class='form-group'><label for='pageheading'>"+productname+"</label></div></div><div class='box-body col-md-3 style='height:20px;'><div class='form-group'><label for='pageheading'>"+quantity+"</label></div></div><div class='box-body col-md-3'><div class='form-group'><label for='pageheading'>"+unitprice+"</label></div></div><div class='box-body col-md-3' style='height:20px;'><div class='form-group'><button type='button' onClick='removethis();'></button></div></div>";
	var subtotal = quantity * unitprice;
	subtotal = subtotal.toFixed(2);
	var trhtml = "<div class='box-body col-md-4' style='border-bottom:solid 1px #CCCCCC;' id='row"+quotationentrycount+"1'><div class='form-group'><label for='pageheading' id='productname"+quotationentrycount+"'>"+productname+"</label></div></div><div class='box-body col-md-2' style='border-bottom:solid 1px #CCCCCC;' id='row"+quotationentrycount+"2'><div class='form-group'><label for='pageheading' id='quantity"+quotationentrycount+"'>"+quantity+"</label></div></div><div class='box-body col-md-2' style='border-bottom:solid 1px #CCCCCC;' id='row"+quotationentrycount+"3'><div class='form-group'><label for='pageheading' id='unitprice"+quotationentrycount+"'>"+unitprice+"</label></div></div><div class='box-body col-md-2' style='border-bottom:solid 1px #CCCCCC;' id='row"+quotationentrycount+"4'><div class='form-group'><label for='pageheading' id='subtotal"+quotationentrycount+"'>"+subtotal+"</label></div></div><div class='box-body col-md-2' id='row"+quotationentrycount+"5'><div class='form-group' style='border-bottom:solid 1px #CCCCCC;padding-bottom:10px;'><label for='pageheading' id='button"+quotationentrycount+"'><button type='button' onClick='removethis(\""+quotationentrycount+"\");' class='btn btn-default'>Delete</button></label></div></div>";
	
	// var tabletrhtml = "<tr><td>1</td><td>Call of Duty</td><td>455-981-221</td><td>El snort testosterone trophy driving gloves handsome</td><td>$64.50</td></tr>";
	var tabletrhtml = "<tr id='row"+quotationentrycount+"'><td id='productname"+quotationentrycount+"'>"+productname+"</td><td style='text-align:center;' id='quantity"+quotationentrycount+"'>"+quantity+"</td><td style='text-align:right;padding-right:20px;' id='unitprice"+quotationentrycount+"'>"+unitprice+"</td><td style='text-align:right;padding-right:20px;' id='subtotal"+quotationentrycount+"'>"+subtotal+"</td><td style='text-align:center;'><button type='button' onClick='removethis(\""+quotationentrycount+"\");' class='btn btn-default'>Delete</button></td></tr>";
	$("#quotationtablebody").append(tabletrhtml);
	
	$("#quotationitemtable").append(trhtml);
	
	$("#quotationentrycount").val(quotationentrycount);
	$("#productname").val("");
	$("#quantity").val("");
	$("#unitprice").val("");
	$("#productname").focus();
	//$("#quotationaddmessage").html("New Quotation Item Added Successfuly !!!");
	//setTimeout(function(){$("#quotationaddmessage").html("");},2000);
	getsubtotal();
	showgrandtotal();
}
function removethis(thisvalue){
	//alert(thisvalue);
	var conf = confirm("Are you sure to delete this item ?");
	if(conf){
		$("#productname"+thisvalue).html("");
		$("#quantity"+thisvalue).html("");
		$("#unitprice"+thisvalue).html("");
		$("#subtotal"+thisvalue).html("");
		$("#button"+thisvalue).html("");
		
		$("#row"+thisvalue).css("display","none");
		// $("#row"+thisvalue+"1").css("height","0px").css("border-bottom","0px");
		// $("#row"+thisvalue+"2").css("height","0px").css("border-bottom","0px");
		// $("#row"+thisvalue+"3").css("height","0px").css("border-bottom","0px");
		// $("#row"+thisvalue+"4").css("height","0px").css("border-bottom","0px");
		// $("#row"+thisvalue+"5").css("height","0px");
		// $("#row"+thisvalue+"5 > div").css("border-bottom","0px");
		getsubtotal();
		showgrandtotal();
	}
}
function getsubtotal(){
	var quotationentrycount = $("#quotationentrycount").val();
	var thissubtotal = 0,grandtotal = 0;
	for(var i = 1 ;i <= quotationentrycount;i++){
		if($("#subtotal"+i).html() != ""){
			//thissubtotal = parseInt($("#quantity"+i).html()) * parseFloat($("#unitprice"+i).html());
			//grandtotal = grandtotal + thissubtotal;
			//alert($("#subtotal"+i).html());
			grandtotal = grandtotal + parseFloat($("#subtotal"+i).html());
		}
	}
	$("#subtotaldisplayvalue").html(grandtotal.toFixed(2));
	//alert(grandtotal);
}
function showgrandtotal(){
	var taxdisplayvalue = parseFloat($("#taxdisplayvalue").html());
	var subtotal = parseFloat($("#subtotaldisplayvalue").html());

	var taxamountdisplayvalue1 = (taxdisplayvalue / 100);

	var taxamountdisplayvalue = subtotal * taxamountdisplayvalue1;

	$("#taxamountdisplayvalue").html(taxamountdisplayvalue.toFixed(2));
	var grandtotal = taxamountdisplayvalue + subtotal;
	$("#grandtotaldisplayvalue").html(grandtotal.toFixed(2));
}
function hideform(){
	$("#quotationitemaddform").hide();
}
function showform(){
	$("#quotationitemaddform").css("display","block");
}
function savequotation(){
	var fromaddress 	= $("#fromaddress").val();
	var fromphone 		= $("#fromphone").val();
	var fromemail 		= $("#fromemail").val();
	var pagedescription = $("#pagedescription").val();
	
	var toname			= $("#toname").val();
	if(toname == ""){
		alert("Please add the To Name !!!");
		$("#toname").focus();
	return false;
	}
	var tophone 		= $("#tophone").val();
	var toaddress 		= $("#toaddress").val();
	var toemail 		= $("#toemail").val();

	var jsondata = {};
	jsondata['fromaddress']		= fromaddress;
	jsondata['fromphone'] 		= fromphone;
	jsondata['fromemail'] 		= fromemail;
	jsondata['pagedescription'] = pagedescription;
	
	jsondata['toname'] 			= toname;
	jsondata['toaddress'] 		= toaddress;
	jsondata['tophone'] 		= tophone;
	jsondata['toemail'] 		= toemail;
	
	var quotationentrycount = $("#quotationentrycount").val();
	var thissubtotal = 0,grandtotal = 0;
	//alert(quotationentrycount);
	for(var i = 1 ;i <= quotationentrycount;i++){
		//alert(i);
		if($("#subtotal"+i).html() != ""){
			//alert($("#unitprice"+i).html());
			//grandtotal = grandtotal + parseFloat($("#subtotal"+i).html());
			jsondata['productname'+i] 	= $("#productname"+i).html();
			jsondata['quantity'+i] 		= $("#quantity"+i).html();
			jsondata['unitprice'+i] 	= $("#unitprice"+i).html();
			jsondata['subtotal'+i] 		= $("#subtotal"+i).html();
		}
	}
	jsondata['subtotal'] = $("#subtotaldisplayvalue").html();
	jsondata['taxamount'] = $("#taxamountdisplayvalue").html();
	jsondata['grandtotal'] = $("#grandtotaldisplayvalue").html();
	//alert($("#grandtotaldisplayvalue").html());

	jsondata['quotationentrycount'] = quotationentrycount;
	var url = $("#quotationsaveurl").val();
	//alert(url);
	if(quotationentrycount > 0){
		$.ajax({
			url:url,
			data:jsondata,
			type:"post",
			success:function(data){
				//alert(XMLHttpRequest.responseText);
				//alert(data);
				 var jsonreturndata = JSON.parse(data);
				// //alert(jsonreturndata.redirect);
				 if(jsonreturndata.successredirect != "" && jsonreturndata.successredirect != undefined){
					 window.location.href = jsonreturndata.successredirect;
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
		alert("Please add quotation item !!!");
		showform();
		$("#productname").focus();
	}
return false;
}