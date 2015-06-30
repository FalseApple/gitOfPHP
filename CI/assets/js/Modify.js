$(document).ready(function() {

	$(function() {
		$("#datepicker").datepicker();
	});
	
	/*
	 * Modify page
	 */
	$('#modifyCheck').click(function() {
		var bCheck = true;
		$('input').each(function(){
			if($(this).val() == "")
			{
				alert("請填入 \" "+$(this).parent().children('label').html() +" \" 欄位!");
				bCheck = false;
				return false;
			}
			if( $('#modifyPass').val() != $('#modifyPass2').val()){
				alert("請填入 密碼 與 再次確認密碼 不相同!");
				bCheck = false;
				return false;				
			}			
		});
		
		if (!bCheck) return false;
		var mode = null;
		if($('#modifyName').val() != null){
			mode = 1;
		} else if ($('#modifyPass').val() != null){
			mode = 2;
		} else {}
		
		switch(mode){
		case 1:
			$.ajax({
				type : "POST",
				url : CI_URL + "/Modify_finish/modify/1",
				cache : false,
				dataType : "json",
				async : false,
				data : {
					modifyName : $('#modifyName').val(),
					DUMMY : new Date().getTime()
				},
				success : function(msg) {
					if(msg == "false"){
						alert("修改失敗!");
						return false;
					} else {
						window.location.href = CI_URL +  msg;
					}
				}, error : function(){
					alert("網頁發生未知錯誤!");
					return false;
				}
			});
			break;
			case 2:
				$.ajax({
					type : "POST",
					url : CI_URL + "/Modify_finish/modify/2",
					cache : false,
					dataType : "json",
					async : false,
					data : {
						modifyPass : $('#modifyPass').val(),
						modifyPass2 : $('#modifyPass2').val(),
						DUMMY : new Date().getTime()
					},
					success : function(msg) {
						if(msg == "false"){
							alert("修改失敗!");
							return false;
						} else {
							window.location.href = CI_URL +  msg;
						}
					}, error : function(){
						alert("網頁發生未知錯誤!");
						return false;
					}
				});
				break;
		}
	});
	 /*
	  * Master Modify page
	 */
	$('#MasterModifyCheck').click(function() {
		var bCheck = true;
		$('input').each(function(){
			if($(this).val() == "")
			{
				alert("請填入 \" "+$(this).parent().children('label').html() +" \" 欄位!");
				bCheck = false;
				return false;
			}
			if( $('#MasterModifyPass').val() != $('#MasterModifyPass2').val()){
				alert("請填入 密碼 與 再次確認密碼 不相同!");
				bCheck = false;
				return false;				
			}
		});
		
		if (!bCheck) return false;
		$.ajax({
			type : "POST",
			url : CI_URL + "/Modify_finish/modify/3",
			cache : false,
			dataType : "json",
			async : false,
			data : {
				MasterModifyName : $('#MasterModifyName').val(),
				MasterModifyAccount : $('#MasterModifyAccount').val(),
				MasterModifyPass : $('#MasterModifyPass').val(),
				MasterModifyPass2 : $('#MasterModifyPass2').val(),
				MasterModifyCompetence : $('#MasterModifyCompetence').val(),
				DUMMY : new Date().getTime()
			},
			success : function(msg) {
				if(msg == "false"){
					alert("修改失敗!");
					return false;
				} else {
					alert("修改成功!");
					window.location.href = CI_URL +  msg;
				}
			}, error : function(){
				alert("網頁發生未知錯誤!");
				return false;
			}
		});
	});
	
	$('#DeleteUserCheck').click(function() {
		if (confirm("確定要刪除?")) {
			$.ajax({
				type : "POST",
				url : CI_URL + "/Modify_finish/DeleteInfo",
				cache : false,
				dataType : "json",
				async : false,
				data : {
					DUMMY : new Date().getTime()
				},
				success : function(msg) {
					if(msg == "false"){
						alert("刪除失敗!");
						return false;
					} else {
						alert("刪除成功!");
						window.location.href = CI_URL +  msg;
					}
				}, error : function(){
					alert("網頁發生未知錯誤!");
					return false;
				}
			});
		}
	});	
 });