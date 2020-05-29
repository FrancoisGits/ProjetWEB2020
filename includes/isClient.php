<?php
try {
    if (!isset($_SESSION['client']))
        throw new Exception("Vous n'êtes pas autorisé à consulter cette page. Veuillez contacter notre support technique.");
} catch (Exception $e) {
    echo 'erreur : ' . $e->getMessage();
    exit();
}
