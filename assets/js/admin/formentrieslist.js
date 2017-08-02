function showFormEntryDetails(formentryid){
	var jsondata = {};
	var url = $("#showformentrydetailsurl").val();
	jsondata['formentryid'] = formentryid;

	$.ajax({
			url:url,
			data:jsondata,
			type:"post",
			success:function(data){
				$("#modalheading").html("Form Entry Details !!!");
				$("#modaldescription").html(data);
				$("#alertModal").modal({ show: true});
				//var returnmessage = "";
				//alert(data);
				//var data1 = parseInt(data);
				//alert(data1);
				/*
				if(data1 > 0){
					returnmessage = "Image Successfully deleted !!!";
					$("#modalheading").html("Image Delete Reply !!!");
					$("#modaldescription").html(returnmessage);
					$("#alertModal").modal({ show: true});
					setTimeout(function(){
						window.location.href = window.location.href;
					},3000);
				}else{
					returnmessage = "No image deleted !!!";
					$("#modalheading").html("Image Delete Reply !!!");
					$("#modaldescription").html(returnmessage);
					$("#alertModal").modal({ show: true});
				}
				*/
			},
			error:function(xhr, tst, err){
				alert('XHR ERROR ' + err);
			}
		});

	/*
	$("#modalheading").html("Form Entry Details !!!");
	$("#modaldescription").html("Description !!!");
	$("#alertModal").modal({ show: true});
	*/
return false;
}