const formulaire = document.querySelector("#formulaire");

formulaire.addEventListener('submit', function(e) {
    e.preventDefault();
    //vérification coté client
    let test = true;
    console.log("test");
    //on recupere les inputs en required
    const requiredInputs = document.querySelectorAll('.formInputRequired')
    for(let requiredInput of requiredInputs){
        requiredInput.classList.remove("error")
        if(requiredInput.value === ''){
            test = false
            requiredInput.classList.add("error")
            requiredInput.name
        }
    }
    if(test){
        e.target.submit()
    }
    else {
        alert("Merci de remplir la totalité des champs")
    }
})