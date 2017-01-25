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
		$log = $_POST["Email"];
		$pw = $_POST["Motdepasse"];
		$connexion = false;
		
		require_once ('../model/pdo.php');
			$query = $pdo->query("SELECT email, mdp FROM utilisateur WHERE email = '$log' AND mdp = '$pw'");
			$result = $query-> fetchAll();
			$pdo = null;
		foreach ($result as $row) {
			print $row['email'];
			print $row['mdp'];	
		}
		
		if (isset($row['email']) and isset($row['mdp'])) {
		$connexion = true;
		$_SESSION['Email'] = $row['email'];
		header('Location:../views/accueil.php');
		
	}
	
	else {
		$connexion = false;
		header('Location:../index.php?page=login');
		$_SESSION["connexion"] = "E-mail inconnu, vous devez vous inscrire";
	}
	}