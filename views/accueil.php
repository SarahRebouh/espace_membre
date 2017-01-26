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


						


						<?php 
						
								if (!isset($_SESSION['Email'])) header("location:login.php");
							
							   if (empty($_GET)) {
							       $log = $_SESSION['Email'];
							       $query = $pdo->query("SELECT * FROM utilisateur WHERE email = '$log'");
							   }

							   						$result = $query->fetchAll();
	                                                
							   foreach ($result as $row){


							  echo "<div id='color'><br>";

							    echo "<div class='row'>";


									echo "<div class='col-xs-12 col-md-8 col-md-offset-2'>";



							    	  print "<p id='info'>Informations personnelles</p>";
							          print "<h1 id='prenom' class='prenom'>Bonjour ".$row["prenom"]."</h1>";

							   

							        echo "</div></div></div>";

							    

							          echo "<div class='row'>";
							          echo "<div class='col-xs-12 col-md-4 col-md-offset-2'>";							          
	                               
							          echo "<br><br><img id='url_avatar' src='../images/resize/".$row["url_image"]."'><br>";
	                               
							          echo "<form enctype='multipart/form-data' action='update.php' method='post'>
	                                  <input type='hidden' name='MAX_FILE_SIZE' value='100000' /><input type='file' name='monfichier' /><input type='hidden' name='id' value='".$row['id_utilisateur']."'>
	                                  <input type='submit' name='submit'></form>";

							          echo "</div>";

							    
							          echo "<div class='col-xs-12 col-md-6'>";

							          echo "<br><br><p id='modif'>(Pour changer une info, cliquez sur un crayon.)</p>";


							          print "<p class='nom'><span style='font-weight: bold;'>Votre nom :</span><br>".$row["nom"]."&nbsp;&nbsp;
							          <a id='changenom' href='#'><img src='template/images/pencil.png'></a></p>
							          	<form action='update.php' method='get' id='inputnom'><input name='nom' placeholder='Changer de nom'>
							          		<input type='hidden' name='id' value='".$row['id_utilisateur']."'>
							          			<button type='submit' name='submit'>Ok</button></form>";

							          print "<p class='prenom'><span style='font-weight: bold;'>Votre prénom :</span><br>".$row["prenom"]."&nbsp;&nbsp;
							          <a id='changeprenom' href='#'><img src='template/images/pencil.png'></a></p>
							          	<form action='update.php' method='get' id='inputprenom'><input name='prenom' placeholder='Changer de prénom'>
								          	<input type='hidden' name='id' value='".$row['id_utilisateur']."'>
								          		<button type='submit' name='submit'>Ok</button></form>";

							          print "<p class='email'><span style='font-weight: bold;'>Votre e-mail :</span><br>".$row["email"]."&nbsp;&nbsp;
							          <a id='changemail' href='#'><img src='template/images/pencil.png'></a></p>
							          	<form action='update.php' method='get' id='inputmail'><input name='email' placeholder='Changer de mail'>
								          	<input type='hidden' name='id' value='".$row['id_utilisateur']."'>
								          		<button type='submit' name='submit'>Ok</button></form>";

								      print "<p class='mdp'><span style='font-weight: bold;'>Votre mot de passe :</span><br>&#9679;	&#9679;	&#9679;	&#9679;	&#9679;	&#9679;&nbsp;&nbsp;
							          <a id='changemdp' href='#'><img src='template/images/pencil.png'></a></p>
							          	<form action='update.php' method='get' id='inputmdp'><input type='password' name='mdp' placeholder='Changer de mot de passe'>
								          	<input type='hidden' name='id' value='".$row['id_utilisateur']."'>
								          		<button type='submit' name='submit'>Ok</button></form>";

							      

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