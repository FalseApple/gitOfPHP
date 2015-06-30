$(document).ready(function() {

	$(function() {
		$("#datepicker").datepicker();
	});

	$('#btnCheck').click(function() {
		if ($('input[name=user]').val() != '') {
			alert("empty");
		} else {
			alert($('input[name=user]').val());
		}
	});

	$('#btnGetSex').click(function() {
		// $('[type=radio]:checked')
		alert($('input[name=sex]:checked').val());
	});

	$('input[type=radio]').on("click", function() {
		$("#divResult").html($(this).val());
	});
	/*
	 * 動態載入 $(document).on('click', 'selector', function(){ // Your Code });
	 */
	 $('#login').submit(function(){
	});
	 
	 
	 /*
	  * login page
	 */
	$('#loginCheck').click(function() {
		var bCheck = true;
		$('input').each(function(){
			if($(this).val() == "")
			{
				alert("請填入 \" "+$(this).parent().children('label').html() +" \" 欄位!");
				bCheck = false;
				return false;
			}
		});
		
		if (!bCheck) return false;
		$.ajax({
			type : "POST",
			url : CI_URL + "/Login/loginResponse",
			cache : false,
			dataType : "json",
			async : false,
			data : {
				account : $('#userAccount').val(),
				pass : $('#userPass').val(),
				DUMMY : new Date().getTime()
			},
			success : function(message) {
				if(message == "1"){
					alert("密碼錯誤!");
					return false;
				} else if(message == "2"){
					alert("無此帳號!");
					return false;
				} else {
					window.location.href = CI_URL +  message;
				}
			}, error : function(){
				alert("網頁發生未知錯誤!");
				return false;
			}
		});
	});
 });