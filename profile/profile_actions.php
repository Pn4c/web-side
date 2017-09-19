<?php 

	//connect database
	include "../static/database/database_connect.php";

	if(isset($_POST['post_button'])){

		$NickName = $_COOKIE['NickName'];
		$Content = mysqli_real_escape_string($db, $_POST['input_title']);
		$Title = mysqli_real_escape_string($db, $_POST['input_content']);
		$Date = date('Y-m-d H:i:s');
		if ($Content != ''){
			$sql = "INSERT INTO `posts`( `UserNickName`, `Title`, `Content`, `Date`) VALUES ('$NickName', '$Content', '$Title', '$Date')";
		}
		else{
			echo " <script type='text/javascript'>  alert('Content or title can not be empty!'); </script> "; 
		}
		$result = mysqli_query($db, $sql);

		if(!$sql){
			echo 'could not complete query: ' . mysqli_error();
		}

	}

	if(isset($_POST['delete-post-button'])){
		deletePost();
	}

	function deletePost(){
		include "../static/database/database_connect.php";
			$postID = $_POST['postID'];

			$sql = "DELETE FROM posts WHERE ID='$postID' ";
			$result = mysqli_query($db, $sql);


	}

	function show_all_posts(){
			$NickName = $_COOKIE['NickName'];

			//connect database
			include "../static/database/database_connect.php";
			$sql = "SELECT * FROM posts ORDER BY id DESC ";
			$result = mysqli_query($db, $sql);
			
			$colors = array("Successful" => "129,80,187", "Lonely" => "205,201,199", "Dead" => "71,71,65", "Excited" => "255,176,54", "Sad" => "101,105,144", "Happy" => "250,255,82");
		
			if(mysqli_num_rows($result) >= 1){

				while($each_data = mysqli_fetch_assoc($result)){
					if ($each_data['UserNickName'] == $NickName ){

						?>
						<div class="panel-group" id="panel-group">
							<div class="panel panel-default" style="border:0px;">
								<form method="POST">
									<button id="delete-post-button" type="submit" class="btn btn-default pull-right" name="delete-post-button" value=""><span class="glyphicon glyphicon-remove"></span></button>
									<input type="hidden" name="postID" value="<?php echo $each_data['ID'] ?>">
									<button id="update-post-button" type="submit" class="btn btn-default pull-right" name="update-post-button" value=""><span class="glyphicon glyphicon-pencil"></span></button>
								</form>
								<?php $date = strtotime($each_data['Date']) ?>
								<div class="panel-heading" style="background-color: rgba(<?php echo $colors[$each_data['Feeling']]; ?>,0.9);"><?php echo $each_data['Title']  . " - " . date('H:i', $date); ?></div>
								<div class="panel-body" style="padding:0px 0px 0px 0px;color:rgba(0,0,0,1);background-color: rgba(<?php echo $colors[$each_data['Feeling']]; ?>,0.5);"><div style=""><?php echo $each_data['Content']; ?></div></div>
							</div>
						</div>

						<?php


					}

				}

			}
			else{
				echo 'No post yet';
			}
	}



?>