<?php
	session_start();
	include("model/pdo.php");
	
	if (isset($_session["login"])) {
		$page = "views/accueil.php";
		
		if (isset($_GET["page"])) {
			$page = "views/".$_GET["page"].".php";
		}	
		
	}
	else {
		
		$page = "views/login.php";
	}	
	
	include($page);