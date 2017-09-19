<?php session_start();?>
<?php include 'register_actions.php';?>
<?php include '../languages/select_lang.php' ?>

<html>
<head> 
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link href='register_css.php' rel='stylesheet' type='text/css'>
	<title>Pn4c</title>
</head>
<body>

	<div class="container-fluid">
		<div class="row">
		<a href="../index.php" class="btn btn-default btn-sm" style="opacity: 0.8;margin:1% 0.5% 0px 0px; float:right;"><i class="fa fa-home fa-lg"><?php echo $lang['Login Page']; ?></i></a>
		</div>	
	</div>

<div class="jumbotron vertical-center">
<div class="container-fluid">
	
	<div class="row">
        <div class="col-md-4 col-md-offset-7" style="background:rgba(255,255,255,0.5);height:100%;border-radius:10px;">
           
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
