<?php

try
{
    $pdo = new PDO ('mysql:host=localhost;dbname=sarahr', 'sarahr', '86LQ2H2vkU');

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
}

catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}

?>
