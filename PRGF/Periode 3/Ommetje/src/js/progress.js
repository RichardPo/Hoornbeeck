var medalInfo = {
    Hiker: {
        title: "De Hiker medaille",
        desc: "Loop dagelijks minimaal 20 minuten. Je krijgt hier per dag 5 XP punten voor. Voor je tweede Ommetje van de dag krijg je 1 extra punt.",
        levels: [4, 15, 35, 55, 75, 100, 200, 300, 400],
        icon: "src/pictures/Hiker.png"
    },
    Reeks: {
        title: "De Reeks medaille",
        desc: "Je reeks bestaat uit het aantal aaneengesloten dagen dat je een Ommetje maakt. Je krijgt hier per dag 3 XP punten voor.",
        levels: [5, 15, 25, 40, 60, 85, 190, 275, 360],
        icon: "src/pictures/Reeks.png"
    },
    Hart: {
        title: "De Hart medaille",
        desc: "Na ieder gelopen Ommetje kun je de campagne delen met je vrienden. Deel je de campagne succesvol via Whatsapp, Facebook, Twitter of LinkedIn dan verdien je 2 XP punten op je Hart medaille. Je krijgt hier per dag maximaal drie keer 2 XP Punten voor.",
        levels: [3, 10, 20, 60, 90, 120, 200, 300, 400],
        icon: "src/pictures/Hart.png"
    },
    VroegeVogel: {
        title: "De Vroege vogel medaille",
        desc: "Start de dag goed en loop je Ommetje voor 9:00 uur 's octhends voor deze medaille. Je krijgt hier per dag 3 XP punten voor.",
        levels: [3, 10, 25, 40, 60, 90, 200, 300, 400],
        icon: "src/pictures/VroegeVogel.png"
    },
    BlijfActief: {
        title: "De Blijf actief medaille",
        desc: "Als Ommetje jouw locatie mag volgen, dan wordt er bijgehouden of je actief hebt gewandeld. Loop in één Ommetje een afstand van minimaal 750 meter. Hiermee verdien je 4 XP per dag voor. Voor de beste werking is het noodzakelijk je Locatie herkenning op Altijd te zetten. Daarmee houden we ook coördinaten bij zodat we een Routekaartje van je Ommetje kunnen laten zien.",
        levels: [3, 10, 25, 40, 70, 100, 225, 325, 425],
        icon: "src/pictures/BlijfActief.png"
    },
    Weetjes: {
        title: "De Weetjes medaille",
        desc: "Na ieder gelopen Ommetje ontvang je een willekeurig Hersenweetje van Erik Schrerder. Net zoals met flippo's, krijg je soms een dubbele. Verzamel ze allemaal om de medaille te behalen. Druk op de knop 'Bekijk jouw weetjes' om te zien welke je al hebt verzameld.<br><div class='popupButton center'><button>Bekijk jouw Weetjes</button></div>",
        levels: [3, 10, 25, 40, 70, 100, 225, 325, 425],
        icon: "src/pictures/Weetjes.png"
    }
}

var popupBackground = document.querySelector(".popupBackground");
var popup = document.querySelector(".medalPopup");

var circles = document.querySelectorAll("circle");

for(var i = 0; i < circles.length; i++) {
    var circle = circles[i];
    var radius = circle.r.baseVal.value;
    var circumference = radius * 2 * Math.PI;
    
    circle.style.strokeDasharray = `${circumference} ${circumference}`;
    circle.style.strokeDashoffset = `${circumference}`;
    setProgress(Math.random() * 100, circle);
}

function setProgress(percent, circle) {
    const offset = circumference - percent / 100 * circumference;
    circle.style.strokeDashoffset = offset;
}

var medals = document.querySelectorAll(".medaille");

for(var j = 0; j < medals.length; j++) {
    var medal = medals[j];
    medal.setAttribute("onclick", "ShowMedalInfo('" + medal.id + "');");
}

function ShowMedalInfo(medalName) {
    popupBackground.classList.remove("hidden");
    popup.classList.remove("hidden");

    var titleElem = popup.querySelector(".popupTitle");
    var descElem = popup.querySelector(".popupText");
    var levelElems = popup.querySelectorAll(".level");
    
    titleElem.innerHTML = medalInfo[medalName]["title"];
    descElem.innerHTML = medalInfo[medalName]["desc"];

    for(var i = 0; i < levelElems.length; i++) {
        var level = levelElems[i];
        level.querySelector("#level-amount").innerHTML = medalInfo[medalName]["levels"][i] + "x";
        level.querySelector("#level-icon").style.backgroundImage = "url(" + medalInfo[medalName]["icon"] + ")";
    }
}

function ClosePopup() {
    popupBackground.classList.add("hidden");
    popup.classList.add("hidden");
}

function StartOmmetje() {
    location.href = "ommetje.php";
}