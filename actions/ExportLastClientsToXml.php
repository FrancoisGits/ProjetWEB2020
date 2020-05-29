<?php
session_start();
require_once './bin/config/database.php';

try{
    $request = 'SELECT c.idClient,
                    c.guid,
                    c.civilite,
                    c.nom,
                    c.prenom,
                    s.nomSociete,
                    c.fonctionSociete,
                    c.adresse1,
                    c.adresse2,
                    l.nomVille,
                    l.codePostal,
                    c.telephone1,
                    c.telephone2,
                    c.email
                FROM clients c
                LEFT JOIN  localisations l ON c.idVille = l.idVille
                LEFT JOIN societes s ON s.idSociete = c.idSociete
                WHERE c.xml_generation = 0';

    $query = $db->query($request);
    $result = $query->fetchAll();

        if (empty($result)){
            throw new Exception('Aucun nouveau client depuis la dernière génération du fichier xml');
        }
} catch (Exception $e) {
    header('Refresh');
}

$xml = new DomDocument('1.0', 'utf-8');
$xml->formatOutput = true;
//$nouveauClients = $xml->createElement('nouveauClients');
$xsd= $xml->createElementNS("http://www.w3.org/2001/XMLSchema-instance", 'nouveauClients');
$xml->appendChild($xsd);
$xsd->setAttributeNS('http://www.w3.org/2000/xmlns/' ,'xmlns:g', 'clients.xsd');

while($client=$result->fetch(PDO::FETCH_OBJ)){
    $nouveauClient=$xml->createElement('nouveauClient');
    $nouveauClient->setAttribute('id', $client['idClient']);
    $guid = $xml->createElement("guid", $client['guid']);
    $nouveauClient->appendChild($guid);
    $civilite = $xml->createElement('civilite', $client['civilite']);
    $nouveauClient->appendChild($civilite);
    $nom = $xml->createElement("nom", $client['nom']);
    $nouveauClient->appendChild($nom);
    $prenom = $xml->createElement("prenom", $client['guid']);
    $nouveauClient->appendChild($guid);
    $guid = $xml->createElement("guid", $client['guid']);
    $nouveauClient->appendChild($guid);
    $guid = $xml->createElement("guid", $client['guid']);
    $nouveauClient->appendChild($guid);
    $guid = $xml->createElement("guid", $client['guid']);
    $nouveauClient->appendChild($guid);
    $guid = $xml->createElement("guid", $client['guid']);
    $nouveauClient->appendChild($guid);
    $guid = $xml->createElement("guid", $client['guid']);
    $nouveauClient->appendChild($guid);
    $guid = $xml->createElement("guid", $client['guid']);
    $nouveauClient->appendChild($guid);
    $guid = $xml->createElement("guid", $client['guid']);
    $nouveauClient->appendChild($guid);
    $guid = $xml->createElement("guid", $client['guid']);
    $nouveauClient->appendChild($guid);






}



