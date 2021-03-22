var medals = ["Hiker", "Reeks", "Hart", "VroegeVogel", "BlijfActief", "Weetjes"];

var leaderboard = [
    {
        name: "Gert2003",
        xp: 663,
        medals: [0,1,2,3,4,5]
    },
    {
        name: "avdgalien",
        xp: 448,
        medals: [0,1,2,3,4,5]
    },
    {
        name: "Daan_vO",
        xp: 440,
        medals: [0,1,2,3,4,5]
    },
    {
        name: "MatthiasB",
        xp: 149,
        medals: [0,2,4,5]
    },
    {
        name: "BsIM",
        xp: 134,
        medals: [0,1,4,5]
    },
    {
        name: "Karel306",
        xp: 131,
        medals: [0,1,2,3,4,5]
    },
    {
        name: "Mark v/d Graaf",
        xp: 115,
        medals: [0,3,4,5]
    },
    {
        name: "RichardPost",
        xp: 104,
        medals: [0,4,5]
    },
    {
        name: "Gerben2004",
        xp: 49,
        medals: [0,3,5]
    },
    {
        name: "D h",
        xp: 40,
        medals: [0,5]
    },
    {
        name: "Daan vH",
        xp: 24,
        medals: []
    }
];

var ul = document.querySelector("ul");
var lis = ul.querySelectorAll("li");

var leaderboardMain = document.querySelector(".leaderboard-main-main");

for(var i = 0; i < lis.length; i++) {
    lis[i].innerHTML = leaderboard[i]["name"];
}   

for(var i = 0; i < leaderboard.length; i++) {
    var number = i + 1;

    leaderboardMain.innerHTML += `
        <div class="person">
            <div class="center leaderboard-main-main-number">#` + number + `</div>
            <div class="center leaderboard-main-main-name center">` + leaderboard[i]["name"] + `<br>` + leaderboard[i]["xp"] + ` XP</div>
            <div class="center leaderboard-main-main-medals center">
                <div class="earned-medals">
                    <div class="earned-medal">
                        <div class="earned-medal">
                            <div class="earned-medal">
                                <div class="earned-medal">
                                    <div class="earned-medal">
                                        <div class="earned-medal"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    `;

    var persons = leaderboardMain.querySelectorAll(".person");
    var person = persons[persons.length - 1];
    var earnedMedals = person.querySelectorAll(".earned-medal");
    for(var j = 0; j < leaderboard[i]["medals"].length; j++) {
        earnedMedals[j].style.backgroundImage = "url('" + medalInfo[medals[leaderboard[i]["medals"][j]]]["icon"] + "')";
    }
}