(function($){
	$(document).ready(function(){
		//$("#alertModal").modal({ show: false});
		
		$("#addalbum").click(function(){
			var jsondata = {};
			var albumname = $("#albumname").val();
			var albumid	  = $("#albumid").val();
			
			var validationerror = "";
			var slno = 0;
			if(albumname == ""){
				slno++;
				validationerror = slno+". Please enter album name !!!<br />";
			}
			if(albumid != ""){
				jsondata['albumid'] = albumid;
			}
			
			//alert(validationerror);
			if(validationerror == ""){
				var url = $("#addalbumurl").val();
				//alert(url);
				jsondata['albumname'] = albumname;
				$.ajax({
					url:url,
					data:jsondata,
					type:"post",
					success:function(data){
						//alert(XMLHttpRequest.responseText);
						//alert(data);
						var jsonreturndata = JSON.parse(data);
						//alert(jsonreturndata.redirect);
						if(jsonreturndata.successmessage != "" && jsonreturndata.successmessage != undefined){
							$("#modalheading").html("Album Added !!!");
							$("#modaldescription").html(jsonreturndata.successmessage);
							$("#alertModal").modal({ show: true});
							setTimeout(function(){
								window.location.href = jsonreturndata.redirect;
							},2000);
						}
						if(jsonreturndata.failuremessage != "" && jsonreturndata.failuremessage != undefined){
							$("#modalheading").html("Album Add Error !!!");
							$("#modaldescription").html(jsonreturndata.failuremessage);
							$("#alertModal").modal({ show: true});
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