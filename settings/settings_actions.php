<?php
	function getEmail(){
		include "../static/database/database_connect.php";
		$NickName = $_COOKIE['NickName'];
		
		$sql = "SELECT * FROM users WHERE `NickName` = '$NickName'";
		$result = mysqli_query($db, $sql);
		
		if(mysqli_num_rows($result) >= 1){
			while($each_user = mysqli_fetch_assoc($result)){
				$Email = $each_user['Email'];
				return $Email;
			}
		}
	}

	function getNickName(){
		return $_COOKIE['NickName'];
	}
?>