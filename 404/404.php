<?php include '../languages/select_lang.php' ?>

<html>
<head> 
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Gochi Hand">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Happy Monkey">
	<?php $font_family = "Happy Monkey";?>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link href='index_css.php' rel='stylesheet' type='text/css'>
	<title>404 Error - Page Not Found</title>
	
</head>
<body > 
<?php $_SESSION['filter_condition'] =""; ?>
<div class="jumbotron vertical-center" >
<div class="container-fluid" style="background-color:rgba(255,255,255,0);">
	
	<br />
	<div class="row" style="font-family:<?php echo $font_family;?>;">

		<div class="col-md-4 col-md-offset-4 jumbotron vertical-center" style="background:rgba(255,255,255,0.5);border-radius:10px;">
			<p>404 Not Found !</p>
			<p>Are you sure if you are looking for there?</p>
		</div>

	</div>

</div>
</div>
</body>
</html>
