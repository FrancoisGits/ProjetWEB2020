<div class="inputForm">
    <label for="adresse1">Adresse 1 * : </label>
    <input placeholder="1, rue de l'exemple" type="text" class="formInputRequired" id="adresse1" name="adresse1" />
</div>
<div class="inputForm">
    <label for="adresse2">Adresse 2 : </label>
    <input placeholder="Etage 2, Appt 28" type="text" class="formInput" id="adresse2" name="adresse2"  />
</div>
<div class="inputForm">
    <label for="codePostal">Code Postal * : </label>
    <input  placeholder="75000" type="text" class="formInputRequired" id="codePostal"  name="codePostal" minlength="5" maxlength="5" pattern="^[0-9]{4,5}" />
</div>
<div class="inputForm">
    <label for="ville">Ville * : </label>
    <select id="ville" class="formInputRequired"  name="ville">
        <option>
            ville
        </option>
    </select>
</div>

