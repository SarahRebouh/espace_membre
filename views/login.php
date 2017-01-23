<?php 
error_reporting(E_ALL & ~E_NOTICE);
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Login</title>
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
		<link href="style_login.css" rel="stylesheet"/>
	</head>
	<body>
	<div class="container">

	<div class="row">
<!----Login---->	
	<h1>Rédiger un nouvel article</h1>
	</div>
		<div class="row">
		<form method="post" action="script_login.php" name="formulaire" id="formulaire" >
	
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
					<label class="col-md-offset-4 col-md-4" for="name">Pseudo : </label>
						<div>
							<input type="text" id="Pseudo" name="Pseudo" class="col-md-offset-4 col-md-4"  placeholder="Entrez votre pseudo" value="<?php echo $_SESSION["pseudo"];?>">
						</div>
						<div class="row">
						<div class="col-md-offset-4 col-md-4">
						<span id="pseudoerr"class="error"><?php echo $_SESSION["errpseudo"];?></span>
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
					<div class="row">
					<div class="col-md-offset-5 col-md-3">
					<input class="envoi" type="submit" value="Rédiger mon article"/>
					</div>
					<div class="col-md-offset-5 col-md-3">
					<a href="index.php">Retour</a>
					</div>
					</div>
		<p class="button"></p>
		</form>
		<span id="message"></span>
		<span id="msg_all"></span>
		</div>
		
		
		
<script src="http://code.jquery.com/jquery-1.11.3.min.js">
</script>
<script>
    $(function(){
        $("#formulaire").submit(function(event){
            var monnom        = $("#Nom").val();
            var monprenom      = $("#Prenom").val();
			var monemail    = $("#Email").val();
            var monpseudo   = $("#Pseudo").val()
			var monmdp      = $("#Motdepasse").val();

            var meschamps = monnom + monprenom + monemail + monpseudo + monmdp;
            var message    = "Merci de remplir tous les champs";
            var nomalerte  = "Veuillez entrer votre nom";
			var prenomalerte  = "Veuillez entrer votre prénom";
			var emailalerte  = "Veuillez entrer votre e-mail";
			var pseudoalerte  = "Veuillez entrer votre pseudo";
			var mdpalerte  = "Veuillez entrer votre mot de passe";
			var erreurenvoi = false;
			
			$("#msg_all").html("");
			$("#nomerr").html("");
			$("#prenomerr").html("");
			$("#emailerr").html("");
			$("#pseudoerr").html("");
			$("#mdperr").html("");

            if (meschamps  == "") {
                $("#msg_all").html(message);
				var erreurenvoi = true;
            } 
			if (monnom == "") {
                $("#nomerr").html(nomalerte);
				var erreurenvoi = true;
            } 
			if (monprenom == "") {
                $("#prenomerr").html(prenomalerte);
				var erreurenvoi = true;
            } 
			if (monemail == "") {
                $("#emailerr").html(emailalerte);
				var erreurenvoi = true;
            } 
			if (monpseudo == "") {
                $("#pseudoerr").html(pseudoalerte);
				var erreurenvoi = true;
			 } 
			 if (monmdp == "") {
                $("#mdperr").html(mdpalerte);
				var erreurenvoi = true;				
			}
			if (erreurenvoi == false) {
                $.ajax({
                    type : "POST",
                    url: $(this).attr("action"),
                    data: $(this).serialize(),
                    success : function(data) {
						console.log(data);
						if (data == "erreur") {
							$("#emailerr").html("Veuillez rentrer un mail valide");
						}
						else {
							$("#formulaire").html("<div class='col-lg-offset-4 col-lg-4'><p>Vous êtes connecté.</p></div><br><div class='col-lg-offset-4 col-lg-4'><a class='cestparti' href='Texteditor.php'>C'est parti!</a></div>");
						}
                        
						
                  },
                    error: function() {
                        
                    }
                });
            }

            return false;
        });
    });
</script>
</body>
<html>