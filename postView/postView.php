<?php include '../show_error.php'; ?>
<html>
<head>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link href='postView_css.php' rel='stylesheet' type='text/css'>
	<link href='../home/post_css.php' rel='stylesheet' type='text/css'>
	<title>Pn4c</title>
	<?php session_start(); ?>
	<?php include 'postView_actions.php';?>
	<?php include '../languages/select_lang.php';?>
</head>
<body style="margin:0px 0px; padding:0px 0px;overflow-y: auto;">

	<?php include "../home/main-navbar.php"; ?>
	<br />
	<br />
	<br />
	<div class="container-fluid" style="border:0px; font-size: 12px;">

		<div class="col-md-2" id="posts-head">
			
		</div>

		<div class="col-md-7 "  id="posts-head">
			<br />
			<?php show_post(); ?>
			<?php show_comments(); ?>
			
		</div>

		<div class="col-md-2"  id="posts-head">
			<br />
		
		</div>

		

	</div>


</body>
</html>
