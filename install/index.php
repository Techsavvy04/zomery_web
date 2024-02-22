<?php
include '../key.php';
if (file_exists('../install.lock') && strpos(file_get_contents('../install.lock'), 'thanhdieulove=true') !== false) header('Location: ../');
$web_mulu = dirname($_SERVER[ 'SCRIPT_FILENAME' ] , 2);
$php_bb   = phpversion();
$mysql_bb = function_exists('mysqli_connect') ? "Hỗ trợ" : "Không hỗ trợ";

$web_url   = dirname(( ( $_SERVER[ 'SERVER_PORT' ] == 443 ) ? 'https' : 'http' ) . '://' . $_SERVER[ 'HTTP_HOST' ] . str_replace($_SERVER[ 'DOCUMENT_ROOT' ] , ( substr($_SERVER[ 'DOCUMENT_ROOT' ] , -1) == '/' ) ? '/' : '' , dirname($_SERVER[ 'SCRIPT_FILENAME' ])));
$error_msg = '';
$a         = isset($_GET[ 'a' ]) ? intval($_GET[ 'a' ]) : 0;
$submit    = isset($_POST[ 'install' ]) ? addslashes($_POST[ 'install' ]) : '';
if ($a == 1 && $submit) {
    $error = [
        '__ThanhDieuDbServer' => 'Vui lòng nhập địa chỉ cơ sở dữ liệu' ,
        '__ThanhDieuDbUser'   => 'Vui lòng nhập tài khoản cơ sở dữ liệu' ,
        '__ThanhDieuDbName'   => 'Vui lòng nhập tên cơ sở dữ liệu' ,
    ];
    foreach ($error as $key => $val) {
        if ( !array_isset($_POST , $key)) {
            $error_msg = $val;
            break;
        }
    }
    if (!$error_msg) {
        $thanhdieudb = @mysqli_connect($_POST['__ThanhDieuDbServer'], $_POST['__ThanhDieuDbUser'], $_POST['__ThanhDieuDbPwd']);
        if ($thanhdieudb) {
            mysqli_query($thanhdieudb, "set names utf8");
          /* $sql = NULL;
            require_once 'config.sql.php';
            foreach ($sql as $value) {
                mysqli_query($thanhdieudb , $value);
            }*/
            if (@mysqli_select_db($thanhdieudb, $_POST['__ThanhDieuDbName'])) {
                $sqlbackup = 'loveday.sql';
                $sql = file_get_contents($sqlbackup);
                if ($sql !== false) {
                    $queries = explode(';', $sql);
                    foreach ($queries as $query) {
                        $query = trim($query);
                        if (!empty($query)) {
                            if (mysqli_query($thanhdieudb, $query)) {
                            } else {
                                echo "<script>$(document).ready(function() {layer.msg('Lỗi, không thể đổ dữ liệu đè lên dữ liệu cũ.');})</script>";
                               // echo "Lỗi: " . mysqli_error($thanhdieudb);
                            }
                        }
                    }
                } else {
                    echo "Lỗi khi đọc file SQL.";
                }
                $config = "<?php\n";
                $config .= "\$localhost_db = '" . trim($_POST['__ThanhDieuDbServer']) . "';\n";
                $config .= "\$username_db = '" . trim($_POST['__ThanhDieuDbUser']) . "';\n";
                $config .= "\$password_db = '" . trim($_POST['__ThanhDieuDbPwd']) . "';\n";
                $config .= "\$database_db = '" . trim($_POST['__ThanhDieuDbName']) . "';\n";
                $key_ss = "<?php\n";
                $key_ss .= "define('License', '" . trim($_POST['__ThanhDieuLicense']) . "'); // Khóa giấy phép của bạn\n";
                $ConfigPath = '../conf/db.sql.php';
                $LicenseKey = '../key.php';
                file_put_contents($ConfigPath, $config);
                file_put_contents($LicenseKey, $key_ss);
                $state = md5(uniqid(rand(), true));
                setcookie('install_state', $state, time() + 3600, '/');
                $messages = [
                    ["table" => "Comments", "delay" => 100],
                    ["table" => "Love_setting", "delay" => 3000],
                    ["table" => "Setting", "delay" => 5000],
                    ["table" => "Users", "delay" => 7000]
                ];
                echo '<link rel="stylesheet" href="https://cdn.bootcdn.net/ajax/libs/layer/3.1.1/theme/default/layer.css">';
                echo "<script>";
                foreach ($messages as $index => $message) {
                    echo "setTimeout(function() {";
                    echo "    layer.msg('Đang đổ dữ liệu bảng `{$message['table']}`...', {";
                    echo "        icon: 16,";
                    echo "        shade: 0.3,";
                    echo "        time: 0";
                    echo "    });";
                    echo "}, {$message['delay']});";
                }
                echo "setTimeout(function() {";
                echo "    window.location.href='./?a=2&s={$state}';";
                echo "}, 8500);";
                echo "</script>";
               // header("Location: ./?a=2&s={$state}");
            } else {
                $error_msg = 'Không tìm thấy cơ sở dữ liệu';
            }
        } else {
            $error_msg = 'Thông tin cơ sở dữ liệu sai, kết nối không thành công';
        }
    }
}    
if ($a == 2) {
    if ( !isset($_GET[ 's' ]) or !isset($_COOKIE[ 'install_state' ]) or $_GET[ 's' ] != $_COOKIE[ 'install_state' ]) {
    header("Location: ../");
    }
}

