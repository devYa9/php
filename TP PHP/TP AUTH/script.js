
// Afficher et masquer password
var affBtn = document.getElementById('affBtn');
var passInp = document.getElementById("password");
affBtn.addEventListener("click", function() {
    affBtn.innerText == "afficher" ? affBtn.innerText = "masquer" : affBtn.innerText = "afficher"; 
    passInp.getAttribute("type") == "password" ? passInp.setAttribute("type", "text") : passInp.setAttribute("type", "password");
})




// Desactiver submit button si les inputs est invalides
var btnSubmit =  document.getElementById("submit")

function check(){
    test = validateEmail() && validateUserName()
    btnClasses = btnSubmit.classList;
    if(test){
        btnSubmit.disabled = false;
        btnClasses.contains("disabled") ? btnClasses.toggle("disabled"):'';
    } else {
        btnSubmit.disabled = true;
        btnClasses.contains("disabled") ? '':btnClasses.toggle("disabled");
    }
}

// check Email input si valide
function validateEmail() {
    var email = document.getElementById('email').value
    let regexEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (email.match(regexEmail)) {
        return true;
    } else {
        return false;
    }
}

// check Username input si valide
function validateUserName(){
    var username = document.getElementById("username").value
    var usernameRegex = /^[a-zA-Z0-9]+$/;
    return usernameRegex.test(username);
}

var emailInput = document.getElementById("email");
var userInput = document.getElementById("username");

emailInput.addEventListener("blur", function(){
    var test = validateEmail()
    check(); // Chaque fois faire une check pour reactiver le button
    if(test){
        emailInput.classList.value = "";
        document.getElementById("errorEmail").innerText = ""
        console.log("email valid !")
    } else {
        emailInput.classList.value = "notValid";
        document.getElementById("errorEmail").innerText = "Email  invalide"
        console.log("email not valid !")
    }
})

userInput.addEventListener("blur", function(){
    var test = validateUserName();
    check(); // Chaque fois faire une check pour reactiver le button
    if(test){
        userInput.classList.value = "";
        document.getElementById("errorUser").innerText = ""
        console.log("username valid !")
    } else {
        userInput.classList.value = "notValid";
        document.getElementById("errorUser").innerText = "Username  invalide"
        console.log("username not valid !")
    }
})
