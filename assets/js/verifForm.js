const form = document.querySelector("form");

form.addEventListener('submit', function (e) {
        e.preventDefault();

        let test = true

        const checkMadame = document.querySelector("#madame")
        const checkMonsieur = document.querySelector("#monsieur")

        // if (checkMadame.checked == false && checkMonsieur.checked == false) {
        //     checkMadame.style.borderColor = "red"
        //     document.querySelector('.messageErreurCivilite').textContent = 'Veuillez indiquez votre civilité'
        //     console.log('pas coché')
        //     test = false
        //     console.log()
        // } else if (checkMadame.checked == true && checkMonsieur.checked == true) {
        //     document.querySelector('.messageErreurCivilite').textContent = 'Veuillez indiquez une seule civilité'
        //     console.log('2 cochées')
        //     test = false
        // } else {
        //     document.querySelector('.messageErreurCivilite').textContent = ''
        //     console.log('coché')
        // }

        //verification sur le nom
        let nom = document.querySelector('#nom')
        nom.classList.remove('error')
        if (nom.value.trim() === '') {
            nom.classList.add('error')
            test = false
            document.querySelector('.messageErreurNom').textContent = 'Veuillez indiquer un nom valide'
        } else {
            document.querySelector('.messageErreurNom').textContent = ''
        }

        //verification sur le prenom
        let prenom = document.querySelector('#prenom')
        prenom.classList.remove('error')
        if (prenom.value.trim() === '') {
            prenom.classList.add('error')
            test = false
            document.querySelector('.messageErreurPrenom').textContent = 'Veuillez indiquer un prénom valide'
        } else {
            document.querySelector('.messageErreurPrenom').textContent = ''
        }

        //verification sur le nom societe
        let nomSociete = document.querySelector('#nomSociete')
        if (typeof (nomSociete) != 'undefined' && nomSociete != null) {
            nomSociete.classList.remove('error')
            if (nomSociete.value.trim() === '') {
                nomSociete.classList.add('error')
                test = false
                document.querySelector('.messageErreurNomSociete').textContent = 'Veuillez indiquer un nom de société valide'
            } else {
                document.querySelector('.messageErreurNomSociete').textContent = ''
            }
        }

        //verification sur poste occupe
        let posteOccupe = document.querySelector('#posteOccupe')
        if (typeof (posteOccupe) != 'undefined' && posteOccupe != null) {
            posteOccupe.classList.remove('error')
            if (posteOccupe.value.trim() === '') {
                posteOccupe.classList.add('error')
                test = false
                document.querySelector('.messageErreurPosteOccupe').textContent = 'Veuillez indiquer un nom de poste valide'
            } else {
                document.querySelector('.messageErreurPosteOccupe').textContent = ''
            }
        }

        //verification adresse 1
        let adresse1 = document.querySelector('#adresse1')
        adresse1.classList.remove('error')
        if (adresse1.value.trim() === '') {
            adresse1.classList.add('error')
            test = false
            document.querySelector('.messageErreurAdresse1').textContent = 'Veuillez indiquer une adresse valide'
        } else {
            document.querySelector('.messageErreurAdresse1').textContent = ''
        }

        //verification codePostal
        let codePostal = document.querySelector('#codePostal')
        codePostal.classList.remove('error')
        if (codePostal.value.trim() === '') {
            codePostal.classList.add('error')
            test = false
            document.querySelector('.messageErreurCodePostal').textContent = 'Veuillez indiquer un code postal existant'
        } else {
            document.querySelector('.messageErreurCodePostal').textContent = ''
        }

        //verification sur la ville
        let ville = document.querySelector('#ville')
        let wrapper = document.querySelector('.select-wrapper')
        let select = document.querySelector('.select-wrapper select')
        if (ville.value.trim() === '') {
            wrapper.style.borderColor = 'red'
            wrapper.style.color = 'red'
            select.style.borderColor = 'red'
            test = false
            document.querySelector('.messageErreurVille').textContent = 'Veuillez choisir une ville dans la liste '
        } else {
            document.querySelector('.messageErreurVille').textContent = ''
            wrapper.style.borderColor = 'white'
            wrapper.style.color = 'white'
            select.style.borderColor = 'white'
        }

        //verification sur tel societe
        let telSociete = document.querySelector('#telSociete')
        if (typeof (telSociete) != 'undefined' && telSociete != null) {
            telSociete.classList.remove('error')
            if (telSociete.value.trim() === '' || /^\d+$/.test(telSociete.value) === false) {
                telSociete.classList.add('error')
                test = false
                document.querySelector('.messageErreurTelSociete').textContent = 'Veuillez indiquer un numéro de téléphone valide'
            } else {
                document.querySelector('.messageErreurTelSociete').textContent = ''
            }
        }

        // Verification sur tel Direct
        let telDirect = document.querySelector('#telDirect')
        if (typeof (telDirect) != 'undefined' && telDirect != null) {
            telDirect.classList.remove('error')
            if (telDirect.value.trim === '' || /^\d+$/.test(telDirect.value) === false) {
                telDirect.classList.add('error')
                test = false
                document.querySelector('.messageErreurTelDirect').textContent = 'Veuillez indiquer un numéro de téléphone valide'
            } else {
                document.querySelector('.messageErreurTelDirect').textContent = ''
            }
        }

        //Verification sur tel particulier
        let telFixe = document.querySelector('#telFixe')
        let telPortable = document.querySelector('#telPortable')

        if ((typeof (telDirect) != 'undefined' && telDirect != null) || (typeof (telPortable) != 'undefined' && telPortable != null)) {
            telFixe.classList.remove('error')
            telPortable.classList.remove('error')
            if (telFixe.value.trim() === '' && telPortable.value.trim() === '') {
                console.log("Aucun numero")
                telFixe.style.borderColor = "red"
                telPortable.style.borderColor = "red"
                document.querySelector('.messageErreurTel').textContent = 'Veuillez indiquer au moins un numéro de téléphone'
                test = false
                document.querySelector('.messageErreurTelFixe').textContent = 'Veuillez indiquer un numéro de téléphone valide'
                document.querySelector('.messageErreurTelPortable').textContent = 'Veuillez indiquer un numéro de téléphone valide'
            } else if (telFixe.value.trim() !== '' || telPortable.value.trim() !== '') {
                document.querySelector('.messageErreurTel').textContent = ''
                if (telFixe.value.trim() !== '' && /^\d+$/.test(telFixe.value) === false) {
                    test = false
                    console.log("telfixe rouge telportable blanc")
                    telFixe.style.borderColor = 'red'
                    telPortable.style.borderColor = "white"
                    document.querySelector('.messageErreurTelPortable').textContent = ''
                    document.querySelector('.messageErreurTelFixe').textContent = 'Veuillez indiquer un numéro de téléphone valide'
                } else if (telPortable.value.trim() !== '' && /^\d+$/.test(telPortable.value) === false) {
                    test = false
                    console.log("telfixe blanc, telport rouge")
                    telFixe.style.borderColor = 'white'
                    telPortable.style.borderColor = 'red'
                    document.querySelector('.messageErreurTelPortable').textContent = 'Veuillez indiquer un numéro de téléphone valide'
                    document.querySelector('.messageErreurTelFixe').textContent = ''
                } else {
                    console.log("tel Ok")
                    document.querySelector('.messageErreurTelFixe').textContent = ''
                    document.querySelector('.messageErreurTelPortable').textContent = ''
                    document.querySelector('.messageErreurTel').textContent = ''
                    telFixe.style.borderColor = 'white'
                    telPortable.style.borderColor = 'white'
                }
            }
        }

        //
        // if (telFixe.value.trim === '' || /^\d+$/.test(telFixe.value) === false) {
        //     telFixe.style.borderColor = 'red'
        //     telPortable.style.borderColor = 'red'
        //     document.querySelector('.messageErreurTel').textContent = 'Veuillez indiquer au moins un numéro de téléphone'
        //     test = false
        //     document.querySelector('.messageErreurTelFixe').textContent = 'Veuillez indiquer un numéro de téléphone valide'
        //     document.querySelector('.messageErreurTelPortable').textContent = 'Veuillez indiquer un numéro de téléphone valide'
        // }

        // if ((Number(telPortable.value) && telPortable.value.length == 10 && telFixe.value == '') || Number(telFixe.value) && telFixe.value.length == 10 && telPortable.value == '') {
        //     document.querySelector('.messageErreurTelFixe').textContent = ''
        //     document.querySelector('.messageErreurTelPortable').textContent = ''
        //     document.querySelector('.messageErreurTel').textContent = ''
        //     telFixe.style.borderColor = 'white'
        //     telPortable.style.borderColor = 'white'
        //     test = true

        //     else if ((Number(telPortable.value) && telPortable.value.length == 10) && Number(telFixe.value) && telFixe.value.length == 10) {
        //         document.querySelector('.messageErreurTelFixe').textContent = ''
        //         document.querySelector('.messageErreurTelPortable').textContent = ''
        //         document.querySelector('.messageErreurTel').textContent = ''
        //         telFixe.style.borderColor = 'white'
        //         telPortable.style.borderColor = 'white'
        //         test = true
        //     } else if (isNaN(telFixe.value) || isNaN(telPortable.value)) {
        //         telFixe.style.borderColor = 'red'
        //         telPortable.style.borderColor = 'red'
        //         document.querySelector('.messageErreurTelFixe').textContent = 'Veuillez indiquer un numéro de téléphone valide'
        //         document.querySelector('.messageErreurTelPortable').textContent = 'Veuillez indiquer un numéro de téléphone valide'
        //         test = false
        //     }
        // }

        let email = document.querySelector('#email')
        email.classList.remove('error')
        if (email.value.trim() == '') {
            email.classList.add('error')
            test = false
            document.querySelector('.messageErreurEmail').textContent = 'Veuillez indiquer un email valide'
        } else {
            document.querySelector('.messageErreurEmail').textContent = ''
        }

        if (test) {
            e.target.submit()
        }
    }
)