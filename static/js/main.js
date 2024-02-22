function showLoadingAnimation() {
    var loadAnimation = document.getElementById('Loadanimation');
    loadAnimation.style.display = 'block';
}
function fadeOutLoadingAnimation(loadAnimation) {
    setTimeout(function() {
        var opacity = 1; // Độ mờ
        var interval = 50; // Tần suất cập nhật (mili giây)
        var fadeOutSpeed = 0.06; // tốc độ mờ dần

        var fadeOutInterval = setInterval(function() {
            opacity -= fadeOutSpeed;
            loadAnimation.style.opacity = opacity;

            if (opacity <= 0) {
                loadAnimation.style.display = 'none';
                clearInterval(fadeOutInterval);
            }
        }, interval);
    }, 0);
}
function hideLoadingAnimation() {
    var loadAnimation = document.getElementById('Loadanimation');
    fadeOutLoadingAnimation(loadAnimation);
}
showLoadingAnimation();
MusicLoad();
// hideLoadingAnimation();
! function() {
    var e = window.requestAnimationFrame || window.mozRequestAnimationFrame || window
        .webkitRequestAnimationFrame || window.msRequestAnimationFrame || function(e) {
            window.setTimeout(e, 1e3 / 60)
        };
    window.requestAnimationFrame = e
}(),
function() {
    var e = [],
        t = document.getElementById("Snow"),
        i = t.getContext("2d"),
        n = -100,
        o = -100;

    function r(e) {
        e.x = Math.floor(Math.random() * t.width), e.y = 0, e.size = 3 * Math.random() + 2, e.speed = 1 * Math
            .random() + .5, e.velY = e.speed, e.velX = 0, e.opacity = .5 * Math.random() + .3
    }
    t.width = window.innerWidth, t.height = window.innerHeight, document.addEventListener("mousemove", function(
            e) {
            n = e.clientX, o = e.clientY
        }), window.addEventListener("resize", function() {
            t.width = window.innerWidth, t.height = window.innerHeight
        }),
        function a() {
            for (var $ = 0; $ < 200; $++) {
                var d = Math.floor(Math.random() * t.width),
                    s = Math.floor(Math.random() * t.height),
                    l = 3 * Math.random() + 2,
                    m = 1 * Math.random() + .5,
                    h = .5 * Math.random() + .3;
                e.push({
                    speed: m,
                    velY: m,
                    velX: 0,
                    x: d,
                    y: s,
                    size: l,
                    stepSize: Math.random() / 30 * 1,
                    step: 0,
                    angle: 180,
                    opacity: h
                })
            }! function a() {
                i.clearRect(0, 0, t.width, t.height);
                for (var $ = 0; $ < 200; $++) {
                    var d = e[$],
                        s = n,
                        l = o,
                        m = d.x,
                        h = d.y,
                        v = Math.sqrt((m - s) * (m - s) + (h - l) * (h - l));
                    if (v < 150) {
                        var c = 150 / (v * v),
                            f = (s - m) / v,
                            u = (l - h) / v,
                            p = c / 2;
                        d.velX -= p * f, d.velY -= p * u
                    } else d.velX *= .98, d.velY <= d.speed && (d.velY = d.speed), d.velX += Math.cos(d.step +=
                        .05) * d.stepSize;
                    i.fillStyle = "rgba(255,255,255," + d.opacity + ")", d.y += d.velY, d.x += d.velX, (d.y >= t
                            .height || d.y <= 0) && r(d), (d.x >= t.width || d.x <= 0) && r(d), i.beginPath(), i
                        .arc(d.x, d.y, d.size, 0, 2 * Math.PI), i.fill()
                }
                requestAnimationFrame(a)
            }()
        }()
}();