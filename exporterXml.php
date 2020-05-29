<?php
require_once './includes/header.php';
require_once './bin/config/database.php';


    $request = "SELECT 
                    c.idClient,
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
                LEFT JOIN societes s ON s.idSociete = c.idSocieteCli
                WHERE c.xml_generation = 0";


        $query = $db->query($request);



$xml = new DomDocument('1.0', 'utf-8');
$xml->formatOutput = true;

// ajouter le fichier .xsd dans le fichier xml avec le xsi:NoNamespaceSchemaLocation
$xsd = $xml->createElementNS("http://www.w3.org/2001/XMLSchema-instance", 'nouveauClients');
$xml->appendChild($xsd);
$xsd->setAttributeNS('http://www.w3.org/2000/xmlns/', 'xmlns:g', 'clients.xsd');
try {
    while ($client = $query->fetch(PDO::FETCH_ASSOC)) {
        var_dump($client);
        $nouveauClient =$xml->createElement('nouveauClient');
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
} catch
(Exception $e) {
    var_dump($client);
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
$fileName = date('Y_m_d_His') . "_newClients";
$filePath = "./xml_file/" . date('Y_m_d_His') . "_newClients";
$xml->save($filePath);


$xmlGenerationTo1 = $db->query('UPDATE clients SET xml_generation = 1 WHERE xml_generation = 0');

?>

<section>
    <div class="pAccueil">
        <p class="pAccueil" >
            Votre questionnaire fichier xml a bien été généré,<br><br>
            Pour le télécharger veuillez cliquer sur le bouton ci dessous.<br>
        </p><br><br>
        <div class="pAccueil">
            <a href="<?php echo $filePath ?>" download="<?php echo $fileName ?>"><button type="button">Télécharger mon fichier</button></a>
        </div>
</section>




