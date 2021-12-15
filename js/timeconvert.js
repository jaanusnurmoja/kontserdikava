function timeToSec(timestr) {
    var parts = timestr.split(":");
    return (parts[0] * 3600) +
            (parts[1] * 60) +
            (+parts[2]);
}

function pad(num) {
    if(num < 10) {
        return "0" + num;
    } else {
        return "" + num;
    }
}

function secToTime(seconds) {
    return [pad(Math.floor(seconds/3600)),
            pad(Math.floor(seconds/60)%60),
            pad(seconds%60),
            ].join(":");
}