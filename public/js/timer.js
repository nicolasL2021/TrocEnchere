//timer
function updateTimer() {
    let future = Date.parse("jul 20, 2024 12:00:00");
    let now = new Date();
    let diff = future - now;

    let days = Math.floor(diff / (1000 * 60 * 60 * 24));
    let hours = Math.floor(diff / (1000 * 60 * 60));
    let mins = Math.floor(diff / (1000 * 60));
    let secs = Math.floor(diff / 1000);

    let d = days;
    let h = hours - days * 24;
    let m = mins - hours * 60;
    let s = secs - mins * 60;

    document.getElementById("timer")
        .innerHTML =
        '<div>' + d + '<span>Jours</span></div>' +
        '<div>' + h + '<span>Heures</span></div>' +
        '<div>' + m + '<span>Minutes</span></div>' +
        '<div>' + s + '<span>Secondes</span></div>';
}
setInterval('updateTimer()', 1000);