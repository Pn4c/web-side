<?php
	include "../user_func.php";
	if (session_status() == PHP_SESSION_NONE) {
    	session_start();
	}	
	
	if(isset($_POST['search_button'])){
		include "../static/database/database_connect.php";
		$_SESSION['search_nickname'] = mysqli_real_escape_string($db, $_POST['search_nickname']);
		header("location:search.php");
	}

	function get_search_results(){
		echo "Users<br /><br />";
		$search_nickname = $_SESSION['search_nickname'];
		
		include "../static/database/database_connect.php";
		$sql = "SELECT * FROM users";
		$result = mysqli_query($db, $sql);
		
		$counter = 0;
		while($each_user = mysqli_fetch_assoc($result)){
			
			if (strpos($each_user['NickName'], $search_nickname) !== false){
				show_each_search_user($each_user['NickName']);
				$counter += 1;
			}

		}
		
		if($counter==0){echo "No even similar user<br /><br />";}
		
		echo "Titles<br /><br />";
		
		$sql2 = "SELECT * FROM posts";
		$result2 = mysqli_query($db, $sql2);
		
		$counter = 0;
		while($each_user = mysqli_fetch_assoc($result2)){
			
			if (strpos($each_user['Title'], $search_nickname) !== false){
				show_each_post($each_user['UserNickName'], $each_user['Title'], $each_user['ID']);
				$counter += 1;
			}

		}
		
		if($counter==0){echo "No even similar title";}
		
	}

	function show_each_search_user($UserName){
		$profileImageSource = getProfileImage($UserName);
		
		if ($UserName != $_COOKIE['NickName']){
			echo '
			
				<div class="panel panel-default"  style="border:0px;border-bottom:1px solid #ddd;border-top:1px solid #ddd;">
					<div class="row">
						<div class="col-md-2" style="border-right:1px solid #ddd;">
							<img style="border-radius:20px;width:40px;height:40px;margin:30px;" src="'.$profileImageSource.'">
						</div>
						<div class="col-md-8">
							<div class="panel-body">' . $UserName . '</div>
						</div>
						<div class="col-md-2">
							<form method="POST" action="'.show_user().'">
								<input type="hidden" name="show_username" value="'.$UserName.'">
								<button id="show-button" class="btn btn-default pull-right" name="show_user" type="submit" style="border:0px;border-left:1px solid #ddd;">
									<span class="glyphicon glyphicon-chevron-right" ></span>
								</button>
							</form>
						</div>
					</div>
				</div>
				
				<style>
				#show-button{
					height:15%;
				}
				
				</style>

			';
		}
	}

	function show_each_post($UserName, $Title, $ID){
		$profileImageSource = getProfileImage($UserName);
		if (true){
			echo '
			
				<div class="panel panel-default"  style="border:0px;border-bottom:1px solid #ddd;border-top:1px solid #ddd;">
					<div class="row">
						<div class="col-md-2" style="border-right:1px solid #ddd;">
							<img style="width:40px;height:40px;margin:30px;" src="'.$profileImageSource.'">
						</div>
						<div class="col-md-8">
							<div class="panel-body">' . $Title . '</div>
						</div>
						<div class="col-md-2">
							<form method="POST" action="'.show_post().'">
								<input type="hidden" name="searched_post_id" value="'.$ID.'">
								<button id="show-button" class="btn btn-default pull-right" name="show_post" type="submit" style="border:0px;border-left:1px solid #ddd;">
									<span class="glyphicon glyphicon-chevron-right" ></span>
								</button>
							</form>
						</div>
					</div>
				</div>
				
				<style>
				#show-button{
					height:15%;
				}
				
				</style>

			';
		}
	}

	function show_user(){
		include "../static/database/database_connect.php";
		
		if(isset($_POST['show_user'])){
			$searched_user = mysqli_real_escape_string($db, $_POST['show_username']);
			header("location:../profile_others/profile_other.php?u=$searched_user");
		}
	}

	function show_post(){
		include "../static/database/database_connect.php";
		
		if(isset($_POST['show_post'])){
			$searched_post = mysqli_real_escape_string($db, $_POST['searched_post_id']);
			header("location:../postView/postView.php?post=$searched_post");
		}
	}


?>
