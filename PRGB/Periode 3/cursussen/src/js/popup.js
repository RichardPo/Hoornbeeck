function OpenPopup(div) {
    document.querySelector("#" + div).classList.remove("hidden");
}

function ClosePopup(div) {
    document.querySelector("#" + div).classList.add("hidden");
}