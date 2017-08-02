(function($){
	$(document).ready(function(){
		$("#alertModal").modal({ show: false});
		$("#adminlogin").click(function(){
			var jsondata = {};
			var email = $("#username").val();
			var password = $("#password").val();
			var validationerror = "";
			var slno = 0;
			if(email == ""){
				slno++;
				validationerror = slno+". Please enter your email !!!<br />";
			}
			if(password == ""){
				slno++;
				validationerror += slno+". Please enter the password !!!";
			}
			//alert(validationerror);
			if(validationerror == ""){
				var url = $("#loginurl").val();
				jsondata['email'] = email;
				jsondata['password'] = password;
				$.ajax({
					url:url,
					data:jsondata,
					type:"post",
					success:function(data){
						//alert(XMLHttpRequest.responseText);
						//alert(data);
						var jsonreturndata = JSON.parse(data);
						//alert(jsonreturndata.redirect);
						if(jsonreturndata.redirect != "" && jsonreturndata.redirect != undefined){
							window.location.href = jsonreturndata.redirect;
						}
						if(jsonreturndata.reply != "" && jsonreturndata.reply != undefined){
							$("#modalheading").html("Login Error !!!");
							$("#modaldescription").html(jsonreturndata.reply);
							$("#alertModal").modal({ show: true});
							//$(document).find(".md-trigger").click();
						}
					},
					error:function(xhr, tst, err){
						alert('XHR ERROR ' + err);
					}
				});
			}else{
				$("#modalheading").html("Validation Error !!!");
				$("#modaldescription").html(validationerror);
				$("#alertModal").modal({ show: true});
				//$(document).find(".md-trigger").click();
			}
		});
	});
})(jQuery);