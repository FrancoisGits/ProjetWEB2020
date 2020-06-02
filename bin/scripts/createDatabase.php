<?php

require ('../config/database.php');

// fonction pour se connecter à la BDD
function connectDb($dbName) {
    try {
        $dsn = !$dbName ? 'mysql:host=' . DB_HOST . ';port=' . DB_PORT : 'mysql:dbname=connect_life' . ';host=' . DB_HOST . ';port=' . DB_PORT;
        echo $dsn;
        $db = new PDO ($dsn, DB_USER, DB_PASS);
    } catch (PDOException $e) {
        echo 'erreur connectDb() : ' . $e->getMessage() . "\r\n";
    }
    return $db;
}

// fonction pour créer la base de données
function create(){
    // si $dbName est à false, la function connect() se co juste à MySQL
    // si $dbName est à true , la function connect() se co avec le dsn de la config (donc sur la base déjà créé)
    $dbName = false;
    $db = connectDb($dbName);

    echo "Script de création de BDD lancé \r\n";

    try {
        $content = utf8_encode(file_get_contents('.\connectlife.sql', FALSE, NULL));
        echo "C'est parti ! \r\n";
        $db->exec($content);
        echo "C'est fini ! \r\n";
    } catch (Exception $e) {
        echo 'erreur create() : ' . $e->getMessage() . "\r\n";
    }
    return $db;
}

// function pour insérer les CP/Ville
function initLocalisation() {
    $withDbName = true;
    $db = connectDb($withDbName);

    echo "Script de fixtures CP/Ville lancé ! \n";

    try {
        $handle = fopen('./connectlife_localisations_data.sql', 'rb');
        while(feof($handle) !== true) {
            $buffer = fgets($handle);
            echo($buffer);
            $db->exec(utf8_encode($buffer));
        }
        fclose($handle);
        echo "Fini ! \r\n";
    } catch (Exception $e) {
        echo 'erreur initLocalisation() : ' . $e->getMessage() . "\r\n";
    }

}

//execution des scripts
create();
initLocalisation();