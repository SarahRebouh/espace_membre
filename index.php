<?php
	session_start();
	include("model/pdo.php");
	
	if (isset($_session["gdsfsd"])) {
		$page = "views/accueil.php";
	}
	else {
		
		$page = "views/login.php";
	}	
	
	include($page);