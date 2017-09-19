<?php 

	function show_post(){
		$NickName = $_COOKIE['NickName'];
		$postID = $_GET['post'];
		
		//connect database
		include "../static/database/database_connect.php";
		
		$sql = "SELECT * FROM posts WHERE `ID` = '$postID' ";
		$result = mysqli_query($db, $sql);

		$sql2 = "SELECT * FROM comments WHERE `PostID` = '$postID'";
		$result2 = mysqli_query($db, $sql2);
		if (!$result2){
			echo mysqli_error($db);
		}
		$colors = array("Successful" => "129,80,187", "Lonely" => "205,201,199", "Dead" => "71,71,65", "Excited" => "255,176,54", "Sad" => "101,105,144", "Happy" => "250,255,82");

		if(mysqli_num_rows($result) >= 1){

			while($each_data = mysqli_fetch_assoc($result)){
				$postID = $each_data['ID'];
				
				?>
				<div class="panel-group" id="panel-group">
					<div class="panel panel-default">
						<div class="panel-heading pull-right" id="header-nickname" style="background-color: rgba(<?php echo $colors[$each_data['Feeling']]; ?>,0.01);"><kbd><?php echo $each_data['UserNickName']; ?></kbd></div>
						<?php $date = strtotime($each_data['Date']) ?>
						<div class="panel-heading" style="background-color: rgba(<?php echo $colors[$each_data['Feeling']] ?>,0.9);"><?php echo $each_data['Title']  . " - " . date('H:i', $date); ?></div>
						<div class="panel-body" style="padding:0px 0px;background-color: rgba(<?php echo $colors[$each_data['Feeling']] ?>,0.5);"><div style=""><?php echo $each_data['Content']; ?></div></div>
						<!--<div class="panel-footer" style="text-align:right; background-color: rgba(<?php echo $colors[$each_data['Feeling']] ?>,0.5);"><?php echo date('Y-m-d', $date); ?></div>-->
					</div>
					
				</div>
				
				<?php
			}
	
		}

	}

	function show_comments(){
		$NickName = $_COOKIE['NickName'];
		$postID = $_GET['post'];
		
		//connect database
		include "../static/database/database_connect.php";
		
		$sql = "SELECT * FROM posts WHERE `ID` = '$postID' ";
		$result = mysqli_query($db, $sql);

		$sql2 = "SELECT * FROM comments WHERE `PostID` = '$postID'";
		$result2 = mysqli_query($db, $sql2);
		if (!$result2){
			echo mysqli_error($db);
		}
		$colors = array("Successful" => "129,80,187", "Lonely" => "205,201,199", "Dead" => "71,71,65", "Excited" => "255,176,54", "Sad" => "101,105,144", "Happy" => "250,255,82");

		if(mysqli_num_rows($result) >= 1){

			while($each_data = mysqli_fetch_assoc($result)){
				$postID = $each_data['ID'];
				
				while($each_comment = mysqli_fetch_assoc($result2)){
					$user = $each_comment['User'];
					?>
						<div class="panel" style="">
							
							<div class="row">
								<div class="col-md-2">
									<h6 style="border-right:1px solid #ddd;"><?php echo $user; ?></h6>
								</div>
								
								<div class="col-md-10">
									<?php $date = strtotime($each_comment['Date']) ?>
									<div class="panel-body" style="padding:1% 1%;"><div style=""><?php echo $each_comment['Content']; ?></div><div class="pull-right" style=""><?php echo date('H:i \, j F Y', $date); ?></div></div>
								</div>
								
							</div>
							
							
						</div>

					<?php
				}
				
				?>

				<div class="form-inline" style="">
					<form method="POST">
						<button name="comment-button" id="comment-button" type="submit" class="btn btn-default" style="" ><span class="glyphicon glyphicon-send"></span></button>
						<input name="input_content" id="comment-input" type="text" class="form-control pull-right" style="width:90%;text-align:right;" placeholder="comment" />
						<input type='hidden' value='<?php echo $postID; ?>' name='postID'>
					</form>
				</div>

				<?php
			}
	
		}

	}

	if(isset($_POST['comment-button'])){
		//connect database
		include "../static/database/database_connect.php";
		
		$User = $_COOKIE['NickName'];
		$Post = mysqli_real_escape_string($db, $_POST['postID']);
		$Content = mysqli_real_escape_string($db, $_POST['input_content']);
		$Date = date('Y-m-d H:i:s');
		
		if ($Content != '' and $User!=''){
			
			$sql = "INSERT INTO `comments`( `User`, `PostID`, `Content`, `Date`) VALUES ('$User', '$Post', '$Content', '$Date')";
		
		}
		else{
			echo " <script type='text/javascript'>  alert('Content can not be empty!'); </script> "; 
		}
		$result = mysqli_query($db, $sql);
		
		//find postID's owner
		$sql1 = "SELECT * FROM posts WHERE `ID`='$Post'";
		$result1 = mysqli_query($db, $sql1);
		
		while($each_data = mysqli_fetch_assoc($result1)){
			$notificationUser = $each_data['UserNickName'];
		}
		
		$ContentNotif = $User . "," . $Post;
		//update notifications
		$sql2 = "INSERT INTO `notifications`(`NickName`, `Content`, `Type`, `Date`, `State`) VALUES ('$notificationUser','$ContentNotif','comment','$Date','0')";
		$result2 = mysqli_query($db, $sql2);
	}


?>