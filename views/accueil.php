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
<<<<<<< Updated upstream
				<?php/* <link rel="stylesheet" type="text/css" href="template/bootstrap/css/bootstrap.css" />*/?>
				<link rel="stylesheet" type="text/css" href="views/template/bootstrap/css/bootstrap.min.css" />
				<link rel="stylesheet" type="text/css" href="views/template/css/style_accueil.css" />
=======
				<link rel="stylesheet" type="text/css" href="template/css/bootstrap/css/bootstrap.css" />
				<link rel="stylesheet" type="text/css" href="template/css/bootstrap/css/bootstrap.min.css" />
				<link rel="stylesheet" type="text/css" href="template/css/bootstrap/css/style_accueil.css" />
>>>>>>> Stashed changes
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
				<script src="views/template/bootstrap/js/bootstrap.min.js"></script>	
				


		</head>



		<body>


			<div class="container">


				<div class="back">



					<a id="deco" href="login.php"><p><img src='views/template/images/cross.png'>&nbsp;Déconnexion</p></a>


						<div class="row">


								<div class="col-xs-12 col-md-8 col-md-offset-2">


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

						    	  print "<p id='info'>Informations personnelles</p>";
						          print "<h1 id='prenom' class='prenom'>Bonjour ".$row["prenom"]."</h1><br><br>";


						          echo "<div class='row'>";
						          echo "<div class='col-xs-12 col-md-3'>";

						          echo "<img id='avatar' src='template/css/bootstrap/images/no-avatar.jpg'><br>";
						          echo "<a href='#'><p id='chavatar'>Changer d'avatar</p></a>";

						          echo "</div>";

						    
						          echo "<div class='col-xs-12 col-md-9'>";


						          print "<p class='nom'><span style='font-weight: bold;'>Votre nom :</span><br>".$row["nom"]."&nbsp;&nbsp;<a id='changenom' href='#'><img src='template/css/bootstrap/images/pencil.png'></a></p><div id='inputnom'><input placeholder='Changer de nom'></input><button type='submit'>Ok</button></div>";
						          print "<p class='prenom'><span style='font-weight: bold;'>Votre prénom :</span><br>".$row["prenom"]."&nbsp;&nbsp;<a id='changeprenom' href='#'><img src='template/css/bootstrap/images/pencil.png'></a></p><div id='inputprenom'><input placeholder='Changer de prénom'></input><button type='submit'>Ok</button></div>";
						          print "<p class='email'><span style='font-weight: bold;'>Votre e-mail :</span><br>".$row["email"]."&nbsp;&nbsp;<a id='changemail' href='#'><img src='template/css/bootstrap/images/pencil.png'></a></p><div id='inputmail'><input placeholder='Changer de mail'></input><button type='submit'>Ok</button></div><br>";
						          print "<button id='changemdp' class='mdp'>Changer de mot de passe</button><br><br><div id='inputmdp'><input placeholder='Changer de mot de passe'></input><button type='submit'>Ok</button></div><br>";

						          echo "</div></div>";
						   ;
						   }

						?>

								</div>

						</div>

			</div>
			


				<script src ="views/template/js/fichier_accueil.js" type="text/javascript"></script>
				<!----<script src="Espace-membre/espace_membre/controller/get_utilisateur.php"></script>--->


			</div>




		</body>



</html>