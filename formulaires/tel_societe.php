<div class="container">
    <label for="telSociete">Téléphone société * :</label>
    <input value="<?php if (isset($_SESSION['tel1'])){echo $_SESSION['tel1'];} ?>" type="text" name="telSociete" id="telSociete" minlength="10" maxlength="10">
    <p class="messageErreur messageErreurTelSociete"></p>
</div>

<div class="container">
    <label for="telDirect">Téléphone direct * :</label>
    <input value="<?php if (isset($_SESSION['tel1'])){echo $_SESSION['tel2'];} ?>" type="text" name="telDirect" id="telDirect" minlength="10" maxlength="10">
    <p class="messageErreur messageErreurTelDirect"></p>
</div>

