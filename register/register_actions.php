<?php 

	//connect database
	include "../static/database/database_connect.php";

	if(isset($_POST['register_button'])){
		
		$NickName = mysqli_real_escape_string($db, $_POST['input_nickname']);
		$Email = mysqli_real_escape_string($db, $_POST['input_email']);
		$Password = mysqli_real_escape_string($db, $_POST['input_password']);
		$Gender = mysqli_real_escape_string($db, $_POST['input_gender']);
		$Age = mysqli_real_escape_string($db, $_POST['input_age']);
		$date = date('Y-m-d H:i:s');
		
		if ($Gender != 'Gender' and $NickName!='' and $Email!='' and $Password!='' and $Age!=''){
			$sql = "INSERT INTO `users` (`Email`, `NickName`, `Gender`, `Age`, `Password`, `RegisterDate`) VALUES ('$Email', '$NickName', '$Gender', '$Age', '$Password', '". $date ."') ";
			$result = mysqli_query($db, $sql);
			
			$sql2 = "INSERT INTO `relationships` (`follower`, `followed`) VALUES ('$NickName', '') ";
			$result2 = mysqli_query($db, $sql2);
			
			if($result){
				header("location:../index.php");
			}
			else{
				echo " <script type='text/javascript'>  alert('Wrong things happened, please try again!'); </script> ";
			}

		}
		else{
			echo " <script type='text/javascript'>  alert('Fill all areas'); </script> "; 
		}
		
		
	}
?>
