<?php
require "./includes/header.php";
require"./bin/config/database.php";
require("./includes/isClient.php");
?>
<section>
    <form action="./sql/requetesSql.php" class="container form" method="POST" id="form" onsubmit="return">
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
    </form>
</section>
<?php require "./includes/footer.php"; ?>
