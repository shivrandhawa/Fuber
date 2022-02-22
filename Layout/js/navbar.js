$("#menu-click").click(function (e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});


function myFunction(x) {
    x.classList.toggle("change");
}
