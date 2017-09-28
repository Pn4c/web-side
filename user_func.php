<?php
	function find_most_feeling($nickname){
		include "../static/database/database_connect.php";
		$sql = "SELECT * FROM posts WHERE `UserNickName` = '$nickname'";
		$result = mysqli_query($db, $sql);
		
		$feelings = array();
		
		if(mysqli_num_rows($result)){
			while($each_post = mysqli_fetch_assoc($result)){
				if(!in_array($each_post['Feeling'], $feelings)){
					array_push($feelings, $each_post['Feeling']);
					$feelings[$each_post['Feeling']] = 1;
				}
				else{
					$feelings[$each_post['Feeling']] += 1;
				}
			}
		}
		
		if(count($feelings) != 0){
			//find which feelings is much more felt.
			$feelings_index = array_flip($feelings);
			$top_feeling = $feelings_index[max($feelings)];

			return $top_feeling;
		}
		else{
			return "Null";
		}
	}

	function last_feeling($nickName){
		
	}

	function getProfileImage($nickname){
		$image = "../static/profileImages/" . $nickname;
		
		if (file_exists($image)){
			return $image;
		}
		else{
			return "/static/images/person.png";
		}
	}

?>