<?php

try
{
    $pdo = new PDO ('mysql:host=localhost;dbname=sarahr;charset=utf8', 'sarahr', '86LQHH2vkU TeUWJrnw7n');
    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}

?>