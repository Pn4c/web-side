<?php include '../show_error.php'; ?>
<html>
<head>
	<?php include "../static/system_variables.php";?>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=<?php echo $font_family;?>">
	
	<link rel="stylesheet" href="profile_header_css.php" style="text/css">
</head>
<body>
<header style="font-size: 13px;font-family:<?php echo $font_family;?>;">
		<div class="row">
			<div class="col-md-2 col-md-offset-5">
				<?php
					if (!function_exists('getProfileImage')){
						include "../user_func.php";
					}
				?>
				<div class="brand" style="opacity:1;"><img style="width:140px;height:140px;margin:30px;margin-bottom:0px;border-radius:70px;" src="<?php echo getProfileImage($_COOKIE['NickName']); ?>"></div>
			
				<form method="POST" id="form-post" enctype="multipart/form-data">
					<div class="panel-heading" >
						<input type="file" onchange="this.form.submit();" style="display:none;" class="btn btn-default pull-right" name="fileToUpload" id="fileToUpload">
						<label class="pull-right" for="fileToUpload" style="color:#ddd;"><i class="fa fa-pencil fa-2x" aria-hidden="true"></i><br /></label>
					</div>
				</form>
				
				<h3 style="opacity: 1;"><?php echo $_COOKIE['NickName'];?></h3>
				<h6 style="opacity: 1;"><?php echo $_COOKIE['Email']; ?></h6>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-4 col-md-offset-8">
				<div class="panel panel-default" style="border:0px;">
					<div class="panel-heading pull-right" style="border:0px;background:rgba(0,0,0,0);">
						<h5><?php echo num_follow2($_COOKIE['NickName']) . " " . $lang['follows'];?> </h5>
					</div>
					
					<div class="panel-heading pull-right" style="border:0px;background:rgba(0,0,0,0);">
						<h5><?php echo num_follower2($_COOKIE['NickName']) . " " . $lang['followers'];?></h5>
					</div>
				</div>
			</div>
		</div>
	
		<footer>
			<form method="POST" style="margin:0px;">
			<input type="submit" class="btn btn-default pull-right" id="button_myprofile" name="button_myprofile" value="<?php echo $lang['Show My Profile']; ?>">
			</form>
		</footer>
	
</header>
</body>
</html>
<?php
	
	if(isset($_POST['button_myprofile'])){
		$nickName = $_COOKIE['NickName'];
		header("location:../profile_others/profile_other.php?u=$nickName");
	}
	
	
	function num_follow2($searched_user){
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

	function num_follower2($searched_user){
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

	if (isset($_FILES['fileToUpload']['name'])){
		$target_dir = '/static/profileImages/';
		
		$target_file = $target_dir . $_COOKIE['NickName'];
		move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
		load_image2();
	}

	function load_image2(){
		$NickName = $_COOKIE['NickName'];
		$target_dir = '/static/profileImages/';
		
		$target_file = $target_dir . $_COOKIE['NickName'];
		
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			if($check !== false) {
				//echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} else {
				echo "File is not an image.";
				$uploadOk = 0;
			}
		}
		$filename = $_FILES['fileToUpload']['name'];
		$_SESSION['ProfileImage'] = "/static/profileImages/" . $_COOKIE['NickName'] ;
		
		// Check if file already exists
		if (file_exists($target_file)) {
			//echo "Sorry, file already exists.";
			$uploadOk = 0;
		}
		// Check file size
		if ($_FILES["fileToUpload"]["size"] > 500000) {
			//echo "Sorry, your file is too large.";
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
				//echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
			} else {
				//echo "Sorry, there was an error uploading your file." .  basename( $_FILES["fileToUpload"]["name"]);
			}
		}
	}
?>
