<?php
require_once './includes/header.php';
require_once './bin/config/database.php';

$request = "SELECT 
                c.idClient,
                c.guid,
                c.civilite,
                c.nom,
                c.prenom,
                c.nomSociete,
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
            WHERE c.xml_generation = 0";

require './actions/xmlGenerator.php';

$xmlGenerationTo1 = $db->query('UPDATE clients SET xml_generation = 1 WHERE xml_generation = 0');
?>
<section>
    <div class="pAccueil">
        <p class="pAccueil">
            Votre questionnaire fichier xml a bien été généré,<br><br>
            Pour le télécharger veuillez cliquer sur le bouton ci dessous.<br>
        </p><br><br>
        <div class="pAccueil">
            <a href="<?php echo $filePath ?>" download="<?php echo $fileName ?>">
                <button type="button">Télécharger mon fichier</button>
            </a>
        </div>
</section>
<?php require_once './includes/xsdDownload.php'; ?>




