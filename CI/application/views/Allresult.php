<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Welcome to CodeIgniter</title>
<link rel="stylesheet" href=<?php echo base_url('assets/tablesorter/blue/style.css');?> type="text/css">
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src=<?php echo base_url('assets/tablesorter/jquery.tablesorter.js'); ?>></script> 
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

.cellPS TD {
	text-align: center;
	font-size: 15px;
	color: #003399;
	background-color: transparent;
	border:solid 1px red;
}
</style>
<script type="text/javascript">
$(function () { 
	$("#myTable").tablesorter( {
		 sortList: [[0,1]],
		 headers: {1: {sorter: false} },
		 widgets: ['zebra']
		} );
})
</script>
</head>
<body>

	<div id="container" align=center>
		<h1>Welcome to CodeIgniter!</h1>

		<div id="body">
		<form method="post" action="<?php echo site_url();?>/Modify_finish">
		<table id="myTable" border=1 width='40%' align=center class=cellPS >
   			<?php
   			echo "<thead> ";
   			echo "<tr bgcolor='#FFFF00' valign=bottom>";
   			echo "<td> <font color='#FF0000'>Name</font></td>";
   			echo "<td ><font color='#FF0000'>User</font></td>";
   			echo "<td><font color='#FF0000'>Password</font></td>";
   			echo "<td><font color='#FF0000'>Competence</font></td>";
   			echo "<td><font color='#FF0000'>Edit</font></td>";
   			echo "</tr>";
   			echo "</thead> ";
   			echo "<tbody>";
   			if(isset($allquery))
   			{
   				
   				foreach($allquery as $key => $value)
   				{
   					echo "<tr>";
   					echo "<td>".$value->name."</td>";
   					echo "<td>".$value->user."</td>";
   					echo "<td>".$value->password."</td>";
   					echo "<td>".$value->competence."</td>";
   					echo "<td><a href=".site_url()."/Query_Controller/Personalmodify/".$value->user.">modify</a>";
   					echo '&nbsp;&nbsp;<input type="button" value="移除" onClick=" this.form.action = '.site_url().'/Modify_finish/DeleteInfo/'.$value->user.'; this.form.submit();">';	?>
   				
   					<input type="button" value="移除2" onClick="this.form.action='<?php echo site_url();?>/Modify_finish/DeleteInfo/<?php echo $value->user;?>';this.form.submit();"> </td>
   					<?php 
   					echo "</tr>";
   				}  
   			}
			?>
			</tbody> 
			</table><br/><br/>
			<a href="<?php echo site_url(); ?>/Welcome/user">返回上一頁</a><br/><br/>
			</form>
	</div>
	</div>

</body>
</html>