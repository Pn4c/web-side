<?php
ini_set("display_errors", true);
error_reporting( E_ALL );
?>

<?php
if (isset($_GET['u'])){
	$NickName = $_GET['u'];
}
?>

<html>
<head>
	<link rel="stylesheet" href="profile_other_header_css.php" style="text/css">
	<?php include "profile_other_header_actions.php";?>
</head>
<body>
<header style="font-size: 13px;font-family:<?php echo $font_family;?>;">
	<div class="hidden-xs bg-default " style="opacity: 1;">
		<div class="row">
			
			<div class="col-md-2 col-md-offset-5">			
				<div class="brand" style="opacity:1;"><img style="width:140px;height:140px;margin:30px;border-radius:70px;" src="<?php echo profileImage(); ?>"></div>
				<h3><?php echo $NickName;?></h3>
				<?php follow_button($NickName); ?>	
			</div>
			
		</div>
		
		<div class="row">
			<div class="col-md-4 col-md-offset-8">
				<div class="panel panel-default" style="border:0px;">
					<div class="panel-heading pull-right" style="background:rgba(0,0,0,0);border:0px;">
						<h5><?php echo num_follow($NickName) . " " . $lang['follows'];?></h5>
					</div>
					
					<div class="panel-heading pull-right" style="background:rgba(0,0,0,0);border:0px;">
						<h5><?php echo num_follower($NickName) . " " . $lang['followers'];?></h5>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
</body>
</html>
