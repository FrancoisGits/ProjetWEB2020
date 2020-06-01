<?php
require "./includes/header.php";
require"./bin/config/database.php";
require("./includes/isClient.php");
?>
<section class="footerPosition">
    <form action="actions/insertUser.php" method="POST" id="formulaire" >
        <?php
        require "formulaires/civ_id_inputs.php";
        if($_SESSION['isSociete']) {
            require "formulaires/societe_id.php";
        }
        require "formulaires/adresse_inputs.php";
        if($_SESSION['isSociete']) {
            require "formulaires/tel_societe.php";
        }
        else {
            require "formulaires/tel_particulier.php";
        }
        require "formulaires/email.php";
        require "formulaires/fin_form.php";
        ?>
        <div class="sub">
            <input type="submit" class="submit" value="Valider">
        </div>
    </form>
</section>
<?php require "./includes/footer.php"; ?>
