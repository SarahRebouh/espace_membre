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
	<div class="container">

	<div class="row">	
	<h1>Connexion</h1>
	</div>
		<div class="row">
		 <form role="form" action="controller/script_login.php" method="post" class="registration-form">
            <div class="form-group">
                <div class="col-md-offset-2 col-md-8">
                    <label class="sr-only" for="form-email">Email</label>
                    <input type="email" name="Email" placeholder="Votre E-mail..." class="col-md-offset-4 col-md-4" id="form-email" value="<?php echo $_SESSION["Email"];?>">
                </div>
                <div class="row">
                    <div class="col-md-offset-2 col-md-8">
                        <span id="emailerr" class="error"><?php echo $_SESSION["erremail"];?></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-offset-2 col-md-8">
                    <label class="sr-only" for="form-mdp">Mot de passe</label>
                    <input type="password" name="Motdepasse" placeholder="Votre mot de passe..." class="col-md-offset-4 col-md-4" id="form-email" value="<?php echo $_SESSION["Motdepasse"];?>">
                </div>
                <div class="row">
                    <div class="col-md-offset-2 col-md-8">
                        <span id="mdperr" class="error"><?php echo $_SESSION["errmdp"];?></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-offset-2 col-md-8">
                        <button type="submit" class="col-md-offset-4 col-md-4 btn" id="bouton">Se connecter</button>
                        <p class='col-md-offset-5 col-md-4 compte'>Pas de compte ?</p>
                        <a href='views/inscription.php' class="col-md-offset-4 col-md-4 btn">S'inscrire</a>
                    </div>
                </div>
            </div>
        </form>
		<span id="message"></span>
		<span id="msg_all"></span>
		</div>
	<?php
	// remove all session variables
	session_unset(); 

	// destroy the session 
	session_destroy(); 
	?>
</body>
<html>