<?php 
error_reporting(E_ALL & ~E_NOTICE);
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Login</title>
		<link rel="stylesheet" href="views/template/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="views/template/css/style_login.css">
	</head>
<body>
	<header>
	<h1>Bienvenue sur l'espace membre de Sarodyan !</h1>
	</header>
	<div class="container">

	<div class="row">

	<h2>Pour accéder à votre espace personnel, connectez-vous :</h2>
	</div>
		<div class="row">
		 <form role="form" action="controller/script_login.php" method="post" class="registration-form">
            <div class="form-group">
                <div class="col-md-offset-2 col-md-8">
                    <label class="col-md-offset-4 col-md-8">E-mail</label>
                    <input type="email" name="Email" placeholder="Votre E-mail..." class="col-md-offset-4 col-md-4" id="form-email" value="<?php echo $_SESSION["Email"];?>">
                </div>
                <div class="row">
                    <div class="col-md-offset-2 col-md-8">
                        <span id="emailerr" class="col-md-offset-4 col-md-4 error"><?php echo $_SESSION["erremail"];?></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-offset-2 col-md-8">
                    <label class="col-md-offset-4 col-md-8">Mot de passe</label>
                    <input type="password" name="Motdepasse" placeholder="Votre mot de passe..." class="col-md-offset-4 col-md-4" id="inputmotdepasse" value="<?php echo $_SESSION["Motdepasse"];?>">
                </div>
                <div class="row">
                    <div class="col-md-offset-2 col-md-8">
                        <span id="mdperr" class="col-md-offset-4 col-md-4 error"><?php echo $_SESSION["errmdp"];?></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-offset-2 col-md-8">
                        <button type="submit" class="col-md-offset-4 col-md-4 btn" id="bouton">Se connecter</button>
                        <p class='col-md-offset-5 col-md-4 compte'>Pas de compte ?</p>
                        <a href='views/inscription.php' class="col-md-offset-4 col-md-4 btn" id="bouton_insc">S'inscrire</a>
                    </div>
                </div>
            </div>
        </form>
		<span id="message"></span>
		<span id="msg_all"></span>
		<span class="col-md-offset-4 col-md-4 error"><?php echo $_SESSION["connexion"];?></span>
		</div>
		</div>
	<?php
	// remove all session variables
	session_unset(); 

	// destroy the session 
	session_destroy(); 
	?>
</body>
<html>