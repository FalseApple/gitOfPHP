$(document).ready(function() {

	$(function() {
		$("#datepicker").datepicker();
	});

	// 動態事件綁定
	$('#myTable').on("click", 'button[name=deleteUser]', function() {
		if (confirm("確定要刪除?")) {
			$.ajax({
				type : "POST",
				url : CI_URL + "/Modify_finish/UserDeleteInfo",
				cache : false,
				dataType : "json",
				async : false,
				data : {
					MasterModifyUser : $(this).val(),
					DUMMY : new Date().getTime()
				},
				success : function(msg) {
					switch(msg){
						case "true":
							alert("刪除成功!");
							window.location.href = CI_URL + "/UserUseing/Allmodify";
							break;
						default:
							alert("刪除失敗!");
							break;
					}
					return false;
				},
				error : function() {
					alert("網頁發生未知錯誤!");
					return false;
				}
			});
		}
	});

	$('#myTable').on("click", 'button[name=modifyUser]', function() {
		$.ajax({
			type : "POST",
			url : CI_URL + "/Modify_finish/UserModify",
			cache : false,
			dataType : "json",
			async : false,
			data : {
				MasterModifyUser : $(this).val(),
				DUMMY : new Date().getTime()
			},
			success : function(msg) {
				switch(msg){
					case "true":
						window.location.href = CI_URL +"/UserUseing/Personalmodify";
						break;
					default:
						alert("Something was error.");
						break;
				}
				return false;
			},
			error : function() {
				alert("網頁發生未知錯誤!");
				return false;
			}
		});
	});
});