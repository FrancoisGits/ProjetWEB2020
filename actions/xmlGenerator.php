<?php
$query = $db->query($request);

$xml = new DomDocument('1.0', 'utf-8');
$xml->formatOutput = true;

// ajouter le fichier .xsd dans le fichier xml avec le xsi:NoNamespaceSchemaLocation
$xsd = $xml->createElementNS("http://www.w3.org/2001/XMLSchema-instance", 'nouveauClients');
$xml->appendChild($xsd);
$xsd->setAttributeNS('http://www.w3.org/2000/xmlns/', 'xmlns:g', 'clients.xsd');

while ($client = $query->fetch(PDO::FETCH_ASSOC)) {
    $nouveauClient = $xml->createElement('nouveauClient');
    $xsd->appendChild($nouveauClient);
    $nouveauClient->setAttribute('id', $client['idClient']);
    $guid = $xml->createElement("guid", $client['guid']);
    $nouveauClient->appendChild($guid);
    $civilite = $xml->createElement('civilite', $client['civilite']);
    $nouveauClient->appendChild($civilite);
    $nom = $xml->createElement("nom", $client['nom']);
    $nouveauClient->appendChild($nom);
    $prenom = $xml->createElement("prenom", $client['prenom']);
    $nouveauClient->appendChild($prenom);
    $nomSociete = $xml->createElement("nomSociete", $client['nomSociete']);
    $nouveauClient->appendChild($nomSociete);
    $fonctionSociete = $xml->createElement("fonctionSociete", $client['fonctionSociete']);
    $nouveauClient->appendChild($fonctionSociete);
    $adresse1 = $xml->createElement("adresse1", $client['adresse1']);
    $nouveauClient->appendChild($adresse1);
    $adresse2 = $xml->createElement("adresse2", $client['adresse2']);
    $nouveauClient->appendChild($adresse2);
    $nomVille = $xml->createElement("nomVille", $client['nomVille']);
    $nouveauClient->appendChild($nomVille);
    $codePostal = $xml->createElement("codePostal", $client['codePostal']);
    $nouveauClient->appendChild($codePostal);
    $telephone1 = $xml->createElement("telephone1", $client['telephone1']);
    $nouveauClient->appendChild($telephone1);
    $telephone2 = $xml->createElement("telephone2", $client['telephone2']);
    $nouveauClient->appendChild($telephone2);
    $email = $xml->createElement("email", $client['email']);
    $nouveauClient->appendChild($email);
}

$fileName = date('Y_m_d_His') . "_newClients";
$filePath = "./xml_file/" . date('Y_m_d_His') . "_newClients";
$xml->save($filePath);