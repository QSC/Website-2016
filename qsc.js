$(document).ready(function(){
	//Facebook highlight
	$("#FB_icon").mouseover(function(){
		$(this).addClass("hover");
		$("#FB_text").addClass("hover");
	});
	$("#FB_icon").mouseout(function(){
		$(this).removeClass("hover");
		$("#FB_text").removeClass("hover");
	});
	
	$("#FB_text").mouseover(function(){
		$(this).addClass("hover");
		$("#FB_icon").addClass("hover");
	});
	$("#FB_text").mouseout(function(){
		$(this).removeClass("hover");
		$("#FB_icon").removeClass("hover");
	});
	
	
	//Twitter
	$("#TW_icon").mouseover(function(){
		$(this).addClass("hover");
		$("#TW_text").addClass("hover");
	});
	$("#TW_icon").mouseout(function(){
		$(this).removeClass("hover");
		$("#TW_text").removeClass("hover");
	});
	
	$("#TW_text").mouseover(function(){
		$(this).addClass("hover");
		$("#TW_icon").addClass("hover");
	});
	$("#TW_text").mouseout(function(){
		$(this).removeClass("hover");
		$("#TW_icon").removeClass("hover");
	});
	
	//Instagram
	$("#IG_icon").mouseover(function(){
		$(this).addClass("hover");
		$("#IG_text").addClass("hover");
	});
	$("#IG_icon").mouseout(function(){
		$(this).removeClass("hover");
		$("#IG_text").removeClass("hover");
	});
	
	$("#IG_text").mouseover(function(){
		$(this).addClass("hover");
		$("#IG_icon").addClass("hover");
	});
	$("#IG_text").mouseout(function(){
		$(this).removeClass("hover");
		$("#IG_icon").removeClass("hover");
	});
	
	
	//YouTube
	$("#YT_icon").mouseover(function(){
		$(this).addClass("hover");
		$("#YT_text").addClass("hover");
	});
	$("#YT_icon").mouseout(function(){
		$(this).removeClass("hover");
		$("#YT_text").removeClass("hover");
	});
	
	$("#YT_text").mouseover(function(){
		$(this).addClass("hover");
		$("#YT_icon").addClass("hover");
	});
	$("#YT_text").mouseout(function(){
		$(this).removeClass("hover");
		$("#YT_icon").removeClass("hover");
	});
	
	
	// To-top rocket
	$("#rocket").mouseover(function(){
		$("#rocket").attr("src","Photos/rocket-hover.png");
	});
	$("#rocket").mouseout(function(){
		$("#rocket").attr("src","Photos/rocket.png");
	});
});
