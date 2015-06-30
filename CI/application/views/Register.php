<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Welcome to CodeIgniter</title>

<style type="text/css">
::selection {
	background-color: #E13300;
	color: white;
}

::-moz-selection {
	background-color: #E13300;
	color: white;
}

body {
	background-color: #fff;
	margin: 40px;
	font: 13px/20px normal Helvetica, Arial, sans-serif;
	color: #4F5155;
}

a {
	color: #003399;
	background-color: transparent;
	font-weight: normal;
}

h1 {
	color: #444;
	background-color: transparent;
	border-bottom: 1px solid #D0D0D0;
	font-size: 19px;
	font-weight: normal;
	margin: 0 0 14px 0;
	padding: 14px 15px 10px 15px;
}

code {
	font-family: Consolas, Monaco, Courier New, Courier, monospace;
	font-size: 12px;
	background-color: #f9f9f9;
	border: 1px solid #D0D0D0;
	color: #002166;
	display: block;
	margin: 14px 0 14px 0;
	padding: 12px 10px 12px 10px;
}

#body {
	margin: 0 15px 0 15px;
}

p.footer {
	text-align: right;
	font-size: 11px;
	border-top: 1px solid #D0D0D0;
	line-height: 32px;
	padding: 0 10px 0 10px;
	margin: 20px 0 0 0;
}

#container {
	margin: 10px;
	border: 1px solid #D0D0D0;
	box-shadow: 0 0 8px #D0D0D0;
}
</style>
<?php
	if(isset($css))
	{
		foreach($css as $key => $value)
		{
			echo "<link rel=\"stylesheet\" href=\"".base_url()."assets/css/".$value."\">";
		}
	}
	if(isset($js))
	{
		foreach($js as $key => $value)
		{
			echo "<script src=\"".base_url()."assets/js/".$value."\" type=\"text/javascript\"></script>";
		}
	}
?>
<script> 
var CI_URL = "<?php echo site_url();?>";
function check(index){ 
	if(document.register.user.value != ""){
		var pid = document.register.user.value; 
		var www = index+pid;
		window.open(www,'','scrollbars=no,menubar=no,height=150,width=300,resizable=no,toolbar=no,location=no,status=no'); 
	} else {
		alert("請輸入帳號!");
		return false;
	}
} 
</script>
</head>
<body>

	<div id="container"  align=center>
		<h1>申請帳號</h1>

		<div id="body">
			<form method="post" action="<?php echo site_url();?>/Register_finish" name="register">
			   <div><label> 名 稱</label>：<input type="text" id="regName" name="regName" class="form-control" placeholder="名稱" autofocus required /></div> <br> <br> 
				<div><label>帳 號</label>：<input type="text" id="regAccount" name="regAccount"  class="form-control" placeholder="帳號" required/>
				<button type="button" id="accountRegCheck" >檢查</button> </div> <br> <br> 
				<div><label>密 碼</label>：<input type="password" id="regPass" name="regPass"class="form-control" placeholder="密碼" required /></div> <br> <br> 
				<div><label>再一次輸入密碼</label>：<input type="password" id="regPass2"name="regPass2" class="form-control" placeholder="再次輸入密碼" required/></div> <br><br>
				<button type="button" id="RegisterCheck" >確定</button> &nbsp;&nbsp;&nbsp;
				<button type='reset'>清除</button>
			</form>
		</div>
	</div>

</body>
</html>