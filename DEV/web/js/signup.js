var passwordInput = document.querySelector("#password");
var passwordRepeatInput = document.querySelector("#password-repeat");
var signUpBtn = document.querySelector(".submitBtnSignup");
var showpw = document.querySelector(".showpw");
var showpwVisible = false;


showpw.addEventListener('click', function(){
    if(showpwVisible){
        showpwVisible = false;
        passwordInput.type = "password";
        showpw.style.backgroundImage = "url('../images/visibility.svg')";

    }else if(!showpwVisible){
        showpwVisible = true;
        passwordInput.type = "text";
        showpw.style.backgroundImage = "url('../images/visibility_off.svg')";
    }
});


showpw.addEventListener("mousedown", function(){
    showpw.style.backgroundColor = "#a529254d";
    showpw.style.boxShadow = "0px 0px 1px 3px rgba(165, 41, 37, 0.3)";
});

showpw.addEventListener("mouseup", function(){
    showpw.style.boxShadow = "none";
    showpw.style.backgroundColor = "transparent";
});
