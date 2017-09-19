<?php 
	include '../text_format.php';
	//connect database
	include "../static/database/database_connect.php";
	include "../search/search_actions.php";
	ob_start();
	if(isset($_FILES["fileToUpload"]["name"])){
		$target_dir = '../uploads/';
		
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
	}
	
	if(!isset($_SESSION['filter_condition'])){
		$_SESSION['filter_condition'] = "";
	}

	if(isset($_POST['post_button'])){
		
		$NickName = $_COOKIE['NickName'];
		$Content = '<p id="post-text-text">' . mysqli_real_escape_string($db, $_POST['input_content']) . '</p>';
		$Title = mysqli_real_escape_string($db, $_POST['input_title']);
		$Feeling = mysqli_real_escape_string($db, $_POST['input_feeling']);
		$Date = date('Y-m-d H:i:s');
		if ($Content != '' and $NickName!=''){
			
			$sql = "INSERT INTO `posts`( `UserNickName`, `Title`, `Content`, `Date`, `Feeling`) VALUES ('$NickName', '$Title', '$Content', '$Date', '$Feeling')";
			
		
		}
		else{
			echo " <script type='text/javascript'>  alert('Content or title can not be empty!'); </script> "; 
		}
		$result = mysqli_query($db, $sql);
		
	}

	if(isset($_POST['post_button_image'])){
		
		$NickName = $_COOKIE['NickName'];
		$Title = mysqli_real_escape_string($db, $_POST['input_title']);
		$filename = $_SESSION['Content'];
		$Content = '<img id="post-image-image" style="width:100%;" src="'.$filename.'">' .  "<br /><br />" . '<p id="post-image-text">' . mysqli_real_escape_string($db, $_POST['input_content']) . '</p>';
		$Feeling = mysqli_real_escape_string($db, $_POST['input_feeling']);
		$Date = date('Y-m-d H:i:s');
		
		if ($Content != '' and $NickName!=''){
			
			$sql = "INSERT INTO `posts`( `UserNickName`, `Title`, `Content`, `Date`, `Feeling`, `Type`) VALUES ('$NickName', '$Title', '$Content', '$Date', '$Feeling', '1')";
			$result = mysqli_query($db, $sql);
			
			//update images relation with users
			$sql1 = "SELECT * FROM `images` WHERE `NickName` = '$NickName'";
			$result1 = mysqli_query($db, $sql1);
			
			$images_array = array();
			while($each_image = mysqli_fetch_assoc($result1)){
				if ($each_image['Images'] != ""){
					$update_value = $each_image['Images'] . "," . $filename;
				}
				else{
					$update_value = $filename;
				}
			}
			
			$sql2 = "UPDATE `images` SET `Images` = '$update_value' WHERE `NickName` = '$NickName'";
			$result2 = mysqli_query($db, $sql2);
			//---
			
			load_image();
		}
		else{
			echo " <script type='text/javascript'>  alert('Content or title can not be empty!'); </script> "; 
		}
		
		
		if($result){
			unset($_FILES['fileToUpload']['name']);
		}
		
	}

	if(isset($_POST['add_note_button'])){
		
		$NickName = $_COOKIE['NickName'];
		
		$NoteContent = mysqli_real_escape_string($db, $_POST['input_content']);
		$NoteDate = date('Y-m-d H:i:s');
		if ($NoteContent != '' and $NickName!=''){
			
			$sql = "INSERT INTO `notes` (`UserNickName`, `Content`, `Date`) VALUES ('$NickName', '$NoteContent' , '$NoteDate')";
		
		}
		else{
			echo " <script type='text/javascript'>  alert('Content or title can not be empty!'); </script> "; 
		}
		$result = mysqli_query($db, $sql);
		
	}
	
	if(isset($_POST['feeling_filter_button_0'])){
		$_SESSION['filter_condition']="";
		header("location:home.php");
	}
	elseif(isset($_POST['feeling_filter_button_1'])){
		$_SESSION['filter_condition']="WHERE `feeling`='Successful'";
		header("location:home.php");
	}
	elseif(isset($_POST['feeling_filter_button_2'])){
		$_SESSION['filter_condition']="WHERE `feeling`='Happy'";
		header("location:home.php");
	}
	elseif(isset($_POST['feeling_filter_button_3'])){
		$_SESSION['filter_condition']="WHERE `feeling`='Sad'";
		header("location:home.php");
	}
	elseif(isset($_POST['feeling_filter_button_4'])){
		$_SESSION['filter_condition']="WHERE `feeling`='Excited'";
		header("location:home.php");
	}
	elseif(isset($_POST['feeling_filter_button_5'])){
		$_SESSION['filter_condition']="WHERE `feeling`='Dead'";
		header("location:home.php");
	}
	elseif(isset($_POST['feeling_filter_button_6'])){
		$_SESSION['filter_condition']="WHERE `feeling`='Disappointed'";
		header("location:home.php");
	}
	elseif(isset($_POST['feeling_filter_button_7'])){
		$_SESSION['filter_condition']="WHERE `feeling`='Lonely'";
		header("location:home.php");
	}

	if (isset($_POST['add_note'])){

		$NickName = $_COOKIE['NickName'];
		$NoteContent = $_POST['note_content'];
		$NoteDate = date('Y-m-d');

		$sql = "INSERT INTO `notes` (`UserNickName`, `Content`, `Date`) VALUES ('$NickName', '$NoteContent' , '$NoteDate')";
		$result = mysqli_query($db, $sql);
		
		header("location:home.php");
	}

	if(isset($_POST['search_button'])){
		include "../static/database/database_connect.php";
		$_SESSION['search_nickname'] = mysqli_real_escape_string($db, $_POST['search_nickname']);
		header("location:../search/search.php");

	}

	if (isset($_POST['delete_note'])){
		$noteID = $_POST['noteID'];

		$sql = "DELETE FROM notes WHERE ID='$noteID' ";
		$result = mysqli_query($db, $sql);

		header("location:/home/home.php");
	}

	if (isset($_POST['update_note'])){
		$noteID = $_POST['noteID'];

		$sql = "UPDATE notes SET `Content` = 'çok istedin, değişti :D' WHERE ID='$noteID' ";
		$result = mysqli_query($db, $sql);

		header("location:/home/home.php");
	}
	
	if(isset($_POST['comment-button'])){
		
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
		
		echo "y" . $Post;
		
		
		//find postID's owner
		$sql1 = "SELECT * FROM posts WHERE `ID`='$Post'";
		$result1 = mysqli_query($db, $sql1);
		
		while($each_data = mysqli_fetch_assoc($result1)){
			$notificationUser = $each_data['UserNickName'];
		}
		
		if ($notificationUser != $_COOKIE['NickName']){
			$ContentNotif = $User . "," . $Post;
			//update notifications
			$sql2 = "INSERT INTO `notifications`(`NickName`, `Content`, `Type`, `Date`, `State`) VALUES ('$notificationUser','$ContentNotif','comment','$Date','0')";
			$result2 = mysqli_query($db, $sql2);
		}
	}

	function show_posts(){
		$NickName = $_COOKIE['NickName'];
		
		//connect database
		include "../static/database/database_connect.php";
		$filter_condition = "";
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
				
				//Dead feeling color and text color are same so dead feeling title must be different
				if (in_array($each_data['UserNickName'], $followeds) or $each_data['UserNickName'] == $NickName ){
					
					if ($each_data['Feeling'] == "Dead"){
						$title_color = "white";
					}
					else{
						$title_color = "rgba(90,90,90,1)";
					}
					
				?>
				<div class="panel-group" id="panel-group">
					<div class="panel panel-default" style="">
						
						<div id="a-name" class="panel-heading pull-right" id="header-nickname" style="background-color: rgba(<?php echo $colors[$each_data['Feeling']]; ?>,0.01);">
							<a href="/profile_others/profile_other.php?u=<?php echo $each_data['UserNickName'];?>"><kbd><?php echo $each_data['UserNickName']; ?></kbd></a>
						</div>
						<?php $date = strtotime($each_data['Date']) ?>
						<a href="/postView/postView.php?post=<?php echo $postID;?>">
						<div id="a-text" class="panel-heading" style="color:<?php echo $title_color; ?>;background-color: rgba(<?php echo $colors[$each_data['Feeling']] ?>,0.9);"><?php echo $each_data['Title']  . " - " . date('H:i', $date); ?></div>
						</a>
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
				<?php 
				}
			}
		}

	}
	
	function goName(){
		
	}

	function show_all_nots(){
		if (str_replace("?", "", $_SERVER['REQUEST_URI']) == "/home/home.php"){
			$NickName = $_COOKIE['NickName'];
		}
		elseif (str_replace("?", "", $_SERVER['REQUEST_URI']) == "/profile_others/profile_other.php"){
			$NickName = $_SESSION['searched_user'];
		}
		elseif (str_replace("?", "", $_SERVER['REQUEST_URI']) == "/profile/profile.php"){
			$NickName = $_SESSION['searched_user'];
		}
		elseif (isset($_GET['u'])){
			$NickName = $_GET['u'];
		}
		
		include '../static/database/database_connect.php';
		$sql= "SELECT * FROM notes WHERE `UserNickName` = '$NickName' ORDER BY id DESC LIMIT 0,5" ;
		
		$result = mysqli_query($db, $sql);
		
		if (mysqli_num_rows($result) >= 1){ 
		echo "<div class='panel-group' id='sidenavbar-notes'>";
		
		while($each_not = mysqli_fetch_assoc($result)){
			$date = strtotime($each_not['Date']);
				$noteID = $each_not['ID'];
				echo "
				
							<div class='panel panel-default pull-left' id='each-note' style='width:100%;border-radius:30px 10px;'>
							<form method='POST'>
								<button id='delete-note-button' type='submit' name='delete_note' class='btn btn-default btn-sm pull-right' style='border:0px;border-radius:0px;'><i class='glyphicon glyphicon-remove'></i></button>
								<button id='update-post-button' type='submit' class='btn btn-default btn-sm pull-right' name='update_note'><span class='glyphicon glyphicon-pencil'></span></button>
								
								<input type='hidden' value='". $noteID ."' name='noteID'>
								<div contenteditable='true' class='panel-body' style=''  id='note-body'> " . $each_not['Content']  . " </div>
								<!--<div class='panel-footer' id='note-footer' style='text-align:right; '>" . date('Y-m-d', $date) . " </div>-->
								</form>
							</div>
						
				";
			
		}
		echo "</div>";
		}
		else{
			if (explode("?", $_SERVER['REQUEST_URI'])[0] != "/profile_others/profile_other.php"){
				echo "No Note";
			}
		}
		
	}

	function show_all_notifications(){
		$NickName = $_COOKIE['NickName'];
		include '../static/database/database_connect.php';
		$sql= "SELECT * FROM notifications WHERE `NickName` = '$NickName' ORDER BY id DESC" ;
		
		$result = mysqli_query($db, $sql);
		if (mysqli_num_rows($result) >= 1){ 
		echo "<div class='panel-group '>";
		
		while($each_not = mysqli_fetch_assoc($result)){
			$date = strtotime($each_not['Date']);
			$noteID = $each_not['ID'];
			
			$postID = 0;
			if ($each_not['Type'] == "comment"){
				$content_Array = explode(",", $each_not['Content']);
				$postID = $content_Array[1];
				echo "<a href='/postView/postView.php?post=".$postID."'>";
			}
			else{
				$user = $each_not['Content'];
				echo "<a href='/profile_others/profile_other.php?u=".$user."'>";
			}
			
			echo "

					<div class='panel panel-default pull-right' id='each-notif' style='border-radius:10px 30px;width:100%; border:0px;'>
					<form method='POST' action='". deleteNotif() ."'>
						<div class='row'>
						<button id='delete-notif-button' type='submit' name='delete_notif' class='btn btn-default btn-sm pull-left' style='border:0px;border-radius:0px;'><i class='glyphicon glyphicon-remove'></i></button>
						<input type='hidden' value='". $noteID ."' name='noteID'>
						</div>
						<div class='panel-body' id='notif-body' > " . open_notif($each_not['Content'], $each_not['Type'])  . " </div>
						<div class='panel-footer' id='notif-footer' style='text-align:right; background:rgba(0,0,0,0);'>" . date('Y-m-d', $date) . " - ". date('H:i', $date) ." </div>

					</form>
					</div>
					</a>
			";
			
			//change notification state from 0 to 1 which means that notification is read.
			$sql1 = "UPDATE notifications SET `State`='1' WHERE `ID` = '$noteID' ;";
			$result1 = mysqli_query($db, $sql1);
		}
		echo "</div>";
		}
		else{
			echo "No Notification";
		}
		
		
	}

	function open_notif($Content, $Type){
		$NickName = $_COOKIE['NickName'];
		if ($Type == "following"){
			return "<b>" . $Content . "</b> started to follow you !";
		}
		if ($Type == "comment"){
			$content_Array = explode(",", $Content);
			
			include "../static/database/database_connect.php";
			$sql = "SELECT * FROM posts WHERE `ID`='$content_Array[1]'";
			$result = mysqli_query($db, $sql);
			
			while($each_data = mysqli_fetch_assoc($result)){
				$date = strtotime($each_data['Date']);
				return "<b>" . $content_Array[0] . "</b> comment your post : <b>\"" . $each_data['Title'] . " / " . date('Y-m-d', $date) . "\"</b>";
			}
			
			return "<b>" . $content_Array[0] . "</b> comment your post";
			
		}
	}

	function deleteNotif(){
		include "../static/database/database_connect.php";
		if (isset($_POST['delete_notif'])){
			$noteID = $_POST['noteID'];
			
			$sql = "DELETE FROM notifications WHERE ID='$noteID' ";
			$result = mysqli_query($db, $sql);
			
			header("location:home.php");
		}
	}

	function load_image(){
		
		$target_dir = '/uploads/';
		
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			if($check !== false) {
				//echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} else {
				//echo "File is not an image.";
				$uploadOk = 0;
			}
		}
		$filename = $_FILES['fileToUpload']['name'];
		$_SESSION['Content'] = "/uploads/" . $filename ;
		
		// Check if file already exists
		if (file_exists($target_file)) {
			//echo "Sorry, file already exists.";
			$uploadOk = 0;
		}
		// Check file size
		if ($_FILES["fileToUpload"]["size"] > 500000) {
			echo "Sorry, your file is too large.";
			$uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
			//echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			$uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			//echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
			
			
			
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
				echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
			} else {
				//echo "Sorry, there was an error uploading your file.";
			}
		}
	}

?>
