<?php 
error_reporting(E_ALL & ~E_NOTICE);
session_start();
require '../model/pdo.php';
?>

<?php
			


							 //    if (isset($_GET['submit'])) {
								// 	$queryy = $pdo->query("UPDATE utilisateur SET nom='".$_POST['nom']."'");
								// } 

								//  if (isset($_GET['submit'])) {
								//    $queryy = $pdo->query("UPDATE utilisateur SET prenom='".$_POST['prenom']."'");
								// } 

								//  if (isset($_GET['submit'])) {
								//    $queryy = $pdo->query("UPDATE utilisateur SET email='".$_POST['email']."'");
								// } 


								if (isset($_GET['submit'])) {
									if (isset($_GET['nom'])) {
										$pdo->query("UPDATE utilisateur SET nom='".$_GET['nom']."' WHERE id_utilisateur = ".$_GET['id']);
									}

									if (isset($_GET['prenom'])) {
										$pdo->query("UPDATE utilisateur SET prenom='".$_GET['prenom']."' WHERE id_utilisateur = ".$_GET['id']);
									}

									if (isset($_GET['email'])) {
										$pdo->query("UPDATE utilisateur SET email='".$_GET['email']."' WHERE id_utilisateur = ".$_GET['id']);
									}

									if (isset($_GET['mdp'])) {
										$pdo->query("UPDATE utilisateur SET mdp='".$_GET['mdp']."' WHERE id_utilisateur = ".$_GET['id']);
									}
									
								} 

header("location:accueil.php");
								
?>