<?php
require '../bin/config/database.php';
//var_dump($_GET);
$codePostal = $_GET['codePostal'];
$sqlRequest = $db->prepare("SELECT nomVille FROM connect_life.localisations WHERE codePostal = :codePostal");
$sqlRequest->execute([":codePostal" => $codePostal]);
$resultat = $sqlRequest->fetchAll();
echo(json_encode($resultat));