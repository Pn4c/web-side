<?php

	if($_SERVER['REQUEST_METHOD']=='POST'){
		include "baglanti.php";
		ogrenciOlustur();
	}

	function ogrenciOlustur(){
		global $connect;
		
		$email = $_POST['Email'];
		$nickName = $_POST['NickName'];
		$gender = $_POST['Gender'];
		$age = $_POST['Age'];
		$password = $_POST['Password'];
		$registerDate = $_POST['RegisterDate'];
		$date = date('Y-m-d H:i:s');
		
		$query = "INSERT INTO `users` (`Email`, `NickName`, `Gender`, `Age`, `Password`, `RegisterDate`) VALUES ('$email','$nickName','$gender', '$age', '$password', '$date');";
		
		mysqli_query($connect, $query) or die (mysqli_error($connect));
		mysqli_close($connect);
		
		
	}

?>