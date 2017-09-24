<?php
	
	include "../profile_others/profile_other_header_actions.php";
	
	function suggestTo($nickName){
		include "../static/database/database_connect.php";
		
		$most_feeling = find_most_feeling($nickName);
		
		$sql = "SELECT * FROM users";
		$result = mysqli_query($db, $sql);
		
		if(mysqli_num_rows($result)){
			echo '<div class="row">';
			echo '<p>Bu kullanıcılarda senin gibi hissediyor:</p>';
			$counter = 0;
			while($each_user = mysqli_fetch_assoc($result)){
				if($counter < 100 and find_most_feeling($each_user['NickName']) == $most_feeling and $each_user['NickName'] != $_COOKIE['NickName']){
					echo '<div class="col-md-3" >';
					suggestView($each_user['NickName']);
					echo "</div>";
					$counter += 1;
				}
			}
			echo "</div>";
		}
	}

	function suggestView($nickName){
		include '../languages/select_lang.php';
		include "../static/database/database_connect.php";
		
		$sql = "SELECT * FROM users WHERE `NickName` = '$nickName'";
		$result = mysqli_query($db, $sql);
	
		if(mysqli_num_rows($result)){
			
			while($each_user = mysqli_fetch_assoc($result)){
				?>
					<div class="panel panel-default" style="border:0px;border-bottom:1px solid #ddd;border-top:1px solid #ddd;">
						<div class="panel-body" >
						<a href="../profile_others/profile_other.php?u=<?php echo $each_user['NickName'];?>">
								<div class="row">
									<div class="col-md-12">
										<img style="width:100%;height:11%;border-radius:10%;" src="<?php echo getProfileImage($each_user['NickName']);?>"/>
									</div>
								</div>

								<div class="row" style="text-align:center;">
									
									<p><?php echo $each_user['NickName'];?></p>
									<p><?php echo num_follower($nickName) . " " . $lang['followers'];?></p>
									
								</div>
							</a>
						</div>
					</div>
				<?php
				
			}
		}
	}
?>