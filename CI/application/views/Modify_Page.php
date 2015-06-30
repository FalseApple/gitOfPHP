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
if (isset ( $css )) {
	foreach ( $css as $key => $value ) {
		echo "<link rel=\"stylesheet\" href=\"" . base_url () . "assets/css/" . $value . "\">";
	}
}
if (isset ( $js )) {
	foreach ( $js as $key => $value ) {
		echo "<script src=\"" . base_url () . "assets/js/" . $value . "\" type=\"text/javascript\"></script>";
	}
}
// 載入 Session
$session_q = $this->session->userdata ( 'mode_q' );
?>
<script>
var CI_URL = "<?php echo site_url();?>";
</script>
</head>
<body>

	<div id="container" align=center>
		<h1>修改資料</h1>

		<div id="body">
			<form method="post" action="<?php echo site_url();?>/Modify_finish">
			<?php
			 switch($session_q)
			 {
			 	case 1:
			 ?>
			 			    <div><label>修改名稱</label>：<input type="text"  id="modifyName" name="name"  class="form-control" placeholder="修改名稱" autofocus required/></div> <br> <br> 
			 			    <button type="button" id = "modifyCheck">確定</button> &nbsp;&nbsp;&nbsp;
			 <?php 
			 				break;
			 	case 2:
			 ?>
					<div><label>密 碼</label>：<input type="password"  id="modifyPass" name="pass"  class="form-control" placeholder="修改密碼" autofocus required/></div> <br> <br> 
					<div><label>再一次輸入密碼</label>：<input type="password" id="modifyPass2" name="pass2" class="form-control" placeholder="再次輸入修改密碼" required/> </div><br><br>
					<button type="button" id = "modifyCheck">確定</button> &nbsp;&nbsp;&nbsp;
			<?php 		 		
			 }
			?>
			<input type="button" value="返回上一頁" onClick="this.form.action='<?php echo site_url();?>/UserUseing/user';this.form.submit();">  &nbsp;&nbsp;&nbsp;
				<button type='reset'>清除</button>

			</form>
		</div>
	</div>

</body>
</html>