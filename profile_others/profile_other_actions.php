<?php

	if (isset($_GET['u'])){
		$NickName = $_GET['u'];
		//connect database
		include "../static/database/database_connect.php";
		$filter_condition = "WHERE `NickName` = '$NickName' ";
		$sql = "SELECT * FROM users " . $filter_condition;
		$result = mysqli_query($db, $sql);
		
		if (mysqli_num_rows($result) > 0){
			$profile_other_header = "profile_other_header.php";
			$show_all_posts = "show_all_posts()";
			$show_all_nots= "show_all_nots()";
		}
		else{
			$profile_other_header = " ";
			include "../404/404.php";
			die();
		}
	}
	else{
		$profile_other_header = " ";
		include "../404/404.php";
		die();
	}

	//connect database
	include "../static/database/database_connect.php";

	function show_all_posts(){
		if (isset($_GET['u'])){
			$NickName = $_GET['u'];
		}
		else{
			http_response_code(404);
			include "../404/404.php";
			die();
			return 0;
		}
		
		//connect database
		include "../static/database/database_connect.php";
		$filter_condition = "WHERE `UserNickName` = '$NickName' ";
		$sql = "SELECT * FROM posts " . $filter_condition . " ORDER BY id DESC ";
		$result = mysqli_query($db, $sql);
		
		$sql2 = "SELECT * FROM relationships WHERE `follower` = '$NickName'";
		$result2 = mysqli_query($db, $sql2);
		
		$colors = array("Successful" => "129,80,187", "Lonely" => "205,201,199", "Dead" => "71,71,65", "Excited" => "255,176,54", "Sad" => "101,105,144", "Happy" => "250,255,82");
		
		
		$followeds = array();

		while($each_followed = mysqli_fetch_assoc($result2)){
			$followeds= explode(',', $each_followed['followed']);
		}

		if(mysqli_num_rows($result) >= 1){

			while($each_data = mysqli_fetch_assoc($result)){
				$postID = $each_data['ID'];
				?>
				<div class="panel-group" id="panel-group">
					<div class="panel panel-default" style="">
						<div class="panel-heading pull-right" id="header-nickname" style="background-color: rgba(<?php echo $colors[$each_data['Feeling']]; ?>,0.01);"><kbd><?php echo $each_data['UserNickName']; ?></kbd></div>
						<?php $date = strtotime($each_data['Date']) ?>
						<div class="panel-heading" style="background-color: rgba(<?php echo $colors[$each_data['Feeling']] ?>,0.9);"><?php echo $each_data['Title']  . " - " . date('H:i', $date); ?></div>
						<div class="panel-body" style="padding:0px 0px;background-color: rgba(<?php echo $colors[$each_data['Feeling']] ?>,0.5);"><div style=""><?php echo $each_data['Content']; ?></div></div>
						<!--<div class="panel-footer" style="text-align:right; background-color: rgba(<?php echo $colors[$each_data['Feeling']] ?>,0.5);"><?php echo date('Y-m-d', $date); ?></div>-->
					</div>
					
					<div class="form-inline" style="">
						<form method="POST">
							<button name="comment-button" id="comment-button" type="submit" class="btn btn-default" style="" ><span class="glyphicon glyphicon-send"></span></button>
							<input name="input_content" id="comment-input" type="text" class="form-control pull-right" style="width:90%;text-align:right;" placeholder="comment" />
							<input type='hidden' value='<?php echo $postID; ?>' name='postID'>
						</form>

					</div>
					
				</div>
				<?php }
	
		}

	}

	


?>
