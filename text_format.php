<?php
	function format($text){
		
		$konum = strpos($text, "bbb");
		
		if ($konum !== false) {
			echo "oldu";
		} else {
			echo " dizgesi içinde  dizgesi yok";
		}

		
		if (strpos($text, " ") !== false) {
			echo "yunus";
			str_replace("bbb", "<b>", $text);
		}
		else{
			echo "gyok";
		}
		
		if (strpos($text, "/bbb") !== false) {
			str_replace("bbb", "</b>", $text);
		}
		else{
			
		}
		
		return $text;
	
	}
?>