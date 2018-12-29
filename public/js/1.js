$(function() {

var winHeight = $(window).height();
var hp = "http://st";
$( window ).on( "load", function(){ $(".grid").masonry(); } );

// ================================
if(winHeight >= 969){
	$("#slider").css("height",969)
	// $("#slider").css("height",$(window).height())
}
else if(winHeight < 969){
	$("#slider").css("height",600)
	$("#usa,#trusted").hide()
	$("#div").css({"top" : "60%"})
	$(".main_div").css({"margin":"100px 0 0"})
}

// ================================
$('select').formSelect();
$(".grid").masonry()
// APPLY FOR JOB
$("#Apply").submit(function() {
	var form_data = new FormData(this);
	$(this).addClass("disabledbutton");

	M.toast({html: "Form is being submitted"});

	$.ajax({
		url: hp + "/apply-for-job/12",
		type: "post",
		cache: false,
        contentType: false,
        processData: false,
		data: form_data,
		success: function(data) {
			M.Toast.dismissAll()
			console.log(data);
			data = $.parseJSON(data);
			if(data.cv){
				M.toast({html: "Attached file is not PDF format file, or more than 4mb",displayLength: 40000})
				$("#Apply").removeClass("disabledbutton");

			}
			if(data.status == "ok"){
				M.toast({html: "Form has successfully been submitted, you will get an answer as soon as possible, thanks",displayLength: 40000})
			}
		}
	})
	return false;
})











})