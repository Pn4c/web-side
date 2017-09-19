<?php 
	include "show_error.php";
	session_start();

	include "static/database/database_connect.php";

	if(isset($_POST['button_login'])){
		
		$Email = mysqli_real_escape_string($db, $_POST['Email']);
		$Password = mysqli_real_escape_string($db, $_POST['Password']);
		
		$sql = "SELECT * FROM users WHERE Email='$Email' ";
		$result = mysqli_query($db, $sql);
		
		if(mysqli_num_rows($result) == 1){
            
            
                while($each_data = mysqli_fetch_assoc($result)){
                    if($each_data['Password'] == $_POST['Password']){
						
						setcookie('Email', $Email, time() + (86400 * 30), "/");
						setcookie('NickName', $each_data['NickName'], time() + (86400 * 30), "/");
						setcookie('Email', $Email, time() + (86400 * 30), "/");
						
						$_SESSION['Content'] = "";
                        
						header("location:home/home.php");
                    }
                
                    else{
                        echo " <script type='text/javascript'>  alert('Password is wrong'); </script> ";
                    }
            }
            
		}
		else{
			echo " <script type='text/javascript'>  alert('Email is wrong'); </script> ";

		}
	}
	
	
	if(isset($_POST['lang-en'])){
		setcookie('lang', "lang-en", time() + (86400 * 30), "/");
		header("location:index.php");
	}
	if(isset($_POST['lang-tr'])){
		setcookie('lang', "lang-tr", time() + (86400 * 30), "/");
		header("location:index.php");
	}
	elseif(isset($_POST['lang-it'])){
		setcookie('lang', "lang-it", time() + (86400 * 30), "/");
		header("location:index.php");
	}
	elseif(isset($_POST['lang-ko'])){
		setcookie('lang', "lang-ko", time() + (86400 * 30), "/");
		header("location:index.php");
	}


	if(isset($_POST['regBut'])){
		$RegDisplay = "initial";
		header("location:index.php");
	}	

	if (isset($_POST['button_forgot_password'])){
		include 'static/forgotPassword.php';
	}

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
				setcookie('Email', $Email, time() + (86400 * 30), "/");
						setcookie('NickName', $NickName, time() + (86400 * 30), "/");
						setcookie('Email', $Email, time() + (86400 * 30), "/");
						
						$_SESSION['Content'] = "";
                        
						header("location:home/home.php");
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
