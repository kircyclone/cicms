function imageview(imageurl){
	$("#modalheading").html("Image View");
	var imagetag = '<img src="'+imageurl+'" style="max-width:100%;max-height:100%;" />';
	$("#modaldescription").html(imagetag);
	$("#alertModal").modal({ show: true});
}

function showhidealbumimage(albumimageid,showhide){
	var conf = confirm("Are you sure to change the visibility of this Image ?");
		
	if(conf){
		var jsondata = {};
		var url = $("#showhideimageurl").val();
		//alert(url);
		jsondata['albumimageid'] = albumimageid;
		jsondata['showhide'] = showhide;
		$.ajax({
			url:url,
			data:jsondata,
			type:"post",
			success:function(data){
				var returnmessage = "";
				//alert(data);
				var data1 = parseInt(data);
				alert(data1);
				
				if(data1 > 0){
					returnmessage = "Image status changed Successfully !!!";
					$("#modalheading").html("Image Status Reply !!!");
					$("#modaldescription").html(returnmessage);
					$("#alertModal").modal({ show: true});
					setTimeout(function(){
						window.location.href = window.location.href;
					},3000);
				}else{
					returnmessage = "No image status updated !!!";
					$("#modalheading").html("Image Status Reply !!!");
					$("#modaldescription").html(returnmessage);
					$("#alertModal").modal({ show: true});
				}
			},
			error:function(xhr, tst, err){
				alert('XHR ERROR ' + err);
			}
		});
	}
}
function deletealbumimage(albumimageid){
	//alert(albumimageid);
	var conf = confirm("Are you sure to delete this Image ?");
		
	if(conf){
		var jsondata = {};
		var url = $("#deleteurl").val();
		//alert(url);
		jsondata['albumimageid'] = albumimageid;
		$.ajax({
			url:url,
			data:jsondata,
			type:"post",
			success:function(data){
				var returnmessage = "";
				//alert(data);
				var data1 = parseInt(data);
				//alert(data1);
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
				
				//alert(XMLHttpRequest.responseText);
				//alert(data);
				// var jsonreturndata = JSON.parse(data);
				// //alert(jsonreturndata.redirect);
				// if(jsonreturndata.successmessage != "" && jsonreturndata.successmessage != undefined){
					// $("#modalheading").html("Album Added !!!");
					// $("#modaldescription").html(jsonreturndata.successmessage);
					// $("#alertModal").modal({ show: true});
					// setTimeout(function(){
						// window.location.href = jsonreturndata.redirect;
					// },2000);
				// }
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