<?php 
error_reporting(E_ALL & ~E_NOTICE);
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Login</title>
		<link rel="stylesheet" href="template/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="template/css/style_inscription.css">
	</head>
	<body>
	<div class="container">

	<div class="row">
<!----Login---->	
	<h1>Inscription</h1>
	</div>
		<div class="row">
 <form role="form" enctype="multipart/form-data" action="../controller/script_inscription.php" method="post" class="registration-form">
<div class="form-group">
            <label class="col-lg-offset-4 col-md-offset-4 col-lg-4 col-md-4" for="name">Nom :</label>
                <div>
                    <input type="text" id="Nom" name="Nom" class="col-md-offset-4 col-md-4"  placeholder="Entrez votre nom" value="<?php echo $_SESSION["nom"];?>">
                </div>
                <div class="row">
                <div class="col-md-offset-4 col-md-4">
                    <span id="nomerr" class="error"><?php echo $_SESSION["errnom"];?></span>
                </div>
                </div>
            </div>
        <div class="form-group">
            <label class="col-md-offset-4 col-md-4" for="name">Prénom :</label>
                <div>
                    <input type="text" id="Prenom" name="Prenom" class="col-md-offset-4 col-md-4"  placeholder="Entrez votre prénom" value="<?php echo $_SESSION["prenom"];?>">
                </div>
                <div class="row">
                    <div class="col-md-offset-4 col-md-4">
                        <span id="prenomerr" class="error"><?php echo $_SESSION["errprenom"];?></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
            <label class="col-md-offset-4 col-md-4" for="name">E-mail : </label>
                <div>
                    <input type="text" id="Email" name="Email" class="col-md-offset-4 col-md-4"  placeholder="Entrez votre e-mail" value="<?php echo $_SESSION["email"];?>">
                </div>
                <div class="row">
                    <div class="col-md-offset-4 col-md-4">
                        <span id="emailerr" class="error"><?php echo $_SESSION["erremail"];?></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
            <label class="col-md-offset-4 col-md-4" for="name">Mot de passe : </label>
                <div>
                    <input type="password" id="Motdepasse" name="Motdepasse" class="col-md-offset-4 col-md-4"  placeholder="Entrez votre mot de passe" value="<?php echo $_SESSION["mdp"];?>">
                </div>
                <div class="row">
                    <div class="col-md-offset-4 col-md-4">
                        <span id="mdperr"class="error"><?php echo $_SESSION["errmdp"];?></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
            <label class="col-md-offset-4 col-md-4" for="name">Avatar : </label>
            <div class="row">
                <div class="col-md-offset-4 col-md-4">
                    <input type="hidden" name="MAX_FILE_SIZE" value="3000000000000000" />
                    <input type="file" name="monfichier" />
                    <span id="imgerr"class="error"><?php echo $_SESSION["errimg"];?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-offset-5 col-md-3">
                    <input class="envoi btn" type="submit" value="S'inscrire"/>
                    <div class="row">
                        <a href='../index.php'class="retour">Retour</a>
                    </div>
                </div>
            </div>
		</form>
		</div>
		</div>
							
	<?php
	// remove all session variables
	session_unset(); 

	// destroy the session 
	session_destroy(); 
	?>
	</body>
	</html>