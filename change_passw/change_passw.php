<html>
<head>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link href='change_passw_css.php' rel='stylesheet' type='text/css'>
	<title>Pn4c</title>
</head>
<body>
<div class="container-fluid" >	
	<div class="col-md-4">
		<?php include "../static/sidenavbar.php"; ?>
	</div>
	
<div class="jumbotron vertical-center" style="background-color:rgba(0, 0, 0, 0);">

	<div class="col-md-10">
		<form method="POST">
			<div class="input-group">
				<input type="text" class="form-control" name="new_password" placeholder="New Password">
				<input type="text" class="form-control" name="new_password_again" placeholder="New Password Again">
			</div>
			<br />
			<input type="submit" class="btn btn-default pull-left" name="new_password_button" value="Change Password">
		</form>
	</div>
</div>
</div>
</body>
</html>