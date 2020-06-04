<?php
session_start();
require_once '../bin/config/database.php';
require_once './formatString.php';
//var_dump($_POST);
if (!empty($_POST)) {
    try {

        // Verifications avant ajout BDD
        if (isset($_POST["civilite"]) && ($_POST["civilite"] === "0" || $_POST["civilite"] === "1")) {
            $client["civilite"] = htmlspecialchars(intval($_POST["civilite"]));
        } else {
            throw new Exception('civilite must be 0 or 1 or notnull');
        }
        if (!empty($_POST["nom"])) {
            $client["nom"] = formatString($_POST["nom"], true);
        } else {
            throw new Exception('nom must be not null');
        }
        if (!empty($_POST["prenom"])) {
            $client["prenom"] = formatString($_POST["prenom"], false);
        } else {
            throw new Exception('prenom must be not null');
        }
        if ($_SESSION["isSociete"] === true) {
            if (!empty($_POST["nomSociete"])) {
                $client["nomSociete"] = formatString($_POST["nomSociete"], true);
            } else {
                throw new Exception('nomSociete must be not null');
            }
            if (!empty($_POST["posteOccupe"])) {
                $client["fonctionSociete"] = formatString($_POST["posteOccupe"], true);
            } else {
                throw new Exception('posteOccupe must be not null');
            }
            if (!empty($_POST["telSociete"])) {
                $client["tel1"] = formatString($_POST["telSociete"], false);
            } else {
                throw new Exception('telSociete must be not null');
            }
            if (!empty($_POST["telDirect"])) {
                $client["tel2"] = formatString($_POST["telDirect"], false);
            } else {
                throw new Exception('telDirect must be not null');
            }
        }
        if (!empty($_POST["adresse1"])) {
            $client["adresse1"] = formatString($_POST["adresse1"], false);
        } else {
            throw new Exception('adresse1 must be not null');
        }
        if (!empty($_POST["adresse2"])) {
            $client["adresse2"] = formatString($_POST["adresse2"], false);
        }
        if (!empty($_POST["codePostal"]) && (strlen($_POST["codePostal"]) == 5 || strlen($_POST["codePostal"]) == 4)) {
            $client["codePostal"] = formatString(intval($_POST["codePostal"]), false);
        } else {
            throw new Exception('codePostal must be not null and length must be 4/5');
        }
        if (!empty($_POST["ville"])) {
            $client["ville"] = formatString($_POST["ville"], false);
        } else {
            throw new Exception('ville must be not null');
        }
        if ($_SESSION["isSociete"] === false) {
            $client['nomSociete'] = null;
            $client['posteSociete'] = null;
            if (!empty($_POST["telFixe"])) {
                $client["tel1"] = formatString($_POST["telFixe"], false);
            } else if (!empty($_POST["telPortable"])) {
//                var_dump($_POST["telPortable"]);
//                exit();
                $client["tel2"] = formatString(($_POST["telPortable"]), false);
            } else if (!empty($_POST["telFixe"]) && !empty($_POST["telPortable"])) {
                $client["tel1"] = formatString($_POST["telFixe"], false);
                $client["tel2"] = formatString(($_POST["telPortable"]), false);

            } else {
                throw new Exception('one portable must be not null');
            }
        }
        if (!empty($_POST["email"])) {
            $client["email"] = trim($_POST["email"]);
        } else {
            throw new Exception('email must be not null');
        }

    } catch (Exception $e) {
        die($e->getMessage());
    }

    $_SESSION["civilite"] = $_POST["civilite"];
    $_SESSION["nom"] = $_POST["nom"];
    $_SESSION["prenom"] = $_POST["prenom"];
    if (!empty($_POST["nomSociete"])) {
        $_SESSION["societe"] = $_POST["nomSociete"];
    } else {
        $_SESSION["societe"] = null;
    }
    if (!empty($_POST["posteOccupe"])) {
        $_SESSION["poste"] = $_POST["posteOccupe"];
    } else {
        $_SESSION["poste"] = null;
    }

    $_SESSION["adresse1"] = $_POST["adresse1"];
    $_SESSION["adresse2"] = $_POST["adresse2"];
    $_SESSION["codePostal"] = $_POST["codePostal"];
    $_SESSION["ville"] = $_POST["ville"];

    if (!empty($_POST["telFixe"])) {
        $_SESSION['tel1'] = $_POST["telFixe"];
    } else if (!empty($_POST["telSociete"])) {
        $_SESSION['tel1'] = $_POST["telSociete"];
    } else {
        $_SESSION["tel1"] = null;
    }

    if (!empty($_POST["telPortable"])) {
        $_SESSION['tel2'] = $_POST["telPortable"];
    } else if (!empty($_POST["telDirect"])) {
        $_SESSION['tel2'] = $_POST["telDirect"];
    } else {
        $_SESSION["tel2"] = null;
    }
    $_SESSION["email"] = $_POST["email"];


    // on verifie que l'email trouve bien correspondance avec un guid dans la table des guids.
    $sqlRequest = $db->prepare("SELECT guid FROM clients_guid WHERE email = :email  ");
    $sqlRequest->execute([":email" => $client["email"]]);
    $resultat = $sqlRequest->fetch();


    if (!empty($resultat['guid'])) {

        $sqlRequest = $db->prepare("SELECT GUID.guid as guidInit, clients.guid as guidClient, GUID.isSociete FROM clients_guid GUID LEFT JOIN clients ON clients.guid = GUID.guid WHERE GUID.guid = UPPER(:guid)");
        $sqlRequest->execute([":guid" => $resultat['guid']]);
        $resultat = $sqlRequest->fetch();

        if ((isset($resultat["guidInit"])) && (isset($resultat["guidClient"])) && $resultat["guidInit"] === $resultat["guidClient"]) {
            var_dump($resultat);
            header('Location: ../formDone.php');
            exit();
        }

        $client['guid'] = $resultat['guidInit'];
        $sqlRequest = $db->prepare("SELECT idVille FROM localisations WHERE nomVille = :nomVille  ");
        $sqlRequest->execute([":nomVille" => $client["ville"]]);
        $resultat = $sqlRequest->fetch();

        $client['idVille'] = $resultat['idVille'];


        $requestInsertClients = 'INSERT INTO clients (
                                guid,
                                civilite, 
                                nom, 
                                prenom,
                                nomSociete,
                                fonctionSociete,
                                adresse1, 
                                adresse2,
                                idVille,
                                telephone1, 
                                telephone2, 
                                email)
                                 VALUES (
                                :guid,
                                :civilite, 
                                :nom, 
                                :prenom,
                                :nomSociete,
                                :fonctionSociete,
                                :adresse1, 
                                :adresse2,
                                :idVille,
                                :telephone1, 
                                :telephone2, 
                                :email);';

        $params =
            [
                'guid' => $client['guid'],
                'civilite' => $client['civilite'],
                'nom' => $client['nom'],
                'prenom' => $client['prenom'],
                'nomSociete' => $client['nomSociete'],
                'fonctionSociete' => $client['fonctionSociete'],
                'adresse1' => $client['adresse1'],
                'adresse2' => $client['adresse2'],
                'idVille' => $client['idVille'],
                'telephone1' => $client['tel1'],
                'telephone2' => $client['tel2'],
                'email' => $client['email'],
            ];
        $prep = $db->prepare($requestInsertClients);
        $prep->execute($params);

        header('Location: ../formOK.php');
        exit();

    } else {
        header('Location: ../emailInvalide.php');
        exit();
    }

} else {
    echo "erreur : tableau POST est vide";
}

