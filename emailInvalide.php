<?php
require_once("./includes/header.php");
//require_once("./includes/isClient.php");
?>
<section class="footerPosition">
    <img src="assets/images/forbidden.png" alt="'Attention à votre mail !!" class="logoPage">
    <div class="paragraphe-accueil" >
        <p><?php $_SESSION['civilite'] = $_SESSION['civilite'] == 0 ? "Madame" : "Monsieur"; echo  $_SESSION['civilite'] . ' ' .  strtoupper($_SESSION['nom']) . ' ' .  $_SESSION['prenom']; ?></p>
        <p>Votre adresse mail ne correspond pas à votre mail de reception du lien</p>
        <p>Il est impératif d'indiquer la même adresse que celle de contact.</p>
        <p>Si vous voulez modifiez le formulaire, cliquez sur le bouton ci-dessous :</p>
        <p>Vous pouvez contacter notre service de mass-mailing pour des informations complémentaires.</p>
        <p>Merci de votre compréhension.</p>
    </div>
    <div class="paragraphe-milieu" >
        <a class="buttonForm" href="formulaire.php">Retour au formulaire</a>
    </div>
</section>
<?php require_once("./includes/footer.php"); ?>
