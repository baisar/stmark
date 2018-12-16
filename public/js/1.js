$(function() {

// Homepage
var hp = "http://st"; 

// Setting mainpage image content to 100% with window size 
$("#slider").css("height",$(window).height())
// $(window).resize(function() {
// 	$("#slider").css("height",$(this).height())
// })
// Activating collapsible
$('.collapsible').collapsible();

// Contact page
$("#Contacts").submit(function() {
	var form_data = new FormData(this);
	M.toast({html : "Message is being sent, please wait",displayLength: 4000});
	$(".progress").show();
	$(this).addClass("disabledbutton");
	$.ajax({
		url:hp + "/contacts",
		type: "POST",
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        success: function(data){
			console.log(data);	
		}
	})
	return false;
})
$('.slider').flexslider({
    animation: "slide",
    animationLoop: false,
    itemWidth: 210,
    itemMargin: 5
  });












/*$(window).scroll(function() {
	var win = $(window).scrollTop();
	if(win >= 70){
		$("header").css({"background":"rgba(0,0,0,.9)"});
		$(".menu a").css("opacity",1);
	}
	else{
		$("header").css({"background":"transparent"});
		$(".menu a").css("opacity",".7");
	}
	console.log(win)
})
*/

})