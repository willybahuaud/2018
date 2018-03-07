// Request animation frame Polyfill
(function () {
    var lastTime = 0;
    var vendors = ['webkit', 'moz'];
    for (var x = 0; x < vendors.length && !window.requestAnimationFrame; ++x) {
        window.requestAnimationFrame = window[vendors[x] + 'RequestAnimationFrame'];
        window.cancelAnimationFrame =
            window[vendors[x] + 'CancelAnimationFrame'] || window[vendors[x] + 'CancelRequestAnimationFrame'];
    }

    if (!window.requestAnimationFrame)
        window.requestAnimationFrame = function (callback, element) {
            var currTime = new Date().getTime();
            var timeToCall = Math.max(0, 16 - (currTime - lastTime));
            var id = window.setTimeout(function () { callback(currTime + timeToCall); },
                timeToCall);
            lastTime = currTime + timeToCall;
            return id;
        };

    if (!window.cancelAnimationFrame)
        window.cancelAnimationFrame = function (id) {
            clearTimeout(id);
        };
}());

var parts = [
    // cubes et lignes
    [[0, 0], [30, 0], [30, 30], [0, 30]],
    [[0, 0], [30, 0], [30, 30], [0, 30]],
    [[0, 0], [30, 0], [30, 30], [0, 30]],
    [[0, 0], [30, 0], [30, 30], [0, 30]],
    [[0, 0], [30, 0], [30, 30], [0, 30]],
    [[0, 0], [30, 0], [30, 30], [0, 30]],
    [[0, 0], [30, 0], [30, 30], [0, 30]],
    [[0, 0], [30, 0], [30, 30], [0, 30]],
    [[0, 0], [30, 0], [30, 30], [0, 30]],
    [[0, 0], [30, 0], [30, 30], [0, 30]],
    [[0, 0], [30, 0], [30, 30], [60, 30], [60, 60], [30, 60], [30, 30], [0, 30]],
    [[0, 0], [30, 0], [30, 30], [60, 30], [60, 60], [30, 60], [30, 30], [0, 30]],
    [[0, 0], [80, 0], [80, 6], [0, 6]],
    [[0, 0], [80, 0], [80, 6], [0, 6]],
    [[0, 0], [80, 0], [80, 6], [0, 6]],
    [[0, 0], [150, 0], [150, 5], [0, 5]],
    [[0, 0], [150, 0], [150, 5], [0, 5]],
    [[0, 0], [250, 0], [250, 5], [0, 5]],
    [[0, 0], [250, 0], [250, 5], [0, 5]],
    [[0, 0], [200, 0], [200, 3], [0, 3]],
    [[0, 0], [200, 0], [200, 3], [0, 3]],
    [[0, 0], [200, 0], [200, 3], [0, 3]],
    [[0, 0], [400, 0], [400, 1], [0, 1]],
    [[0, 0], [400, 0], [400, 1], [0, 1]],
    [[30, 0], [60, 0], [60, 30], [30, 30], [30, 60], [0, 60], [0, 30], [30, 30]],
    [[30, 0], [60, 0], [60, 30], [30, 30], [30, 60], [0, 60], [0, 30], [30, 30]],
    // Motifs
    [[0, 0], [80, 0], [80, 15], [160, 15], [160, 0], [550, 0],
    [550, 24], [420, 24], [420, 50], [395, 50], [395, 15],
    [320, 15], [320, 50], [12, 50], [12, 35], [0, 35]],
    [[0, 0], [390, 0], [390, 15], [470, 15], [470, 0], [550, 0],
    [550, 35], [538, 35], [538, 50], [230, 50], [230, 15],
    [155, 15], [155, 50], [130, 50], [130, 24], [0, 24]],
    // Parallèlogrammes pètés
    [[0, 0], [400, 0], [460, 90], [410, 90], [470, 180], [520, 180],
    [600, 300], [280, 300], [213.3, 200], [133.3, 200], [40, 60], [100, 60], [93.3, 50], [33.3, 50]],
    [[200, 0], [600, 0], [546.7, 80], [506.7, 80], [453.4, 160], [493.4, 160],
    [400, 300], [0, 300], [26.7, 260], [76.7, 260], [190, 90], [140, 90]],
];

var bg = document.createElement('canvas');
bg.id = 'background';
bg.width = window.innerWidth;
bg.height = window.innerHeight;
var bgx = bg.getContext("2d");

function getRandomDuration() {
    return Math.round(Math.random() * 80);
}

// Get 20 random paths
var elems = [];
for (var i = 0; i < 30; i++) {
    elems.push({
        origX: Math.random(),
        origY: Math.random(),
        motif: parts[Math.round(Math.random() * (parts.length - 1))],
        duration: getRandomDuration(),
        opacity: Math.random() * .5 + .5,
        old: false,
    });
}

// Draw paths
function draw() {

    bgx.clearRect(0, 0, bg.width, bg.height);
    elems.forEach(function (part, i) {
        if (elems[i].duration-- < 0) {
            if (elems[i].old) {
                elems[i] = elems[i].old;
            } else {
                elems[i] = {
                    origX: Math.random(),
                    origY: Math.random(),
                    motif: parts[Math.round(Math.random() * (parts.length - 1))],
                    opacity: Math.random() * .5 + .5,
                    duration: getRandomDuration(),
                };
            }
            part = elems[i];
        }
        if (Math.random() < .001) {
            elems[i] = {
                origX: Math.random(),
                origY: Math.random(),
                motif: parts[Math.round(Math.random() * (parts.length - 1))],
                duration: Math.random() * 10,
                opacity: Math.random() * .5 + .5,
                old: part,
            };
            part = elems[i];
        }
        var randX = part.origX * bg.width - 100,
            randY = part.origY * bg.height;
        bgx.beginPath();
        bgx.moveTo(part.motif[0][0] + randX, part.motif[0][1] + randY);
        part.motif.forEach(function (c) {
            bgx.lineTo(c[0] + randX, c[1] + randY);
        });
        bgx.fillStyle = "rgba(15,25,35," + part.opacity + ")";
        bgx.fill();
    });
}
draw();

document.body.appendChild(bg);

var req;
function repeatOften() {
    draw();
    req = requestAnimationFrame(repeatOften);
}
req = requestAnimationFrame(repeatOften);

if ( document.getElementsByClassName( 'no-move' ).length > 0 ) {
    cancelAnimationFrame(req);
}

function resizeBackground() {
    if ( typeof bg != 'undefined' ) {
        bg.width = window.innerWidth;
        bg.height = window.innerHeight;
        elems = [];
        for (var i = 0; i < 30; i++) {
            elems.push({
                origX: Math.random(),
                origY: Math.random(),
                motif: parts[Math.round(Math.random() * (parts.length - 1))],
                duration: getRandomDuration(),
                opacity: Math.random() * .5 + .5,
                old: false,
            });
        }
    }
}

window.onresize = resizeBackground;