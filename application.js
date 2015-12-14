$(document).ready(function(){
	$("#universityOther").click(function(){
		$("#universityOtherVal").focus();
	});
	$("#universityOtherVal").click(function(){
		$("#universityOther").prop("checked",true);
	});
	
	$("#yearOfStudyOther").click(function(){
		$("#yearOfStudyOtherVal").focus();
	});
	$("#yearOfStudyOtherVal").click(function(){
		$("#yearOfStudyOther").prop("checked",true);
	});
});