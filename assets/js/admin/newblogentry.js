(function($){
	$(document).ready(function(){
		$("#alertModal").modal({ show: false});
		$("#addblog").click(function(){
			var jsondata = {};
			var blogname = $("#blogname").val();
			var validationerror = "";
			var slno = 0;
			if(blogname == ""){
				slno++;
				validationerror = slno+". Please enter your Blog Name !!!<br />";
				$("#blogname").focus();
			}
			
			//alert(validationerror);
			if(validationerror == ""){
				var url = $("#addblogurl").val();
				jsondata['blogname'] = blogname;
				$.ajax({
					url:url,
					data:jsondata,
					type:"post",
					success:function(data){
						//alert(XMLHttpRequest.responseText);
						//alert(data);
						var jsonreturndata = JSON.parse(data);
						//alert(jsonreturndata.redirect);
						if(jsonreturndata.message != "" && jsonreturndata.message != undefined){
							$("#modalheading").html("Login Error !!!");
							$("#modaldescription").html(jsonreturndata.message);
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