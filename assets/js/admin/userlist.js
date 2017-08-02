function createuser1(){
	alert("sdf");
}
function createuser(){
	//alert("sdlfjsdf");
	
	var username = $("#username").val();
	var fullname = $("#fullname").val();
	var password = $("#password").val();
	var password1 = $("#password1").val();
	
	if(username == ""){
		$("#username").focus();
		return false;
	}
	if(fullname == ""){
		$("#fullname").focus();
		return false;
	}
	if(password == ""){
		$("#password").focus();
		return false;
	}
	if(password == "" || password != password1){
		$("#password1").focus();
		alert("Password Cannot be Empty and Please enter same value in Password and Confirm Password !!!");
		return false;
	}
}
function statuschange(userid,thisval){
	var newvalue = $("#"+thisval.id).val();
	var jsondata = {};
	//alert(userid);
	
	//alert(validationerror);
	if(newvalue != ""){
		var url = $("#statuschangeurl").val();
		//alert(url);
		jsondata['newvalue'] = newvalue;
		jsondata['userid'] = userid;
		$.ajax({
			url:url,
			data:jsondata,
			type:"post",
			success:function(data){
				//alert(XMLHttpRequest.responseText);
				//alert(data);
				//var jsonreturndata = JSON.parse(data);
				//alert(jsonreturndata.redirect);
				if(data == "0"){
					// $("#modalheading").html("User Status Updated !!!");
					// $("#modaldescription").html("User Status Updated Successfully !!!");
					// $("#alertModal").modal({ show: true});
					$("#status"+userid).html(newvalue);
					// setTimeout(function(){
						// window.location.href = jsonreturndata.redirect;
					// },2000);
				}else{
					$("#modalheading").html("Error !!!");
					$("#modaldescription").html("Error Updating User Status !!!");
					$("#alertModal").modal({ show: true});
				}
				// if(jsonreturndata.failuremessage != "" && jsonreturndata.failuremessage != undefined){
					// $("#modalheading").html("Album Add Error !!!");
					// $("#modaldescription").html(jsonreturndata.failuremessage);
					// $("#alertModal").modal({ show: true});
				// }
			},
			error:function(xhr, tst, err){
				alert('XHR ERROR ' + err);
			}
		});
	}
}
function deleteuser(){
	
}