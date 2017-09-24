<?php include 'languages/select_lang.php' ?>
<?php include 'index_actions.php';?>

<html>
<head> 
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Indie Flower">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Princess Sofia">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Shadows Into Light">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Dancing Script">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Architects Daughter">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Great Vibes">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cabin Sketch">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Gochi Hand">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Happy Monkey">
	<?php $font_family = "Happy Monkey";?>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link href='index_css.php' rel='stylesheet' type='text/css'>
	<title>Pn4c</title>
	
</head>
<body > 
<?php $_SESSION['filter_condition'] =""; ?>
<div class="jumbotron vertical-center" style="height:100%;">
<div class="container-fluid" style="background-color:rgba(255,255,255,0);">
	
	<div class="row jumbotron vertical-center" style="font-family:<?php echo $font_family;?>;">
		
		<div class="col-md-4 col-md-offset-1" style="background:rgba(255,255,255,0.5);height:100%;border-radius:10px;">
			<br />
			<br />
			<br />
			<p style="width:100%;" ><?php echo $lang["Don't have an account ?"]; ?></p>
			<br />
			<br />
			<br />
			 <form method="POST">
                
				<div class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
					<input name='input_email' class="form-control" type='email' placeholder='<?php echo $lang['Email']; ?>' >
				</div>

				<div class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
					<input name='input_nickname' class="form-control" type='text' placeholder='<?php echo $lang['Nick Name']; ?>' >
				</div>

				<div class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
					<input name='input_password' class="form-control" type='password' placeholder='<?php echo $lang['Password']; ?>' >
				</div>

				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-transgender-alt"></i></span>
							 <select name="input_gender" class="form-control" id="inlineFormCustomSelect">
					<option selected><?php echo $lang['Gender']; ?></option>
					<option value="female"><?php echo $lang['Female']; ?></option>
					<option value="male"><?php echo $lang['Male']; ?></option>
				 </select>
				</div>

				<div class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-gift"></i></span>
					<input name='input_age' class="form-control" type='text' placeholder='<?php echo $lang['Age(ie: 21)']; ?>' >
				</div>                

				<br />
				<div class="form-group">
					<button name='register_button' class="form-control" type='submit' placeholder='Password' ><?php echo $lang['Relax']; ?></button>	
				</div>
                         
			</form>
		</div>
			
        <div class="col-md-4 col-md-offset-2" style="background:rgba(255,255,255,0.5);height:100%;border-radius:10px;">
           <h1 style="font-size:130px;font-family:Gochi Hand;">PN4C</h1>
			
            <form method="POST" action="index.php">
                
				<div class="input-group" >
				<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				<input id="Email" type="text" class="form-control" name="Email" placeholder="<?php echo $lang['Email']; ?>">
				</div>

				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
				<input id="Password" type="password" class="form-control" name="Password" placeholder="<?php echo $lang['Password']; ?>">
				</div>

				<div class="form-group">
					<br />
				  	<input type="submit" class="btn btn-default" name="button_login" id="button_login" value="<?php echo $lang['Login']; ?>" style="width:100%;float: right;">
				  	
					<form method="POST" >
						<br />
						<br />
						<br />
						<input type="submit" class="btn btn-default pull-right" name="button_forgot_password" id="forgot_password" value="<?php echo $lang['Forgot Password']; ?>">
					</form>
				
				</div>

			</form>
              
         </div>
            
        
    </div>
</div>
</div>
	
<footer style="background-color:#2e353d; padding:1.60% 1% 1% 1%">
	<form method="POST">
		<input type="submit" class="btn btn-default" name="lang-tr" value="Türkçe">
		<input type="submit" class="btn btn-default" name="lang-en" value="English">
		<input type="submit" class="btn btn-default" name="lang-it" value="Italiano">
		<input type="submit" class="btn btn-default" name="lang-ko" value="한국어">
	</form>
</footer>
</body>
</html>
