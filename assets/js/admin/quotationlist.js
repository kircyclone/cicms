function convertqtoi(quotationid){
	alert(quotationid);
	jsondata = {};
	jsondata['quotationid'] = quotationid;
	var url = $("#converttoinvoiceurl").val()+"/"+quotationid;
	$.ajax({
		url:url,
		data:jsondata,
		type:"post",
		success:function(data){
			//alert(XMLHttpRequest.responseText);
			alert(data);
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
return false;
}