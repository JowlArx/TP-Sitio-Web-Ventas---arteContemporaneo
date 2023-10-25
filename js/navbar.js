let menu = document.querySelector('#menu-icon');
let navbar = document.querySelector('.navbar');
$(document).ready(function() {
    var url = window.location.href;

    $(".navbar a").each(function() {
        if (url === this.href) {
            $(this).addClass("active");
        }
    });
});


$(document).ready(navbarSelect);
menu.onclick = () => {
    menu.classList.toggle('bx-x');
    navbar.classList.toggle('open');
}

