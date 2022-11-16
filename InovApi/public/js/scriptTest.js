const ecrans = document.getElementsByClassName('ecran');
const inputReponses = document.getElementsByClassName('inputReponse');
const boutonSuivant = document.getElementsByClassName('boutonSuivant');
const nombreMot = document.getElementById('nombreDeMots');
const idListe = document.getElementById('id').getAttribute('data-liste-id');
var startBouton = document.getElementById('startButton');
const nbScore = document.getElementById('nbScore');
const idUser = document.getElementById('id').getAttribute('data-user-id');
const idTest = document.getElementById('id').getAttribute('data-test-id');
var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0');
var yyyy = today.getFullYear();
today = yyyy + "-" + mm + "-" + dd;
console.log(today);
var index = 0;
var ecranVisible = ecrans[index];
const longueurListeMot = ecrans.length - 2;
var listeDeMot = [];
var listeReponse = [];
var listeFausseReponse = [];
var score = 0;
var urlSite = 'http://s3-4440.nuage-peda.fr/Inno-v-Anglais/InovApi/public/api/';
// lien vps : https://tanguy.ozano.ovh/Inno-v-Anglais/public/api/

nombreMot.innerHTML = longueurListeMot;
cacheAllEcran();
showEcranVisible();
ajouteEventListener();
recupToken();

startBouton.addEventListener('click', incrementIndex);

function envoieResultat() {
    console.log('value');
    console.log(idTest);
    console.log(idUser);
    console.log(today);
    console.log(score);
    var request = $.ajax({
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/ld+json',
            'Authorization': 'Bearer ' + localStorage.getItem('token')
        },
        url: urlSite + "resultats",
        //        url: "http://s3-4435.nuage-peda.fr/Inno-v-Anglais/InovApi/public/api/resultats",
        method: "POST",
        data: JSON.stringify({
            score: score,
            date: today,
            utilisateur: "/Inno-v-Anglais/InovApi/public/api/users/" + idUser,
            test: "/Inno-v-Anglais/InovApi/public/api/tests/" + idTest


        }),
        beforeSend: function(xhr) {
            xhr.overrideMimeType("application/json; charset=utf-8");
        }
    });
    request.done(function(msg, textStatus, jqXHR) {
        console.log('envoie avec succès');
    });
    // Fonction qui se lance lorsque l’accès au web service provoque une erreur
    request.fail(function(jqXHR, textStatus) {
        console.log('erreur')
        console.log(textStatus);
    });

}
//Récupére par la liste de mot par rapport à l'API
function recupListeMotAnglais() {
    var request = $.ajax({
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + localStorage.getItem('token')
        },
        url: urlSite + "listes/" + idListe,
        method: "GET",
        data: JSON.stringify([]),
        dataType: "json",
        beforeSend: function(xhr) {
            xhr.overrideMimeType("application/json; charset=utf-8");
        }
    });
    request.done(function(msg) {
        console.log(msg);
        for (mot of msg.mots) {
            console.log(mot.motAnglais);
            listeReponse.push(mot.motFrancais);
        }
    })
    request.fail(function(msg) {
        console.log('erreur api');
    })
}

//Lorsque le test est fini, 
//On compare les deux liste et on calcul la note
function calulNote() {
    score = 0;
    for (let i = 0; i < listeDeMot.length; i++) {
        if (listeReponse.includes(listeDeMot[i])) {
            score++;
        } else {
            listeFausseReponse.push(listeDeMot[i]);
        }
    }
    nbScore.innerHTML = score;
    console.log(listeFausseReponse);
}

//Evite les erreurs de case
function passerToutLesMotsEnMinuscule(tableau) {
    for (let i = 0; i < tableau.length; i++) {
        tableau[i] = tableau[i].toLowerCase();
    }
}

//Récupération du token avec
//Les identifiants dans le localStorage
function recupToken() {
    var request = $.ajax({
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        },
        url: urlSite + "authentication_token",
        method: "POST",
        data: JSON.stringify({
            username: localStorage.getItem('username'),
            password: localStorage.getItem('password'),

        }),
        dataType: "json",
        beforeSend: function(xhr) {
            xhr.overrideMimeType("application/json; charset=utf-8");
        }
    });

    request.done(function(msg) {
        localStorage.setItem('token', msg.token);
        recupListeMotAnglais();
    });
    request.fail(function(jqXHR, textStatus, error) {
        console.log(error);
    });


}

function recupAllMot() {
    for (input of inputReponses) {
        listeDeMot.push(input.value);
    }
    passerToutLesMotsEnMinuscule(listeReponse);
    passerToutLesMotsEnMinuscule(listeDeMot);
    console.log(listeDeMot);
    console.log(listeReponse);
}
//Cache tout les écrans
function cacheAllEcran() {
    for (ecran of ecrans) {
        ecran.style.display = 'none';
    }
}

//Montre l'écran qui est stocké dans la variable ecran visibile
function showEcranVisible() {
    cacheAllEcran();
    ecranVisible.style.display = 'block';
}

//Récupération des données avec l'API

function ajouteEventListener() {
    $('.inputReponse').on("change keyup paste", checkIfEcranValide)
    for (inputResponse of inputReponses) {
        inputResponse.addEventListener('change', checkIfEcranValide);

    }
    for (bouton of boutonSuivant) {
        bouton.addEventListener('click', incrementIndex)
    }

}

function checkIfEcranValide() {
    console.log('changement de valeur');
    console.log(this.value);
    if (this.value != "") {
        console.log('ecranok');
        boutonSuivant[index - 1].disabled = false;
    } else {
        console.log('ecran not ok ! ');
        boutonSuivant[index - 1].disabled = true;
    }
}

function incrementIndex() {
    if (index < longueurListeMot + 1) {
        index++;
        ecranVisible = ecrans[index];
        showEcranVisible();
    }
    if (index == longueurListeMot + 1) {
        recupAllMot();
        calulNote();
        envoieResultat();
    }
}