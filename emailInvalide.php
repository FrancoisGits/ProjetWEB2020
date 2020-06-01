<?php
require_once("./includes/header.php");
require_once("./includes/isClient.php");
?>
<section>
    <div class="paragraphe" >
        <p><?php $_SESSION['civilite'] = $_SESSION['civilite'] == 0 ? "Madame" : "Monsieur"; echo  $_SESSION['civilite'] . ' ' .  strtoupper($_SESSION['nom']) . ' ' .  $_SESSION['prenom']; ?></p>
        <p>Votre adresse mail ne correspond pas à votre mail de reception du lien</p>
        <p>Il est impératif d'indiquer la même adresse que celle de contact.</p>
        <p>Si vous voulez modifiez le formulaire, cliquez sur le bouton ci-dessous :</p>
        <a class="button" href="formulaire.php"><span>Retour au formulaire</span></a>
        <p>Vous pouvez contacter notre service de mass-mailing pour des informations complémentaires.</p>
        <p>Merci de votre compréhension.<p>
    </div>
</section>
<?php require_once("./includes/footer.php"); ?>
