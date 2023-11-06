document.getElementById("btn_login").addEventListener("click", iniciarSesion);
document.getElementById("btn_register").addEventListener("click", register);
window.addEventListener("resize", anchoPage);

//Variables
var login_form = document.querySelector(".login_form");
var register_form = document.querySelector(".register_form");
var login_register_container = document.querySelector(".login_register_container");
var backbox_login = document.querySelector(".login_back_box");
var backbox_register = document.querySelector(".register_back_box");

function anchoPage(){

    if (window.innerWidth > 850){
        backbox_register.style.display = "block";
        backbox_login.style.display = "block";
    }else{
        backbox_register.style.display = "block";
        backbox_register.style.opacity = "1";
        backbox_login.style.display = "none";
        login_form.style.display = "block";
        login_register_container.style.left = "0px";
        register_form.style.display = "none";   
    }
}

anchoPage();

function iniciarSesion(){
    if (window.innerWidth > 850){
        login_form.style.display = "block";
        login_register_container.style.left = "10px";
        register_form.style.display = "none";
        backbox_register.style.opacity = "1";
        backbox_login.style.opacity = "0";
    }else{
        login_form.style.display = "block";
        login_register_container.style.left = "0px";
        register_form.style.display = "none";
        backbox_register.style.display = "block";
        backbox_login.style.display = "none";
    }
}
function register(){
    if (window.innerWidth > 850){
        register_form.style.dysplay = "block";
        login_register_container.style.left = "410px";
        login_form.style.display = "none";
        backbox_register.style.opacity = "0";
        backbox_login.style.opacity = "1";
    }else{
        register_form.style.display = "block";
        login_register_container.style.left = "0px";
        login_form.style.display = "none";
        backbox_register.style.display = "none";
        backbox_login.style.display = "block";
        backbox_login.style.opacity = "1";
    }
}