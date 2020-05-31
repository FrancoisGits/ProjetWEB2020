<div class="civilite">
    <span class="civilite-label">Civilité * :</span>
    <label class="radio">
        <input <?php if (isset($_SESSION['civilite']) && $_SESSION['civilite'] === "Madame"){ echo 'checked="checked"';} ?> type="radio" value="0" id="madame" name="civilite">
        Madame
        <span></span>
    </label>
    <label class="radio">
        <input <?php if (isset($_SESSION['civilite']) && $_SESSION['civilite'] === "Monsieur"){ echo 'checked="checked"';} ?> type="radio" value="1" id="monsieur" name="civilite">
        Monsieur
        <span></span>
    </label>
</div>

<div class="container">
    <p class="messageErreur messageErreurCivilite"></p>
</div>

<div class="container">
    <label for="nom">Nom * :</label>
    <input value="<?php if (isset($_SESSION['nom'])){echo $_SESSION['nom'];} ?>" type="text" placeholder="Nom" name="nom" id="nom">
    <p class="messageErreur messageErreurNom"></p>
</div>

<div class="container">
    <label for="prenom">Prénom * :</label>
    <input value="<?php if (isset($_SESSION['prenom'])){echo $_SESSION['prenom'];} ?>" type="text" placeholder="Prénom" name="prenom" id="prenom">
    <p class="messageErreur messageErreurPrenom"></p>
</div>


