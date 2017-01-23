<?php 
error_reporting(E_ALL & ~E_NOTICE);
session_start();
?>

<!DOCTYPE html>


<html>


		<head>

				<title>Votre espace personnel</title>
				<meta charset="utf-8" />
				<meta name="description" content="Bootstrap" />
				<meta name="viewport" content="width=device-width, initial-scale=1" />
				<link rel="stylesheet" type="text/css" href="template/css/bootstrap/css/bootstrap.css" />
				<link rel="stylesheet" type="text/css" href="template/css/bootstrap/css/bootstrap..min.css" />
				<link rel="stylesheet" type="text/css" href="template/css/bootstrap/css/style_accueil.css" />
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
				<script src="bootstrap/bootstrap.min.js"></script>	
				


		</head>



		<body>


			<div class="container">



				<a id="deco" href="login.php"><p><img src='template/css/bootstrap/images/cross.png'>&nbsp;Déconnexion</p></a>


				<?php 


				   $dbh = new PDO('mysql:host=localhost;dbname=sarahr', "sarahr", "86LQ2H2vkU", array(
				    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
				        
				   if (empty($_GET)) {
				       
				       $query = $dbh->query("SELECT * FROM utilisateur");
				   }

				   else if (isset($_GET['prenom'])) {
					   $query = $dbh->query("SELECT * FROM utilisateur WHERE prenom='".$_GET['prenom']."'");
					   
				   }

				   else if (isset($_GET['nom'])) {
					   $query = $dbh->query("SELECT * FROM utilisateur WHERE nom='".$_GET['nom']."'");
				   }

				    else if (isset($_GET['email'])) {
				    $query = $dbh->query("SELECT * FROM utilisateur WHERE email='".$_GET['email']."'");
				   }
				   
				    else if (isset($_GET['mdp'])) {
				    $query = $dbh->query("SELECT * FROM utilisateur WHERE mdp='".$_GET['mdp']."'");
				   }

				   
				   $result = $query->fetchAll();
				   

				   foreach ($result as $row){
				    echo "<div><br>";
				  
				    
				          print "<h1 id='prenom' class='prenom'>Bonjour ".$row["prenom"]."</h1><br><br>";
				          print "<p class='nom'>Votre nom :&nbsp;".$row["nom"]."&nbsp;&nbsp;<a href='#'><img src='template/css/bootstrap/images/pencil.png'></a></p>";
				          print "<p class='prenom'>Votre prénom :&nbsp;".$row["prenom"]."&nbsp;&nbsp;<a href='#'><img src='template/css/bootstrap/images/pencil.png'></a></p>";
				          print "<p class='email'>Votre e-mail :&nbsp;".$row["email"]."&nbsp;&nbsp;<a href='#'><img src='template/css/bootstrap/images/pencil.png'></a></p><br>";
				          print "<button class='mdp'>Changer de mot de passe</button>";
				   ;
				   }

				?>
			



				<script src="Espace-membre/espace_membre/controller/get_utilisateur.php"></script>

			</div>











		</body>



</html>