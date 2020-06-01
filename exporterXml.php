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

?>
<section>
    <div class="pAccueil">
        <p class="pAccueil">
            Votre questionnaire fichier xml a bien été généré,<br><br>
            Pour le télécharger veuillez cliquer sur le bouton ci dessous.<br>
        </p><br><br>
        <div class="pAccueil">
            <a href="<?php echo $filePath ?>" download="<?php echo $fileName ?>">
                <button type="button" id="trigger">Télécharger mon fichier</button>
            </a>
        </div>
</section>

<!--/on ne met à jour la table client pour changer le flag xml_generation que si on click sur le bouton-->
<!-- pour eviter de le faire lors du lancement de la page -->
<script type="text/javascript">
    let trigger = document.getElementById("trigger")
    trigger.onclick = xmlGenerateTo1;

    function xmlGenerateTo1() {
        let xhttp = new XMLHttpRequest()
        xhttp.open("GET", "./actions/xmlGenerationTo1.php", true)
        xhttp.send();
    }
</script>
<?php
require_once './includes/xsdDownload.php';
require_once './includes/footer.php';
?>




