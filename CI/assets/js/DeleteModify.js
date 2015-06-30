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
					if (msg == "false") {
						alert("刪除失敗!");
						return false;
					} else {
						alert("刪除成功!");
						window.location.href = CI_URL + msg;
					}
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
				window.location.href = CI_URL + msg;
			},
			error : function() {
				alert("網頁發生未知錯誤!");
				return false;
			}
		});
	});
});