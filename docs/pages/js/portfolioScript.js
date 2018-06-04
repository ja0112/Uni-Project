function responseNav() {
    var x = document.getElementById("navigation");
    if (x.className === "navfoot") {
        x.className += "navfootResponsive";
    } else {
        x.className = "navfoot";
    }
}
