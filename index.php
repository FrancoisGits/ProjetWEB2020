<?php
session_start();
require_once "./bin/config/database.php";
$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case preg_match('(fic\?q=\w{8}-\w{4}-\w{4}-\w{4}-\w{12}$)', $request) == 1 :
        $guid = $_GET['q'];
        $_SESSION["guid"] = $guid;
        $_SESSION['client'] = TRUE;
        $sqlRequest = $db->prepare("SELECT GUID.guid as guidInit, clients.guid as guidClient, GUID.isSociete FROM clients_guid GUID LEFT JOIN clients ON clients.guid = GUID.guid WHERE GUID.guid = UPPER(:guid)"); // tout faire en une requete
        $sqlRequest->execute([":guid" => $guid]);
        $resultat = $sqlRequest->fetch();
        // var_dump($resultat);

        if ((isset($resultat["guidInit"])) && $resultat["guidClient"] == null) {
            $_SESSION["isSociete"] = $resultat["isSociete"] == 1 ? true : false;
            header('Location: accueil.php');
            exit();

        } else if ((isset($resultat["guidInit"])) && (isset($resultat["guidClient"])) && $resultat["guidInit"] == $resultat["guidClient"]) {
            header('Location:formDone.php');
            exit();

        } else {
            header('Location: brokenLink.php');
            exit();
        }
        break;
    case $request === '/exporterXml' :
        $_SESSION['client'] = TRUE;
        header('Location:exporterXml.php');
        exit();
        break;
    case $request === '/exporterXmlComplet' :
        $_SESSION['client'] = TRUE;
        header('Location:exporterXmlComplet.php');
        exit();
        break;

    default:
        header('Location: 404.php');
        exit();
}

