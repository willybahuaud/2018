// Servira peut être plus tard
var getFinalData = function (canvas, w, h) {
    var i = canvas.length,
        tempCanvas = document.createElement("canvas"),
        ctv = tempCanvas.getContext("2d");
    tempCanvas.width = w;
    tempCanvas.height = h;
    while (i--) {
        ctv.drawImage(canvas[i], 0, 0, w, h);
    };
    return tempCanvas.toDataURL();
};

function getRandomStripes() {
    var res = [0];
    for (var i = 0, ite = Math.round(Math.random() * 10 + 5); i < ite; i++) {
        res.push(Math.random());
    }
    res.push(1);
    return res.sort();
}

function applyImageEffect(img) {
    var img_b64,
        data_b64;

    var m = 20; // marge

    // 3 : ok je pige
    var get_img_b64 = function (newimg) {
        var w = newimg.naturalWidth,
            h = newimg.naturalHeight;
        //1st
        var can = document.createElement('canvas');
        can.width = w + m;
        can.height = h;
        var ctx = can.getContext("2d");
        ctx.drawImage(newimg, m / 2, 0, w, h);

        //2nd ROUGE
        var canR = document.createElement('canvas');
        canR.width = w + m;
        canR.height = h;
        var ctxR = canR.getContext("2d");
        var stripes = getRandomStripes();
        stripes.forEach(function (stripe, i) {
            if (Math.random() < .5) {
                return;
            }
            var sy = stripe * h,
                sh = stripes[i + 1] * h - sy;
            ctxR.drawImage(newimg,
                0, //x orig
                sy, //y orig
                w, // width
                sh, // height orig
                (Math.random() * m),
                sy,  //y target
                w, // width
                sh
            );
        });

        //3rd BLEU / VERT
        var canB = document.createElement('canvas');
        canB.width = w + m;
        canB.height = h;
        var ctxB = canB.getContext("2d");
        var stripes = getRandomStripes();
        stripes.forEach(function (stripe, i) {
            if (Math.random() < .5) {
                return;
            }
            var sy = stripe * h,
                sh = stripes[i + 1] * h - sy;
            ctxB.drawImage(newimg,
                0, //x orig
                sy, //y orig
                w, // width orig
                sh, // height orig
                (Math.random() * m),
                sy,  //y target
                w, // width
                sh
            );
        });
        var imageDataOrig = ctx.getImageData(0, 0, w + m, h);
        var imageDataR = ctxR.getImageData(0, 0, w + m, h);
        var imageDataB = ctxB.getImageData(0, 0, w + m, h);
        var pixelsR = imageDataR.data;
        var pixelsB = imageDataB.data;
        var numPixels = imageDataOrig.width * imageDataOrig.height;
        for (var i = 0; i < numPixels; i++) {
            if (pixelsR[i * 4] > 60) { // rouge
                imageDataOrig.data[i * 4] += (pixelsR[i * 4] / 2);
                imageDataOrig.data[i * 4 + 3] = 255;
            }
            if (pixelsB[i * 4 + 2] > 80) { // bleu
                imageDataOrig.data[i * 4 + 2] += (pixelsB[i * 4 + 2] / 2);
                imageDataOrig.data[i * 4 + 3] = 255;
            }
        };
        ctx.clearRect(0, 0, w, h);
        ctx.putImageData(imageDataOrig, 0, 0);
        ctx.oldImage = imageDataOrig;
        

        return can;
        // return can.toDataURL('image/png', 1.0);
    }

    img.crossOrigin = "anonymous";
    // data_b64 = get_img_b64(img);
    var canvas = get_img_b64(img);
    if ( canvas.classList ) {
        canvas.classList.add('glitched');
        canvas.classList.add('portrait');
    } else {
        canvas.className += ' glitched portrait';
    }
    // canvas.width = canvas.naturalWidth +m;
    img.parentNode.replaceChild(canvas,img);
    // img.src = data_b64;
    // img.classList ? img.classList.add('glitched') : img.className += ' glitched';
}
function glitch() {
    var imgs = document.querySelectorAll('.to-glitch');
    imagesLoaded(imgs, function() {
        imgs.forEach(function (el) {
            applyImageEffect(el);
        });
    });
}

function applyCanvasDecale(c) {
    var cx = c.getContext('2d');
    var s = getRandomStripes();
    cx.clearRect(0, 0, c.width, c.height);
    cx.putImageData(cx.oldImage,0,0);
    s.forEach(function (stripe, i) {
        if (Math.random() > .005) {
            return;
        }
        var sy = stripe * c.height,
            sh = s[i + 1] * c.height - sy;
        cx.drawImage(c,
            0, //x orig
            sy, //y orig
            c.width, // width orig
            sh, // height orig
            (Math.random() * 20 - 10),
            sy,  //y target
            c.width, // width
            sh
        );
    });
}

function decale() {
    var c = document.querySelectorAll('.glitched');
    c.forEach(function (el) {
        applyCanvasDecale(el);
    });
}

function repeatGlitchImage() {
    decale();
    requestAnimationFrame(repeatGlitchImage);
}
requestAnimationFrame(repeatGlitchImage);
