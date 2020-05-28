<?php
require_once("./includes/header.php");
require_once("./includes/isClient.php");
?>
<section>
        <p class="pAccueil" >
            Bonjour,<br>
            Nous vous remercions de prendre quelques minutes pour remplir ce formulaire pour actualiser nos données clients<br>
            En répondant à ce formulaire, vous bénéficierez d'un bon d'achat sur l'ensemble de nos produits que vous recevrez<br>
            par email.<br>
            Vous devrez obligatoirement renseigner la même adresse email sur laquel vous avez reçu notre premier mail.<br><br>
        </p>
     <div class="partpro">
        <a class="button" <?php
        if($_SESSION['isSociete']){
            echo 'href="formulairePro.php"';
        }
        else{
            echo 'href="formulairePart.php"';
        }
        ?>
         ><span>Questionnaire</span></a>
    </div>
</section>
<?php require_once("./includes/footer.php"); ?>
