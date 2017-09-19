<?php include '../show_error.php'; ?>
<?php
if(isset($_FILES["fileToUpload"]["name"])){
    $target_dir = '../static/profileImages/';

    $target_file = $target_dir . $_COOKIE['NickName'];
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
}
?>

<html >
    <head> 
        
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        
        <title>Pn4c</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link href='profile_css.php' rel='stylesheet' type='text/css'>
        <link href='../home/post_css.php' rel='stylesheet' type='text/css'>
        
        <!-- edit profile -->
        <link href='edit_post_css.php' rel='stylesheet' type='text/css'>
        
        <?php session_start(); ?>
        <?php include 'profile_actions.php';?>
        <?php include '../home/home_actions.php';?>
        <?php include '../languages/select_lang.php';?>
            
</head>
<body  style="margin:0px 0px; padding:0px 0px;overflow-y: auto;" >
    <?php include "../home/main-navbar.php"; ?>
    
<div class="container-fluid" style="border:0px; font-size: 12px;">
    
    <br /><br />
    <div id="profil-header">
    <?php include "profile_header.php" ?>
    </div>
	<br /><br />

	<div class="col-md-2">

	</div>
	
	<div class="col-md-5 col-md-offset-0">
	    <?php show_all_posts(); ?>
	</div>
    
    <div class="col-md-2 col-md-offset-1" style="height:100%;" id="posts-head">
        <br />
        <?php show_all_nots(); ?>
    </div>
	
</div>	
</body>
</html>
