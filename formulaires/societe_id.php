<div class="container">
    <label for="nomSociete">Nom de la société * :</label>
    <input value="<?php if (isset($_SESSION['societe'])){echo $_SESSION['societe'];} ?>" type="text" placeholder="Societe" name="nomSociete" id="nomSociete">
    <p class="messageErreur messageErreurNomSociete"></p>
</div>

<div class="container">
    <label for="posteOccupe">Poste occupé * :</label>
    <input value="<?php if (isset($_SESSION['poste'])){echo $_SESSION['poste'];} ?>" type="text" placeholder="Poste" name="posteOccupe" id="posteOccupe">
    <p class="messageErreur messageErreurPosteOccupe"></p>
</div>

