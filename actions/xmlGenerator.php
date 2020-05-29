<?php
$query = $db->query($request);

$xml = new DomDocument('1.0', 'utf-8');
$xml->formatOutput = true;

// ajouter le fichier .xsd dans le fichier xml avec le xsi:NoNamespaceSchemaLocation
$xsd = $xml->createElement('Clients');
$xml->appendChild($xsd);
$xsd->setAttribute("xmlns:xsi", "http://www.w3.org/2001/XMLSchema-instance");
$xsd->setAttribute("xsi:noNamespaceSchemaLocation", "clientsXmlSchema.xsd");
while ($client = $query->fetch(PDO::FETCH_ASSOC)) {
    $Client = $xml->createElement('Client');
    $xsd->appendChild($Client);
    $Client->setAttribute('id', $client['idClient']);
    $guid = $xml->createElement("guid", $client['guid']);
    $Client->appendChild($guid);
    $civilite = $xml->createElement('civilite', $client['civilite']);
    $Client->appendChild($civilite);
    $nom = $xml->createElement("nom", $client['nom']);
    $Client->appendChild($nom);
    $prenom = $xml->createElement("prenom", $client['prenom']);
    $Client->appendChild($prenom);
    $nomSociete = $xml->createElement("nomSociete", $client['nomSociete']);
    $Client->appendChild($nomSociete);
    $fonctionSociete = $xml->createElement("fonctionSociete", $client['fonctionSociete']);
    $Client->appendChild($fonctionSociete);
    $adresse1 = $xml->createElement("adresse1", $client['adresse1']);
    $Client->appendChild($adresse1);
    $adresse2 = $xml->createElement("adresse2", $client['adresse2']);
    $Client->appendChild($adresse2);
    $nomVille = $xml->createElement("nomVille", $client['nomVille']);
    $Client->appendChild($nomVille);
    $codePostal = $xml->createElement("codePostal", $client['codePostal']);
    $Client->appendChild($codePostal);
    $telephone1 = $xml->createElement("telephone1", $client['telephone1']);
    $Client->appendChild($telephone1);
    $telephone2 = $xml->createElement("telephone2", $client['telephone2']);
    $Client->appendChild($telephone2);
    $email = $xml->createElement("email", $client['email']);
    $Client->appendChild($email);
}

$fileName = date('Y_m_d_His') . "_ClientsToXml.xml";
$filePath = "./xml_file/" . $fileName;
$xml->save($filePath);