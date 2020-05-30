let villes = document.querySelector("#ville");
let codePostal = document.querySelector('#codePostal');
codePostal.addEventListener('input', function (e) {
    villes.innerHTML = '';
    let req = new XMLHttpRequest();
    req.open("GET", "../../actions/getVille.php?codePostal=" + codePostal.value, true)
    req.addEventListener("load", function () {
        console.log(req.responseText);
        let communes = JSON.parse(req.responseText);
        for (let commune of communes) {
            let option = document.createElement("option");
            option.innerHTML = commune.nomVille;
            option.value = commune.nomVille;
            villes.appendChild(option)
        }
    })
    req.send(null);
})