<div class="container">
    <p class="tel">Remplissez au moins un numéro de téléphone *</p>
    <p class="messageErreurTel"></p>
</div>

<div class="container">
    <label for="telFixe">Téléphone fixe :</label>
    <input value="<?php if (isset($_SESSION['tel1'])){echo $_SESSION['tel1'];} ?>" type="text" name="telFixe" id="telFixe" minlength="10" maxlength="10">
    <p class="messageErreur messageErreurTelFixe"></p>
</div>

<div class="container">
    <label for="telPortable">Téléphone portable  :</label>
    <input value="<?php if (isset($_SESSION['tel2'])){echo $_SESSION['tel2'];} ?>" type="text" name="telPortable" id="telPortable" minlength="10" maxlength="10">
    <p class="messageErreur messageErreurTelPortable"></p>
</div>
