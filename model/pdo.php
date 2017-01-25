<?php

try
{
    $pdo = new PDO ('mysql:host=localhost;dbname=sarahr;charset=utf8', 'sarahr', '86LQ2H2vkU', array(
PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}

?>
