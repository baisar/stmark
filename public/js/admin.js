$(function() {

var hp = "http://st";

var winHeight = $(window).height();
$("#wrapper,.logincontainer").height(winHeight)
$(".grid").masonry()
$('select').formSelect();
$(document).load(function() {
	$(".grid").masonry()
})

// signin
$(".loginform").submit(function() {
	var form_data = new FormData(this); 
	M.toast({"html" : "Signing in"}); 
	$(this).addClass("disabledbutton");

	$.ajax({
		url: hp + "/admin",
		type: "POST",
        cache: false,
        contentType: false,
        processData: false,
		data: form_data,
		success: function(data) {
			data = $.parseJSON(data);
			if(data.status == "ok"){
				M.Toast.dismissAll();
				M.toast({"html" : "You are signed in as  <span class='orange-text' style='padding-left: 5px;'>admin</span>","completeCallback" : function() {
					location.reload()
				}},2000);
			}
			else{
				$(".loginform").removeClass("disabledbutton");
				M.Toast.dismissAll();
				M.toast({"html" : "<span class='orange-text' style='padding-left: 5px;'>You provided wrong user data</span>"});
			}
		}
	})
	
	return false;
})

$(".logout").click(function() {
	M.toast({html : "Logging out"})
	$(this).addClass("disabledbutton")
	$.ajax({
		url: hp+"/admin",
		type: "POST",
		data: {logout:1},
		success: function(data) {
			data = $.parseJSON(data);
			if(data.status == "ok"){
				M.Toast.dismissAll();
				M.toast({"html" : "<span class='orange-text' style='padding-left: 5px;'>Logged out</span>","completeCallback" : function() {
					location.reload()
				}},2000);
			}
		}
	})
	return false;
})

// hide page
$(".hidepage").click(function() {
	var pageId = $(this).data("id");
	$(this).addClass("disabledbutton")

	$.ajax({
		url: hp+"/admin/pages",
		type: "POST",
		data: {hidepage: pageId},
		success: function(data) {
			data = $.parseJSON(data)
			if(data.status == "ok"){
				M.toast({html : "Action done",completeCallback : function() {
					location.reload()
				}})
			}
			else{
				M.toast({html:"Error occured, please contact developer"});
			}
		}
	})
	return false;
})

// delete page
$(".deletePage").click(function() {
	var pageId = $(this).data("id")
	$(this).addClass("disabledbutton")

		$.ajax({
			url: hp+"/admin/pages",
			type: "POST",
			data: {deletepage: pageId},
			success: function(data) {
				console.log(data)
				data = $.parseJSON(data)
				if(data.status == "ok"){
					$(".grid-item[data-id='"+pageId+"']").addClass("disabledbutton")
					M.toast({html : "Action done"})
				}
				else M.toast({html:"Error occured, please contact developer"});
			}
		})

	return false;
})

// config
$("#config").submit(function() {
	var form_data = new FormData(this);
	var config = $("#config");
	config.addClass("disabledbutton");
	M.toast({html:"Saving"})

	$.ajax({
		url: hp+"/admin/config",
		type: "POST",
		cache: false,
		contentType: false,
		processData: false,
		data: form_data,
		success: function (data) {
			M.Toast.dismissAll()
			data = $.parseJSON(data)
			if(data.status == "ok"){
				M.toast({html: "Saved",completeCallback: function(){
					location.reload()
				}})
			}
			else{
				config.removeClass("disabledbutton");
				M.toast({html: "Something went wrong, please contact developer"});
			}
		}
	})
	
	return false;
})

// page edit
$("#pageedit").submit(function() {
	var data = CKEDITOR.instances.content.getData();
	var pageId = $("#pageId").val()
	$("textarea").val(data)
	var form_data = new FormData(this);
	form_data.append("editpage",1);
	form_data.set(data,data)
	
	M.toast({html:"Saving"})

	$.ajax({
		url: hp+"/admin/pages/" + pageId,
		type: "POST",
		cache: false,
		contentType: false,
		processData: false,
		data: form_data,
		success: function (data) {
			console.log(data);
			// return;
			M.Toast.dismissAll()
			data = $.parseJSON(data)
			if(data.status == "ok"){
				// $("#pageedit").removeClass("disabledbutton")
				M.toast({html: "Saved",completeCallback: function(){
					location.reload()
				}})
			}
			else{
				$("#pageedit").removeClass("disabledbutton");
				M.toast({html: "Something went wrong, please contact developer"});
			}
		}
	})
	return false;
})


// delete thumbnail
$(".delImg").click(function() {
	var pageId = $(this).data("page-id");
	var delImg = $(this).data("del-img")
	$(this).addClass("disabledbutton");
	$(".addImg").addClass("disabledbutton");
	$.ajax({
		url: hp+"/admin/pages/" + pageId,
		type: "POST",
		data: {delImg: delImg ,pageId:pageId},
		success: function(data) {
			console.log(data)
			data = $.parseJSON(data)
			if(data.status == "ok"){
				$("img[data-id='"+pageId+"']").addClass("disabledbutton");
				M.toast({html: "Thumbnail has been deleted", completeCallback: function() {
					location.reload()
				}})
			}
			else{
				M.toast({html: "Something went wrong, please contact developer"});
			}
		}
	})
	return false;
})




// add page
$(".addPage").submit(function() {
	var data = CKEDITOR.instances.content.getData();
	$("textarea").val(data)
	var form_data = new FormData(this);
	form_data.set(data,data)
	
	M.toast({html:"Saving information"})

	$.ajax({
		url: hp+"/admin/add-page",
		type: "POST",
		cache: false,
		contentType: false,
		processData: false,
		data: form_data,
		success: function (data) {
			console.log(data);
			M.Toast.dismissAll()
			data = $.parseJSON(data)
			if(data.status == "ok"){
				M.toast({html: "Saved",completeCallback: function(){
					location.reload()
				}})
			}
			else{
				$("#pageedit").removeClass("disabledbutton");
				M.toast({html: "Something went wrong, please contact developer"});
			}
		}
	})
	return false;
})

// copy to clipboard
$(".copyImg").click(function() {
	alert($(this).attr("value"))
	return false;
})


$(".add").click(function() {
	$("#file").click()
})
// upload  imgs to server
$("#file").change(function() {
	var form_data = new FormData($(".upload"))
	form_data.append("image",$("#file")[0].files[0]);
	$.ajax({
		url: hp + "/admin/upload",
		type: "POST",
		cache: false,
		processData: false,
		contentType: false,
		data: form_data,
		success:function(data) {
			console.log(data);
			M.Toast.dismissAll()
			data = $.parseJSON(data)
			if(data.status == "ok"){
				M.toast({html: "Uploaded",completeCallback: function(){
					location.reload()
				}})
			}
		}
	})
	return false;
})







})