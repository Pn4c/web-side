<?php include '../show_error.php'; ?>
<html>
<head>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link href='settings_css.php' rel='stylesheet' type='text/css'>
	<link href='../home/post_css.php' rel='stylesheet' type='text/css'>
	<title>Pn4c</title>
	<?php session_start(); ?>
	<?php include 'settings_actions.php';?>
	<?php include '../home/home_actions.php';?>
	<?php include '../languages/select_lang.php';?>
	<?php include '../languages/country_names.php';?>
</head>
<body style="margin:0px 0px; padding:0px 0px;overflow-y: auto;">
	
	<?php include "../home/main-navbar.php"; ?>
	<br />
	<br />
	<br />
	<div class="container-fluid" style="border:0px; font-size: 12px;">
		
		<div class="col-md-2 col-md-offset-2" style="position:fixed;">
			<br />
			<br />
			<br />
			
			<div class='panel panel-default' style="border:0px;border-bottom:1px solid #ddd;">
					
					<div class='panel-body' style="padding:0px 0px;border:0px;border-bottom:1px solid #ddd;" id='note-body'>
						<a href="#Profil" class="btn btn-default" type="submit" style="text-align:left;width:100%;border:0px;border-bottom:1px solid #ddd;">Profil</a>
						<a href="#Privacy" class="btn btn-default" type="submit" style="text-align:left;width:100%;border:0px;border-bottom:1px solid #ddd;">Privacy</a>
						<a href="#Languages" class="btn btn-default" type="submit" style="text-align:left;width:100%;border:0px;border-bottom:1px solid #ddd;">Languages</a>
						<br /><br /><br />
						<a href="#save_button" class="btn btn-danger" type="submit" style="text-align:left;width:100%;border:0px;border-bottom:1px solid #ddd;">Save Changes</a>
					</div>
				
			</div>
		</div>

		<div class="col-md-5 col-md-offset-4">
			<br />
			<form method="POST">
				<div id="Pofil">
					<h2>Profil</h2>
					<label for="change-nickName-input">Nick Name</label><input type="text" class="form-control" id="change-nickName-input" name="change-nickName-input" value="<?php echo getNickName();?>" />
					<br />
					<label for="change-email-input">Email</label><input type="text" class="form-control" id="change-email-input" name="change-email-input" value="<?php echo getEmail();?>" />
					<br />
					<label for="change-password-input">Password</label><input type="text" class="form-control" id="change-password-input" name="change-password-input" placeholder="Old Password" />
					<input type="text" class="form-control" id="change-password-input" name="change-password-input" placeholder="New Password" />
					<input type="text" class="form-control" id="change-password-input" name="change-password-input" placeholder="Re- New Password" />
				</div>

				<!--<div id="Privacy">
					<h2>Privacy</h2>
					<p>Change Privacy</p>
				</div>-->

				<div id="Languages">
					<h2>Languages</h2>
					 <select name="input_languages" class="form-control" id="inlineFormCustomSelect">
						<option disabled selected value>Select Languages</option>
						<option value="tr"><?php echo $country['tr']; ?></option>
						<option value="en"><?php echo $country['en']; ?></option>
						<option value="it"><?php echo $country['it']; ?></option>
						<option value="ko"><?php echo $country['ko']; ?></option>
					 </select>
				</div>
				
				<button class="btn btn-danger" name="save_button" id="save_button" style="width:100%;margin:5% 0px 0px 0px;">Save</button>
			</form>
		</div>

		<div class="col-md-3">
			<br />
			
		</div>

	</div>


</body>
</html>
