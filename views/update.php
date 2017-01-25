<?php 
error_reporting(E_ALL & ~E_NOTICE);
session_start();
require '../model/pdo.php';
?>

<?php
						    if (isset($_GET['submit'])) {
								   $queryy = $pdo->query("UPDATE utilisateur SET nom='".$_GET['nom']."'");
								} 

								 if (isset($_GET['submit'])) {
								   $queryy = $pdo->query("UPDATE utilisateur SET prenom='".$_GET['prenom']."'");
								} 

								 if (isset($_GET['submit'])) {
								   $queryy = $pdo->query("UPDATE utilisateur SET email='".$_GET['email']."'");
								} 

								
?>