<?php 
session_start();
header('Content-Type: text/html; charset=utf-8');

$nom = $prenom = $email = $mdp = $avatar = "";
$_SESSION["errnom"] = "";
$error = false;

	if ( (isset($_POST["Nom"])) && (strlen(trim($_POST["Nom"])) > 0) ) {
        $nom = stripslashes(strip_tags($_POST["Nom"]));
    } 
	else {
        $_SESSION["errnom"] = "Merci d'écrire votre nom <br />";
		$error = true;
        $nom = "";
    }
	
		if ( (isset($_POST["Prenom"])) && (strlen(trim($_POST["Prenom"])) > 0) ) {
        $prenom = stripslashes(strip_tags($_POST["Prenom"]));
    } 
	else {
        $_SESSION["errprenom"] = "Merci d'écrire votre prénom <br />";
		$error = true;
        $prenom = "";
    }

	if ( (isset($_POST["Email"])) && (strlen(trim($_POST["Email"])) > 0) && (filter_var($_POST["Email"], FILTER_VALIDATE_EMAIL)) ) {
        $email = stripslashes(strip_tags($_POST["Email"]));	
    } 
	else if (empty($_POST["Email"])) {
        $_SESSION["erremail"] = "Merci d'écrire une adresse email <br />";
		$error = true;
        $email = "";
    }
	else {
        echo "Email invalide :(<br />";
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
	
		// if ( (isset($_POST["Avatar"])) && (strlen(trim($_POST["Avatar"])) > 0) ) {
        // $avatar = stripslashes(strip_tags($_POST["Avatar"]));
    // } 
	// else {
        // echo "Merci d'écrire votre nom <br />";
		// $error = true;
        // $avatar = "";
    // }
	if ($error == false) {
		
		header('Location: accueil.php');
		
	}
	
	else {
		header('Location: inscription.php');
	}