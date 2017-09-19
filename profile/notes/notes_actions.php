<?php 

	//connect database
	include "../../static/database/database_connect.php";

	if(isset($_POST['post_button'])){
		
		$NickName = $_SESSION['NickName'];
		$Content = mysqli_real_escape_string($db, $_POST['input_title']);
		$Title = mysqli_real_escape_string($db, $_POST['input_content']);
		$Date = date('Y-m-d');
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

	function deleteNote(){
		include "../../static/database/database_connect.php";
		if (isset($_POST['delete_note'])){
			$noteID = $_POST['noteID'];
			
			$sql = "DELETE FROM notes WHERE ID='$noteID' ";
			$result = mysqli_query($db, $sql);
			
			header("location:notes.php");
		}
	}
	
	
	function tickNote(){
		include "../../static/database/database_connect.php";
		if (isset($_POST['tick_note'])){
			$noteID = $_POST['noteID'];
			
			$sql = "UPDATE `notes` SET `State`='1' WHERE `ID`='$noteID' ";
			$result = mysqli_query($db, $sql);
			
			
			header("location:notes.php");
		}
		
		if (isset($_POST['re_note'])){
			$noteID = $_POST['noteID'];
			
			$sql = "UPDATE `notes` SET `State`='0' WHERE `ID`='$noteID' ";
			$result = mysqli_query($db, $sql);
			
			header("location:notes.php");
		}
	}


?>