function array_isset ($arr , $key): bool
{
    return isset($arr[ $key ]) && !empty($arr[ $key ]);
}
?>


<!doctype html>
<html lang="vi-VN" class="thanhdieuinstaller">
<head>
    <meta charset="utf-8">
    <title>Loveday - Install V1.0.0</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="icon" href="https://i.imgur.com/Z9S96Sm.png">
    <link rel="stylesheet" id="css-main" href="../assets/oneui/css/oneui.min-5.6.css">
    <link rel="stylesheet" href="https://cdn.bootcdn.net/ajax/libs/layer/3.1.1/theme/default/layer.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div id="page-container" class="main-content-boxed">
        <main id="main-container">
            <div class="bg-body-light hero-bubbles">
                <span class="hero-bubble hero-bubble-lg bg-primary" style="top: 20%; left: 10%;"></span>
                <span class="hero-bubble bg-success" style="top: 20%; left: 80%;"></span>
                <span class="hero-bubble hero-bubble-sm bg-corporate" style="top: 40%; left: 25%;"></span>
                <span class="hero-bubble hero-bubble-lg bg-pulse" style="top: 30%; left: 90%;"></span>
                <span class="hero-bubble bg-danger" style="top: 40%; left: 20%;"></span>
                <span class="hero-bubble bg-warning" style="top: 60%; left: 25%;"></span>
                <span class="hero-bubble bg-info" style="top: 60%; left: 80%;"></span>
                <span class="hero-bubble hero-bubble-lg bg-flat" style="top: 75%; left: 70%;"></span>
                <span class="hero-bubble hero-bubble-lg bg-earth" style="top: 75%; left: 10%;"></span>
                <span class="hero-bubble bg-elegance" style="top: 90%; left: 90%;"></span>
                <div class="row g-0 justify-content-center position-relative">
                    <div class="hero-static col-lg-7">
                        <div class="content content-full overflow-hidden">
                            <div class="py-5 text-center">
                                <a class="link-fx fw-bold" href="javascript:void(0);">
                                    <i class="fa fa-gear fa-spin"></i>
                                    <span class="fs-4 text-body-color">NgocAnh</span><span
                                        class="fs-4">Installer</span>
                                </a>
                                <h1 class="h3 fw-bold mt-5 mb-2">Chào mừng đến với trình cài đặt</h1>
                                <h2 class="fs-base fw-medium text-muted mb-0" style="text-transform: uppercase;">
                                    <?php
                                if ($a == 0): ?>Kiểm soát môi trường<?php
                                elseif ($a == 1): ?>Cấu hình cơ sở dữ liệu<?php
                                elseif ($a == 2): ?>Quá trình cài đặt hoàn tất<?php
                                endif; ?>
                                </h2>

                            </div>
                            <?php if ($error_msg): ?>
                            <div class="alert alert-danger" role="alert">
                                <p class="mb-0"><?php echo $error_msg; ?></p>
                            </div>
                            <?php endif; ?>
                            <?php
                        if ( $a == 0 ): ?>
                            <div class="block block-rounded block-fx-shadow">
                                <div class="block-content">
                                    <div class="table-responsive-sm">
                                        <table class="table table-bordered table-centered">
                                            <thead>
                                                <tr class="text-nowrap">
                                                    <th class="text-center">tham số</th>
                                                    <th class="text-center">Giá trị hiện tại</th>
                                                    <th class="text-center">Giá trị yêu cầu</th>
                                                    <th class="text-center">Tình trạng</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="text-nowrap">
                                                    <td class="text-center">Tên miền hiện tại</td>
                                                    <td class="text-center"><?php echo $web_url; ?></td>
                                                    <td class="text-center">*</td>
                                                    <td class="text-center">
                                                        <span
                                                            class="<?php echo ($web_url ? 'text-success' : 'text-danger'); ?>"><?php echo ($web_url ? 'Bình thường' : 'Bất thường'); ?></span>
                                                    </td>
                                                </tr>
                                                <tr class="text-nowrap">
                                                    <td class="text-center">Phiên bản PHP</td>
                                                    <td class="text-center"><?php echo $php_bb; ?></td>
                                                    <td class="text-center">>=7.2</td>
                                                    <td class="text-center">
                                                        <span
                                                            class="<?php echo ($php_bb >= 7.2 ? 'text-success' : 'text-danger'); ?>"><?php echo ($php_bb >= 7.3 ? 'Bình thường' : 'Bất thường'); ?></span>
                                                    </td>
                                                </tr>
                                                <tr class="text-nowrap">
                                                    <td class="text-center">Giấy phép</td>
                                                    <td class="text-center">
                                                        <?php echo (License ? 'Chờ xác minh' : 'Chưa xác định'); ?></td>
                                                    <td class="text-center">Bắt buộc</td>
                                                    <td class="text-center"><span
                                                            class="<?php echo (License ? 'text-danger' : 'text-danger'); ?>"><?php echo (License ? 'Chờ kích hoạt' : 'Bất thường'); ?></span>
                                                    </td>
                                                </tr>
                                                <tr class="text-nowrap">
                                                    <td class="text-center">MYSQL</td>
                                                    <td class="text-center"><?php echo $mysql_bb; ?></td>
                                                    <td class="text-center">Hỗ trợ</td>
                                                    <td class="text-center"><span
                                                            class="<?php echo ($mysql_bb == 'Hỗ trợ' ? 'text-success' : 'text-danger'); ?>"><?php echo ($mysql_bb == 'Hỗ trợ' ? 'Bình thường' : 'Bất thường'); ?></span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="block-content">
                                        <div class="row mb-4">
                                            <div class="col-lg-6 offset-lg-5">
                                                <a href="./?a=1" class="btn btn-alt-primary mb-2">
                                                    <i class="fa fa-arrow-right opacity-75 me-1"></i> Bước tiếp theo
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php elseif ($a == 1): ?>
                                <form action="./?a=1" method="post" id="addimg" name="addimg">
                                    <div class="block block-rounded block-fx-shadow">
                                        <div class="block-content">
                                            <h2 class="content-heading pt-3">Cài đặt cơ sở dữ liệu</h2>
                                            <div class="row items-push">
                                                <div class="col-lg-4">
                                                    <p class="text-muted">
                                                        Hãy đảm bảo rằng biểu mẫu cơ sở dữ liệu được điền chính xác, nếu
                                                        không quá trình cài đặt sẽ thất bại.
                                                    </p>
                                                </div>
                                                <div class="col-lg-6 offset-lg-1">
                                                    <div class="mb-4">
                                                        <label class="form-label" for="__ThanhDieuDbServer">Địa Chỉ
                                                            Database</label>
                                                        <input type="text" class="form-control form-control-lg"
                                                            id="__ThanhDieuDbServer" name="__ThanhDieuDbServer"
                                                            value="localhost" placeholder="Mặc định là localhost">
                                                    </div>
                                                    <div class="mb-4">
                                                        <label class="form-label" for="__ThanhDieuDbUser">Tài Khoản
                                                            CSDL</label>
                                                        <input type="text" class="form-control form-control-lg"
                                                            id="__ThanhDieuDbUser" name="__ThanhDieuDbUser" value="root"
                                                            placeholder="Tài khoản cơ sở dữ liệu">
                                                    </div>
                                                    <div class="mb-4">
                                                        <label class="form-label" for="__ThanhDieuDbPwd">Mật Khẩu
                                                            CSDL</label>
                                                        <input type="text" class="form-control form-control-lg"
                                                            id="__ThanhDieuDbPwd" name="__ThanhDieuDbPwd"
                                                            placeholder="Điền mật khẩu cơ sở dữ liệu">
                                                    </div>
                                                    <div class="mb-4">
                                                        <label class="form-label" for="__ThanhDieuDbName">Tên
                                                            CSDL</label>
                                                        <input type="text" class="form-control form-control-lg"
                                                            id="__ThanhDieuDbName" name="__ThanhDieuDbName"
                                                            placeholder="Tên cơ sở dữ liệu">
                                                    </div>
                                                    <div class="mb-4">
                                                        <label class="form-label" for="__ThanhDieuLicense">Giấy Phép (
                                                            Nếu Có )</label>
                                                        <input type="text" class="form-control form-control-lg"
                                                            id="__ThanhDieuLicense" name="__ThanhDieuLicense"
                                                            placeholder="Mã giấy phép kích hoạt tên miền">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="block-content mt-4">
                                            <div class="row mb-4">
                                                <div class="col-lg-6 offset-lg-5">
                                                    <form id="installForm" action="your-php-script.php" method="post">
                                                        <button type="button" name="install" id="installdb" value="yes"
                                                            class="btn btn-primary mb-2">
                                                            <i class="fa fa-arrow-right opacity-50 me-1"></i> Cài đặt
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <?php
                                $installLockPath = '../../install.lock';
                            elseif ($a == 2 && isset($_GET[ 's' ]) && isset($_COOKIE[ 'install_state' ]) && $_GET[ 's' ] == $_COOKIE[ 'install_state' ]):$file_path = __DIR__ . '/../install.lock';$content = 'thanhdieulove=true';file_put_contents($file_path, $content); ?>
                                <audio controls autoplay="autoplay" loop="loop" style="display:none;">
                                    <source src="https://files.catbox.moe/tn83zf.mp3" type="audio/mpeg">
                                </audio>
                                <script>$(document).ready(function() {layer.msg('Cài đặt thành công!');})</script>
                                <canvas id="canvas" width="1920" height="950"></canvas><style>canvas {position: relative;zindex: 1;pointer-events: none;position: fixed;top: 0;left: 0}</style>
                                <div class="block block-rounded block-fx-shadow">
                                    <div class="block-content">
                                        <div class="row items-push">
                                            <div class="text-center text-muted">
                                                <h2 class="mt-0"><i class="mdi mdi-check-all"></i></h2>
                                                <h3 class="mt-0">Good for you !</h3>
                                                <p class="text-nowrap w-75 mb-2 mt-2 mx-auto">Tài khoản mặc định: <span
                                                        class="fw-bold fs-sm text-warning">admin</span></p>
                                                <p class="text-nowrap w-75 mb-2 mt-2 mx-auto">Mật khẩu mặc định: <span
                                                        class="fw-bold fs-sm">123456</span>
                                                </p>
                                                <small>* Vui lòng đổi mật khẩu mới ở trang quản trị.</small>
                                                <div class="mb-3 mt-2">
                                                    <a href="../"
                                                        class="btn btn-sm btn-alt-primary d-block d-sm-inline-block mb-2 mb-sm-0 me-sm-2">Trở
                                                        về trang chủ</a>
                                                    <a href="../admin/" target="_blank"
                                                        class="btn btn-sm btn-alt-success d-block d-sm-inline-block">Vào
                                                        trang quản trị</a>
                                                </div>
                                                <p class="w-75 mb-2 mt-2 mx-auto">Quá trình cài đặt hoàn tất và bạn có
                                                    thể bắt đầu sử dụng hệ thống. Nếu bạn vẫn muốn cài đặt lại./Chỉ cần
                                                    xóa tệp install.lock trống {domain}/install.lock</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            else:header("Location: ./");
                            endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
        </main>
    </div>
    <script src="../assets/oneui/js/lib/layer.min.js"></script>
    <script src="../assets/oneui/js/oneui.app.min-5.6.js"></script>
    <script>
    $(document).ready(function() {
        $('#installdb').click(function(e) {
            e.preventDefault();
            layer.msg('Đang kết nối đến database...', {
                icon: 16,
                shade: 0.3,
                time: 0
            });
            if (!$(this).prop('disabled')) {
                $(this).html('<i class="fa fa-spinner fa-spin opacity-50 me-1"></i> Đang kết nối...')
                    .prop('disabled', true);
                setTimeout(function() {
                    $('#installdb').closest('form').append(
                        '<input type="hidden" name="install" value="yes">').submit();
                }, Math.floor(Math.random() * (1500 - 1000 + 1)) + 1000);
            }
        });
    });
    var canvas1, ctx, W, H;
