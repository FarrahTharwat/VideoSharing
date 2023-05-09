function like() {
    var liButton = document.getElementById("li");
    var diButton = document.getElementById("di");

    if (liButton.style.color === "blue") {
        liButton.style.color = "white";
    } else {
        liButton.style.color = "blue";
        diButton.style.color = "white";
    }
}

// dislike button
function dislike() {
    var liButton = document.getElementById("li");
    var diButton = document.getElementById("di");

    if (diButton.style.color === "blue") {
        diButton.style.color = "white";
    } else {
        diButton.style.color = "blue";
        liButton.style.color = "white";
    }
}