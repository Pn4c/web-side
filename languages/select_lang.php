<?php

	if(!isset($_COOKIE['lang'])){
		$_COOKIE['lang'] = 'lang-en';
		include 'lang.en.php';
	}

	if($_COOKIE['lang'] == 'lang-en'){
		include 'lang.en.php';
	}
	elseif($_COOKIE['lang'] == 'lang-tr'){
		include 'lang.tr.php';
	}
	elseif($_COOKIE['lang'] == 'lang-it'){
		include 'lang.it.php';
	}
	elseif($_COOKIE['lang'] == 'lang-ko'){
		include 'lang.ko.php';
	}
?>
