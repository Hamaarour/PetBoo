const imgDiv = document.querySelector('.profile-pic-div');
const img = document.querySelector('#photo');
const file = document.querySelector('#file');
const uploadBtn = document.querySelector('#uploadBtn');


imgDiv.addEventListener('mouseenter', function () {
    uploadBtn.style.display = "block";
});


imgDiv.addEventListener('mouseleave', function () {
    uploadBtn.style.display = "none";
});


file.addEventListener('change', function () {
    const choosedFile = this.files[0];

    if (choosedFile) {

        const reader = new FileReader();

        reader.addEventListener('load', function () {
            img.setAttribute('src', reader.result);
        });

        reader.readAsDataURL(choosedFile);
    }
});

// validation des champs

////////////////// Mot de passe //////////////////

// inputs
mdp_acct = document.getElementById('pass-acctuel');
nv_mdp = document.getElementById('new_pass');
con_mdp = document.getElementById('confirm_pass');

// messages d'erreur
var er1 = document.querySelector('.erreur1');
var er2 = document.querySelector('.erreur2');
var er3 = document.querySelector('.erreur3');
var erleng = document.querySelector('.erreur_leng');
var erleng1 = document.querySelector('.erreur_leng_1');

// buttons
mdp = document.querySelector('.save-mdp');
cancel_mdp = document.querySelector('.cancel-mdp');

mdp_acct.addEventListener("input", function () {
    if (mdp_acct.value.length == 0)
        erleng1.style.display = "none";
    else if (mdp_acct.value.length < 8)
        erleng1.style.display = "flex";
    else if (mdp_acct.value.length > 8)
        erleng1.style.display = "none";
});

nv_mdp.addEventListener("input", function () {
    if (nv_mdp.value.length == 0)
        erleng.style.display = "none";
    else if (nv_mdp.value.length < 8)
        erleng.style.display = "flex";
    else if (nv_mdp.value.length > 8)
        erleng.style.display = "none";
});

con_mdp.addEventListener("input", function () {
    if (con_mdp.value.length == 0)
        er3.style.display = "none";
    else if (nv_mdp.value.length == 0)
        er2.style.display = "flex";
    else if (nv_mdp.value != con_mdp.value)
        er3.style.display = "flex";
    else if (nv_mdp.value == con_mdp.value)
        er3.style.display = "none";
});

mdp.disabled = true;
mdp.style.backgroundColor = "#999999";

function isCharSet() {
    if (mdp_acct.value != "" && nv_mdp.value != "" && con_mdp.value != "" && nv_mdp.value == con_mdp.value && nv_mdp.value.length > 8 && mdp_acct.value.length > 8) {
        mdp.disabled = false;
        mdp.style.backgroundColor = "#212121";
    }
    else {
        mdp.disabled = true;
        mdp.style.backgroundColor = "#999999";
    }
}

cancel_mdp.addEventListener('click', () => {
    mdp_acct.value = "";
    nv_mdp.value = "";
    con_mdp.value = "";
    er1.style.display = "none";
    er2.style.display = "none";
    er3.style.display = "none";
    erleng.style.display = "none";
    erleng1.style.display = "none";
})

////////////////// informations d'utilisateur //////////////////

// inputs
prenom = document.getElementById('prenom');
telephone = document.getElementById('tele');
user_name = document.getElementById('nomutili');
email = document.getElementById('mail');

// buttons
info = document.querySelector('.save-info');
cancel_info = document.querySelector('.cancel-info');

// messages erreur
var err1 = document.querySelector('.err1');
var err2 = document.querySelector('.err2');
var err3 = document.querySelector('.err3');
var err4 = document.querySelector('.err4');

info.disabled = true;
info.style.backgroundColor = "#999999";

telephone.addEventListener("input", function () {
    if (telephone.value.trim().length == 0 || telephone.value.length > 15) {
        err2.style.display = "flex";
    }
    else if (telephone.value.length = 10) {
        err2.style.display = "none";
        info.disabled = false;
        info.style.backgroundColor = "#212121";
    }
});

user_name.addEventListener("input", function () {
    if (user_name.value.trim().length == 0) {
        err3.style.display = "flex";
    }
    else if (user_name.value.length > 0) {
        err3.style.display = "none";
        info.disabled = false;
        info.style.backgroundColor = "#212121";
    }
});

mdp_acct = document.getElementById('pass-acctuel');
nv_mdp = document.getElementById('new_pass');
con_mdp = document.getElementById('confirm_pass');

function validation() {
    alert("hello");
    if (nv_mdp.value == "" || con_mdpvalue == "" || nv_mdp.value != con_mdp.value) {
        alert("error");
        return false;
    }
    else {
        alert("it's ok");
        return true;
    }
}