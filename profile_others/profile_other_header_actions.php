
<?php
	if(!function_exists('follow_button')){
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
	}
	
?>