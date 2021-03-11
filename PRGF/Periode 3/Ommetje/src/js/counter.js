var seconds = 0;

var timeElem = document.querySelector("#time-counter");

function Count() {
    seconds++;
    var time = new Date(seconds * 1000).toISOString().substr(11, 8);
    var timeString = time.substring(3, time.length);
    timeElem.innerHTML = timeString + " ";
}

var interv = setInterval(Count, 1000);

function StopOmmetje() {
    clearInterval(interv);
    location.href = "index.php";
}