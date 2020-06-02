<?php

require('../config/database.php');

// fonction pour se connecter à la BDD
function connectDb($dbName)
{
    try {
        $dsn = !$dbName ? 'mysql:host=' . DB_HOST . ';port=' . DB_PORT : 'mysql:dbname=connect_life' . ';host=' . DB_HOST . ';port=' . DB_PORT;
        echo $dsn;
        $db = new PDO ($dsn, DB_USER, DB_PASS);
    } catch (PDOException $e) {
        echo 'erreur connectDb() : ' . $e->getMessage() . "\r\n";
    }
    return $db;
}

function initFixture() {
    $withDbName = true;
    $db = connectDb($withDbName);

    echo "Script initialisation Fixtures lancé ! \n";

    try {
        $handle = fopen('./connectlife_fixtures.sql', 'rb');
        while(feof($handle) !== true) {
            $buffer = fgets($handle);
            echo ($buffer);
            $db->exec(utf8_encode($buffer));
        }
        fclose($handle);
        echo "Fini ! \r\n";
    } catch (Exception $e) {
        echo 'erreur initFixtures() : ' . $e->getMessage() . "\r\n";
    }
}

initFixture();