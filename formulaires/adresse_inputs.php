<div class="container">
    <label for="adresse1">Adresse 1 * :</label>
    <input value="<?php if (isset($_SESSION['adresse1'])){echo $_SESSION['adresse1'];} ?>" type="text" placeholder="1, rue de l'exemple" name="adresse1" id="adresse1">
    <p class="messageErreur messageErreurAdresse1"></p>
</div>

<div class="container">
    <label for="adresse2">Adresse 2 :</label>
    <input value="<?php if (isset($_SESSION['adresse2'])){echo $_SESSION['adresse2'];} ?>" type="text" placeholder="Etage 2, Appt 28" name="adresse2" id="adresse2">
    <p class="messageErreur messageErreurAdresse2"></p>
</div>

<div class="container">
    <label for="codePostal">Code postal * :</label>
    <input type="text" placeholder="75000" name="codePostal" id="codePostal" maxlength="5" pattern="^[0-9]{4,5}">
    <p class="messageErreur messageErreurCodePostal"></p>
</div>

<div class="container">
    <label for="ville">Ville * :</label>
    <div class="select-wrapper">
            <select class="ville" name="ville" id="ville"></select>
        </div>
    <p class="messageErreur messageErreurVille"></p>
</div>
