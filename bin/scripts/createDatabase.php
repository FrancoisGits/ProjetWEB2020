<?php

require ('../config/database.php');

// fonction pour se connecter à la BDD
function connectDb($dbName) {
    try {
        $dsn = !$dbName ? 'mysql:host=' . DB_HOST . ';port=' . DB_PORT : DB_DSN;
        echo $dsn;
        $db = new PDO ($dsn, DB_USER, DB_PASS);
    } catch (PDOException $e) {
        echo 'erreur : ' .$e->getMessage();
    }
    return $db;
}

// fonction pour créer la base de données
function create(){
    // si $dbName est à false, la function connect() se co juste à MySQL
    // si $dbName est à true , la function connect() se co avec le dsn de la config (donc sur la base déjà créé)
    $dbName = false;
    $db = connectDb($dbName);

    echo "Script de création de BDD lancé \n";

    try {
        $content = utf8_encode(file_get_contents('.\connectlife.sql', FALSE, NULL));
        echo "C'est parti ! \n";
        $db->exec($content);
        echo "C'est fini ! \n";
    } catch (Exception $e) {
        echo 'erreur : ' . $e->getMessage();
    }
}


// TODO : finir fonction initLocalisation
// function pour insérer les CP/Ville
//function initLocalisation() {
//    echo "Script de remplissage CP/Ville lancé ! \n";
//    try {
//
//
//    } catch (Exception $e) {
//        echo 'erreur : ' . $e->getMessage();
//    }
//
//}

create();