<?php
	
	if($_SERVER['REQUEST_METHOD']=='POST'){
		include "baglanti.php";
		ogrenciGoster();
	}

	function ogrenciGoster(){
		global $connect;
		
		$query = "SELECT * FROM users;";
		$result = mysqli_query($connect, $query);
		$satir_sayisi = mysqli_num_rows($result);
		
		$dizi = array();
		
		if($satir_sayisi > 0){
			while($satir = mysqli_fetch_assoc($result)){
				$dizi[] = $satir;
			}
		}
		
		header("Content-Type: application/json");
		echo json_encode(array("users"=>$dizi));
		mysqli_close($connect);
		
	}

?>