<?php
require("./includes/header.php");
?>
<?php require("./includes/isClient.php");
session_unset();
session_destroy();
?>
    <section class="footerPosition">
        <img src="assets/images/validation.png" alt="C'est good !!" class="logoPage">
        <div class="paragraphe-accueil">
            <p>Merci d'avoir rempli le formulaire !</p>
            <p>Vous recevrez bientôt un bon d'achat sur l'adresse email que vous avez renseignée.</p>
        </div>
    </section>
<?php require("./includes/footer.php"); ?>