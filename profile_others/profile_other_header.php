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
						<h5><?php echo num_follow($NickName);?> follows</h5>
					</div>
					
					<div class="panel-heading pull-right" style="background:rgba(0,0,0,0);border:0px;">
						<h5><?php echo num_follower($NickName);?> followers</h5>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
</body>
</html>

<?php

	function follow_button($searched_user){
		include '../static/database/database_connect.php';
		$NickName = $_COOKIE['NickName'];
		
		//control if viewed user is follewed or not
		$sql = "SELECT * FROM relationships WHERE `follower` = '$NickName'";
		$result = mysqli_query($db, $sql);
		
		$followeds = array();
		
		while($each_data = mysqli_fetch_assoc($result)){
			 $followeds = explode(',', $each_data['followed']);
		}
		
		if($searched_user != $NickName){
			if(in_array($searched_user, $followeds)){
				echo '
					<form method="POST" action="' . unfollow($searched_user) . '">
						<input type="submit" class="btn btn-danger" style="width:100%; margin:5% 0px 5% 0px;" name="unfollow_button" value="unfollow">
					</form>
				';
			}
			else{
				echo '
					<form method="POST" action="' . follow($searched_user) . '">
						<input type="submit" class="btn btn-primary" style="width:100%; margin:5% 0px 5% 0px;" name="follow_button" value="follow">
					</form>
				';
			}
		}else{
			echo '
					<input type="submit" class="btn btn-primary disabled" style="width:100%; margin:5% 0px 5% 0px;" name="follow_button" value="follow">
				';
		}
		
		if(isset($_POST['follow_button'])){
			
		}
	}

	function follow($searched_user){
		if(isset($_POST['follow_button'])){
			include "../static/database/database_connect.php";
			$NickName = $_COOKIE['NickName'];
			
			//start to follow other-user
			$sql = "SELECT * FROM relationships WHERE `follower` = '$NickName'";
			$result = mysqli_query($db, $sql);
			
			$followeds = array();

			while($each_data = mysqli_fetch_assoc($result)){
				$followeds = explode(',', $each_data['followed']);
				if ($each_data['followed'] == ""){
					$update_value = $searched_user;
				}
				else{
					$update_value = $each_data['followed'] . "," . $searched_user;
				}
			}

			$sql1 = "UPDATE `relationships` SET `followed`='$update_value' WHERE `follower`= '$NickName'";
			$result1 = mysqli_query($db, $sql1);
			
			//update notifiations
			$current_date=date('Y-m-d H:i:s');
			$sql2 = "INSERT INTO `notifications`(`NickName`, `Content`, `Type`, `Date`, `State`) VALUES ('$searched_user','$NickName','following','$current_date','0')";
			$result2 = mysqli_query($db, $sql2);
			
			
			header("location:profile_other.php?u=$searched_user");
		}
		
	}

	function unfollow($searched_user){
		if(isset($_POST['unfollow_button'])){
			include "../static/database/database_connect.php";
			$NickName = $_COOKIE['NickName'];

			//start to follow other-user
			$sql = "SELECT * FROM relationships WHERE `follower` = '$NickName'";
			$result = mysqli_query($db, $sql);

			$followeds = array();

			while($each_data = mysqli_fetch_assoc($result)){
				$followeds = explode(',', $each_data['followed']);
			}
			
			if(($key = array_search($searched_user, $followeds)) !== false) {
				unset($followeds[$key]);
			}
			
			$update_value = implode(',', $followeds);
			
			$sql1 = "UPDATE `relationships` SET `followed`='$update_value' WHERE `follower`= '$NickName'";
			$result1 = mysqli_query($db, $sql1);
			
			header("location:profile_other.php?u=$searched_user");
		}
	}

	function num_follow($searched_user){
		include "../static/database/database_connect.php";
		$NickName = $searched_user;

		//start to follow other-user
		$sql = "SELECT * FROM relationships WHERE `follower` = '$searched_user'";
		$result = mysqli_query($db, $sql);
		
		$followeds = array();

		while($each_data = mysqli_fetch_assoc($result)){
			if ($each_data['followed'] != ""){
				$followeds = explode(',', $each_data['followed']);
			}else{return "0";}
		}
		 
		return count($followeds);
	}

	function num_follower($searched_user){
		include "../static/database/database_connect.php";
		$NickName = $searched_user;

		//start to follow other-user
		$sql = "SELECT * FROM relationships";
		$result = mysqli_query($db, $sql);
		
		$followeds = array();
		
		$counter=0;
		while($each_data = mysqli_fetch_assoc($result)){
			if ($each_data['followed'] != ""){
				$followeds = explode(',', $each_data['followed']);
				if (in_array($NickName, $followeds)){
					$counter = $counter + 1;
				}
				
			}
		}
		 
		return $counter;
	}
	
	function profileImage(){
		$NickName = $_GET['u'];
		$image = "../static/profileImages/" . $NickName;
		
		if (file_exists($image)){
			return $image;
		}
		else{
			return "/static/images/person.png";
		}
		
	}
	
?>