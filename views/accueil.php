<?php 
error_reporting(E_ALL & ~E_NOTICE);
session_start();
require '../model/pdo.php';
?>

<!DOCTYPE html>


<html>


		<head>

				<title>Votre espace personnel</title>
				<meta charset="utf-8" />
				<meta name="description" content="Bootstrap" />
				<meta name="viewport" content="width=device-width, initial-scale=1" />
				<link rel="stylesheet" type="text/css" href="template/bootstrap/css/bootstrap.min.css" />
				<link rel="stylesheet" type="text/css" href="template/css/style_accueil.css" />
				<link rel="stylesheet" type="text/css" href="template/css/bootstrap/css/bootstrap.css" />
				<link rel="stylesheet" type="text/css" href="template/css/bootstrap/css/bootstrap.min.css" />
				<link rel="stylesheet" type="text/css" href="template/css/style_accueil.css" />
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
				<script src="views/template/bootstrap/js/bootstrap.min.js"></script>	
				


		</head>



		<body>


			<div class="container">


				<div class="back">



					<a id="deco" href="../index.php"><p><img src='template/images/cross.png'>&nbsp;Déconnexion</p></a>


						<div class="row">


								<div class="col-xs-12 col-md-8 col-md-offset-2">


						<?php 


						   if (empty($_GET)) {
						       
						       $query = $pdo->query("SELECT * FROM utilisateur");
						   }

							   else if (isset($_GET['prenom'])) {
								   $query = $pdo->query("SELECT * FROM utilisateur WHERE prenom='".$_GET['prenom']."'");
								   
							   }

								   else if (isset($_GET['nom'])) {
									   $query = $pdo->query("SELECT * FROM utilisateur WHERE nom='".$_GET['nom']."'");
								   }

									    else if (isset($_GET['email'])) {
									    $query = $pdo->query("SELECT * FROM utilisateur WHERE email='".$_GET['email']."'");
									   }
						   
										    else if (isset($_GET['mdp'])) {
										    $query = $pdo->query("SELECT * FROM utilisateur WHERE mdp='".$_GET['mdp']."'");
										   }

						   
						   						$result = $query->fetchAll();
                                    
                                    
						   foreach ($result as $row){

						    echo "<div><br>";

						    	  print "<p id='info'>Informations personnelles</p>";
						          print "<h1 id='prenom' class='prenom'>Bonjour ".$row["prenom"]."</h1><br><br>";


						          echo "<div class='row'>";
						          echo "<div class='col-xs-12 col-md-3'>";
                               
						          echo "<img id='url_avatar' src='../images/resize/".$row["url_image"]."'><br>";
						          echo "<a href='#'><p id='chavatar'>Changer d'avatar</p></a>";

						          echo "</div>";

						    
						          echo "<div class='col-xs-12 col-md-9'>";


						          print "<p class='nom'><span style='font-weight: bold;'>Votre nom :</span><br>".$row["nom"]."&nbsp;&nbsp;<a id='changenom' href='#'><img src='template/images/pencil.png'></a></p><form action='update.php' method='get' id='inputnom'><input placeholder='Changer de nom'></input><button type='submit' name='submit'>Ok</button></form>";
						          print "<p class='prenom'><span style='font-weight: bold;'>Votre prénom :</span><br>".$row["prenom"]."&nbsp;&nbsp;<a id='changeprenom' href='#'><img src='template/images/pencil.png'></a></p><form action='update.php' method='get' id='inputprenom'><input placeholder='Changer de prénom'></input><button type='submit' name='submit'>Ok</button></form>";
						          print "<p class='email'><span style='font-weight: bold;'>Votre e-mail :</span><br>".$row["email"]."&nbsp;&nbsp;<a id='changemail' href='#'><img src='template/images/pencil.png'></a></p><form action='update.php' method='get' id='inputmail'><input placeholder='Changer de mail'></input><button type='submit' name='submit'>Ok</button></form><br>";
						          print "<button id='changemdp' class='mdp'>Changer de mot de passe</button><br><br><div id='inputmdp'><input placeholder='Changer de mot de passe'></input><button type='submit' name='submit'>Ok</button></div><br>";

						          echo "</div></div>";
						   ;
						   }



						?>

								</div>

						</div>

			</div>
			


				<script src ="template/js/fichier_accueil.js" type="text/javascript"></script>
				<!-- <script src="Espace-membre/espace_membre/controller/get_utilisateur.php"></script> -->


			</div>




		</body>



</html>