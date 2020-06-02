<?php
try {
    if (!isset($_SESSION['client']))
        throw new Exception("<p>Erreur 403 : Vous n'êtes pas autorisé à consulter cette page. Veuillez contacter notre support technique.</p></div>");
} catch (Exception $e) {
    echo "<div class='paragraphe-accueil'>" . $e->getMessage();
    exit();
}
