<?php
require_once("./includes/header.php");
require_once("./includes/isClient.php");
?>
<section>
    <div class="container">
        <p class="surveyOK_p" >Bonjour,<br>
            Afin de vous fournir une meilleure expérience, nous recueillons vos coordonnées.<br>
            Nous vous remercions de bien vouloir consacrer quelques minutes à ce questionnaire. <br><br>
            Suite à ce questionnaire vous recevrez un bon d'achat à appliquer sur l'ensemble de nos produits et d'une durée de validité d'un an.
        </p>
        <p class="surveyOK_p" >Si vous avez des questions,<br> N’hésitez pas à contacter Anthony Stark au 05 62 80 44 27 ou par email sur a.stark@connectlife.com
        </p>
        <p class="surveyOK_p" >
            Pensez à renseigner l'adresse email avec laquelle vous avez reçu ce lien.<br><br>
            Pour commencer le questionnaire veuilliez cliquer sur le bouton ci dessous:
        </p>
        <div class="partpro">
            <a class="button" <?php
            if($_SESSION['isSociete']){
                echo 'href="http://www.connectlife.com/surveyPro.php">';
            }
            else{
                echo 'href="http://www.connectlife.com/surveyPart.php">';
            }
            ?>
            <span>Questionnaire</span></a>
        </div>
</section>
<?php require_once("./includes/footer.php"); ?>
