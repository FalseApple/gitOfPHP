<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Welcome to CodeIgniter</title>
<link href='http://fonts.googleapis.com/css?family=Englebert|Open+Sans:400,600,700' rel='stylesheet' type='text/css' />
<link href="jjqqry.css" rel="stylesheet" type="text/css" media="all" />
<style type="text/css">

.style1 {
	color: #330099;    
	font-size: 20px;
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
	if(isset($images))
	{
		foreach($images as $key => $value)
		{
			echo "<script src=\"".base_url()."assets/images/".$value."\" type=\"text/javascript\"></script>";
		}
	}	
?>
<script>
var CI_URL = "<?php echo site_url();?>";
</script>
</head>
<body>
<div id="header" class="container">
	<div id="logo">
		<h1><a href="#">Employee System</a></h1>
	</div>
	<div id="menu">
		<ul id="list_t_railway">
			<li><a href="#" accesskey="1" title="">Login</a></li>
			<li><a href="#" accesskey="2" title="">Register</a></li>
			<li><a href="#" accesskey="3" title="">About Us</a></li>
			<li><a href="#" accesskey="4" title="">Address</a></li>
		</ul>
	</div>
</div>
<div id="wrapper" class="container">
	<div id="page">
		<div id="content"> <a href="#" class="image-style"><img src="<?php echo base_url()?>assets/images/img005.jpg" width="600" height="250" alt="" /></a>
		<marquee direction="up" width="600" height="250" scrollamount="1" scrolldelay="40"  truespeed class="style1">
				1.aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa。<br />
				2.aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa<br />
				3.aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa<br />
				4.aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa<br />
		</marquee><br />
		<a href="#" class="link-style1">Learn More</a></div>
		<div id="sidebar">
			<div id="sbox1">
				<h2>Mauris vulputate</h2>
				<ul class="list-style1">
					<li class="first">
						<h3>Lorem ipsum amet?</h3>
						<p>15 minutes ago by Someone</p>
					</li>
					<li>
						<h3>Consequat accumsan tempus</h3>
						<p>3 hours ago by Someone</p>
					</li>
					<li>
						<h3>Adipiscing lobortis ...</h3>
						<p>4 hours ago by Someone</p>
					</li>
				</ul>
			</div>
			<div id="sbox2">
				<h2>Fusce ultrices</h2>
					<ul class="list-style2">
						<li class="first"><a href="#">Volutpat lorem ipsum elementum</a></li>
						<li><a href="#">Ticitudin semper nunc laoreet</a></li>
						<li><a href="#">Sed pellentesque habitant morbi</a></li>
						<li><a href="#">Volutpat lorem ipsum elementum</a></li>
					</ul>
			</div>
		</div>
	</div>
</div>
<div id="footer">
	<p>&copy; Untitled. All rights reserved. Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>. Photos by <a href="http://fotogrph.com/">Fotogrph</a>.</p>
</div>
</body>
</html>