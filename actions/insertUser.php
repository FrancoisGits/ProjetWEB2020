<?php
session_start();
require_once'../bin/config/database.php';

var_dump($_POST);
var_dump($_SESSION);

if(!empty($_POST)) {
    try {

        $_SESSION["civilite"] = $_POST["civilite"];
        $_SESSION["nom"] = $_POST["nom"];
        $_SESSION["prenom"] = $_POST["prenom"];
        $_SESSION["adresse1"] = $_POST["adresse1"];
        $_SESSION["adresse2"] = $_POST["adresse2"];
        $_SESSION["codePostal"] = $_POST["codePostal"];
        $_SESSION["ville"] = $_POST["ville"];
        $_SESSION["tel1"] = $_POST["tel1"];
        $_SESSION["tel2"] = $_POST["tel2"];
        $_SESSION["email"] = $_POST["email"];

        if(!empty($_POST["societe"])) {
            $_SESSION["societe"] = $_POST["societe"];
        } else {
            $_SESSION["societe"] = null;
        }
        if(!empty($_POST["societe"])) {
            $_SESSION["poste"] = $_POST["poste"];
        } else {
            $_SESSION["poste"] = null;
        }






    } catch(Exception $e) {
    die($e->getMessage());
    }
}