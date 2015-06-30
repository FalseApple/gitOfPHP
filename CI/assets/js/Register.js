$(document).ready(function() {

	$(function() {
		$("#datepicker").datepicker();
	});
	
	 /*
	  * Register Page
	 */
	$('#accountRegCheck').click(function() {
		bCheck = true;
		if( $('#regAccount').val() == ""){
			alert("請輸入帳號!");
			bCheck = false;
			return false;				
		}
		if(!bCheck) return false;
		$.ajax({
			type : "POST",
			url : CI_URL + "/Register_finish/regAccountCheck",
			cache : false,
			dataType : "json",
			async : false,
			data : {
				regAccount : $('#regAccount').val(),
				DUMMY : new Date().getTime()
			},
			success : function(msg) {
					alert(msg);
					return false;
			}, error : function(){
				alert("網頁發生未知錯誤!");
				return false;
			}
		});
	});
	
	$('#RegisterCheck').click(function() {
		var bCheck = true;
		$('input').each(function(){
			if($(this).val() == "")
			{
				alert("請填入 \" "+$(this).parent().children('label').html() +" \" 欄位!");
				bCheck = false;
				return false;
			}
			if( $('#regPass').val() != $('#regPass2').val()){
				alert("請填入 密碼 與 再次確認密碼 不相同!");
				bCheck = false;
				return false;				
			}
		});
		
		if (!bCheck) return false;
		$.ajax({
			type : "POST",
			url : CI_URL + "/Register_finish/RegisterAccount",
			cache : false,
			dataType : "json",
			async : false,
			data : {
				regName : $('#regName').val(),
				regAccount : $('#regAccount').val(),
				regPass : $('#regPass').val(),
				regPass2 : $('#regPass2').val(),
				DUMMY : new Date().getTime()
			},
			success : function(msg) {
				if ( msg == "true" ){
					alert("註冊成功!");
					window.location.href = CI_URL +  "/Welcome";
				} else if ( msg == "false" ) {
					alert("註冊失敗!");
					return false;
				}
				else {
					alert(msg + "重複!");
					return false;
				} 
			}, error : function(){
				alert("網頁發生未知錯誤!");
				return false;
			}
		});
	});
 });