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

for(var i = 0; i < lis.length; i++) {
    lis[i].innerHTML = leaderboard[i]["name"];
}   