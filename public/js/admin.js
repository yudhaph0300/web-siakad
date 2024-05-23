document.addEventListener("DOMContentLoaded", function () {
    var sidebar = document.getElementById("sidebar");
    var btnHamburger = document.getElementById("btn-hamburger");

    btnHamburger.addEventListener("click", function () {
        sidebar.classList.toggle("sidebar-active");
    });
});
