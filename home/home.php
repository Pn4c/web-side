<?php include '../show_error.php'; ?>
<html>
<head>
	<script>
		function defa(){
			document.getElementById("tab-image-text").click();
			<?php if(isset($_FILES['fileToUpload']['name'])){
						 ?> document.getElementById("tab-image-post").click(); <?php
				  } ?>
		}
	</script>
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	
	<?php $font_family = "Happy Monkey";?>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=<?php echo $font_family;?>">
	
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link href='home_css.php' rel='stylesheet' type='text/css'>
	<link href='post_css.php' rel='stylesheet' type='text/css'>
	<title>Pn4c</title>
	<?php session_start(); ?>
	<?php include 'home_actions.php';?>
	<?php include '../languages/select_lang.php';?>
</head>
<body onload="defa()" style="margin:0px 0px; padding:0px 0px;overflow-y: auto;">
	
	
	
	<?php include "main-navbar.php"; ?>
	<br />
	<br />
	<br />
	<div class="container-fluid" style="border:0px; font-size: 13px;font-family:<?php echo $font_family;?>;">

		<div class="col-md-3 col-xs-3" style="position:local;" id="tab">
			<?php include "tab/post_tab.php";?>
		</div>

		<div class="col-md-5 col-xs-5" id="posts">
			<br />

			<?php show_posts(); ?>
		</div>

		<div class="col-md-2 col-md-offset-8 col-xs-2 col-xs-offset-8" style="position:fixed;height:100%;" id="nots">
			<br />
			<?php show_all_nots(); ?>
		</div>

		<div class="col-md-2 col-md-offset-10 col-xs-2 col-xs-offset-10" style="position:fixed;height:100%;" id="notifs">
			<br />
			<?php show_all_notifications(); ?>
		</div>

	</div>


</body>
</html>
