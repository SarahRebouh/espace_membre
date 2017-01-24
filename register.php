<?php  

    require 'model/pdo.php';

    $req = $pdo->prepare("INSERT INTO member_acs SET password = ?");

    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $req->execute([$password]);

?>