if (screen.width >= 988)
    var mp = 150;
else
    mp = 75;
var deactivationTimerHandler, reactivationTimerHandler, animationHandler, particles = [], angle = 0, tiltAngle = 0, confettiActive = !0, animationComplete = !0, particleColors = {
    colorOptions: ["DodgerBlue", "OliveDrab", "Gold", "pink", "SlateBlue", "lightblue", "Violet", "PaleGreen", "SteelBlue", "SandyBrown", "Chocolate", "Crimson"],
    colorIndex: 0,
    colorIncrementer: 0,
    colorThreshold: 10,
    getColor: function() {
        return this.colorIncrementer >= 10 && (this.colorIncrementer = 0,
        this.colorIndex++,
        this.colorIndex >= this.colorOptions.length && (this.colorIndex = 0)),
        this.colorIncrementer++,
        this.colorOptions[this.colorIndex]
    }
};
function confettiParticle(t) {
    this.x = Math.random() * W,
    this.y = Math.random() * H - H,
    this.r = RandomFromTo(10, 30),
    this.d = Math.random() * mp + 10,
    this.color = t,
    this.tilt = Math.floor(10 * Math.random()) - 10,
    this.tiltAngleIncremental = .07 * Math.random() + .05,
    this.tiltAngle = 0,
    this.draw = function() {
        return ctx.beginPath(),
        ctx.lineWidth = this.r / 2,
        ctx.strokeStyle = this.color,
        ctx.moveTo(this.x + this.tilt + this.r / 4, this.y),
        ctx.lineTo(this.x + this.tilt, this.y + this.tilt + this.r / 4),
        ctx.stroke()
    }
}
function InitializeButton() {
    $("#stopButton").click(DeactivateConfetti),
    $("#startButton").click(RestartConfetti)
}
function SetGlobals() {
    canvas1 = document.getElementById("canvas"),
    ctx = canvas1.getContext("2d"),
    W = window.innerWidth,
    H = window.innerHeight,
    canvas1.width = W,
    canvas1.height = H
}
function InitializeConfetti() {
    particles = [],
    animationComplete = !1;
    for (var t = 0; t < mp; t++) {
        var i = particleColors.getColor();
        particles.push(new confettiParticle(i))
    }
    StartConfetti()
}
function Draw() {
    ctx.clearRect(0, 0, W, H);
    for (var t, i = [], n = 0; n < mp; n++)
        t = n,
        i.push(particles[t].draw());
    return Update(),
    i
}
function RandomFromTo(t, i) {
    return Math.floor(Math.random() * (i - t + 1) + t)
}
function Update() {
    var t, i = 0;
    angle += .01,
    tiltAngle += .1;
    for (var n = 0; n < mp; n++) {
        if (t = particles[n],
        animationComplete)
            return;
        !confettiActive && t.y < -15 ? t.y = H + 100 : (stepParticle(t, n),
        t.y <= H && i++,
        CheckForReposition(t, n))
    }
    0 === i && StopConfetti()
}
function CheckForReposition(t, i) {
    (t.x > W + 20 || t.x < -20 || t.y > H) && confettiActive && (i % 5 > 0 || i % 2 == 0 ? repositionParticle(t, Math.random() * W, -10, Math.floor(10 * Math.random()) - 10) : Math.sin(angle) > 0 ? repositionParticle(t, -5, Math.random() * H, Math.floor(10 * Math.random()) - 10) : repositionParticle(t, W + 5, Math.random() * H, Math.floor(10 * Math.random()) - 10))
}
function stepParticle(t, i) {
    t.tiltAngle += t.tiltAngleIncremental,
    t.y += (Math.cos(angle + t.d) + 3 + t.r / 2) / 2,
    t.x += Math.sin(angle),
    t.tilt = 15 * Math.sin(t.tiltAngle - i / 3)
}
function repositionParticle(t, i, n, e) {
    t.x = i,
    t.y = n,
    t.tilt = e
}
function StartConfetti() {
    W = window.innerWidth,
    H = window.innerHeight,
    canvas1.width = W,
    canvas1.height = H,
    function t() {
        return animationComplete ? null : (animationHandler = requestAnimFrame(t),
        Draw())
    }()
}
function ClearTimers() {
    clearTimeout(reactivationTimerHandler),
    clearTimeout(animationHandler)
}
function DeactivateConfetti() {
    confettiActive = !1,
    ClearTimers()
}
function StopConfetti() {
    animationComplete = !0,
    null != ctx && ctx.clearRect(0, 0, W, H)
}
function RestartConfetti() {
    ClearTimers(),
    StopConfetti(),
    reactivationTimerHandler = setTimeout(function() {
        confettiActive = !0,
        animationComplete = !1,
        InitializeConfetti()
    }, 100)
}
$(document).ready(function() {
    SetGlobals(),
    InitializeButton(),
    InitializeConfetti(),
    $(window).resize(function() {
        W = window.innerWidth,
        H = window.innerHeight,
        canvas1.width = W,
        canvas1.height = H
    })
}),
window.requestAnimFrame = window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window.oRequestAnimationFrame || window.msRequestAnimationFrame || function(t) {
    return window.setTimeout(t, 1e3 / 60)
}
;
    </script>
</body>
</html>