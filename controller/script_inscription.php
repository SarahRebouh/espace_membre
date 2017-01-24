<?php 
session_start();
header('Content-Type: text/html; charset=utf-8');

$nom = $prenom = $email = $mdp = "";
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
	
	if ($error == false) {
		// include("pdo.php");
		
		$nomOrigine = $_FILES['monfichier']['name'];
		$elementsChemin = pathinfo($nomOrigine);
		$extensionFichier = $elementsChemin['extension'];
		$extensionsAutorisees = array("jpeg", "jpg", "gif", "png");
		$repertoireResize = "../images/resize/";

			if (!(in_array($extensionFichier, $extensionsAutorisees))) {
				echo "Ce type de fichier n'est pas supporté";
			} 

			else {    
				// Copie dans le repertoire du script avec un nom
				// incluant l'heure a la seconde pres 
				$repertoireDestination = "../images/";
				$nomDestination = "fichier_du_".date("YmdHis").".".$extensionFichier;

				if (move_uploaded_file($_FILES["monfichier"]["tmp_name"], $repertoireDestination.$nomDestination)) {
					echo 'Votre image a bien été envoyée. Vous pouvez la retrouver sur votre espace personnel.';
					
					
			//        echo "Le fichier temporaire ".$_FILES["monfichier"]["tmp_name"].
			//                " a été déplacé vers ".$repertoireDestination.$nomDestination;
					
					include("test_recize.php");
					$resize = new ResizeImage($repertoireDestination."fichier_du_".date("YmdHis").".".$extensionFichier);
					$resize->resizeTo(100, 100);
					$resize->saveImage($repertoireResize."fichier_du_".date("YmdHis")."_resize.".$extensionFichier, "100");
					
				} 
				
				else {
					echo "Le fichier n'a pas été uploadé.";
				}
			}
			
	//	header('Location: ../views/accueil.php');
		
	}
	
	else {
		header('Location: ../views/inscription.php');
	}
	
