<?php 
session_start();
header('Content-Type: text/html; charset=utf-8');

$email = $mdp = "";
$error = false;

	if ( (isset($_POST["Email"])) && (strlen(trim($_POST["Email"])) > 0) && (filter_var($_POST["Email"], FILTER_VALIDATE_EMAIL)) ) {
        $email = stripslashes(strip_tags($_POST["Email"]));	
    } 
	else if (empty($_POST["Email"])) {
        $_SESSION["erremail"] = "Merci d'écrire une adresse email <br />";
		$error = true;
        $email = "";
    }
	else {
        $_SESSION["erremail"] = "Email invalide :(<br />";
		$error = true;
        $email = "";
    }

	if ( (isset($_POST["Motdepasse"])) && (strlen(trim($_POST["Motdepasse"])) > 0) ) {
        $mdp = stripslashes(strip_tags($_POST["Motdepasse"]));
    } 
	else {
        $_SESSION["errmdp"] = "Merci d'écrire votre mot de passe <br />";
		$error = true;
        $mdp = "";
    }
	if ($error == false) {
		$_SESSION["login"] = "toto";
		header('Location:../index.php');
		
	}
	
	else {
		header('Location:../index.php?page=login');
	}