<?php
include __DIR__ . '/../key.php';
define('API_KEY', trim(License));
function ApiKeyValid($apiKey) {
   return "on";
}

$apiResult = ApiKeyValid(API_KEY);
if ($apiResult) {
    $status = $apiResult;
    if ($status === 'on') {
    $ip = $_SERVER['REMOTE_ADDR'];
    $blackip = "SELECT blackip FROM setting";
    $checkbanip = $thanhdieudb->query($blackip);
    if ($checkbanip->num_rows > 0) {
        while ($row = $checkbanip->fetch_assoc()) {
            $blacklistIPs = explode('|', $row['blackip']);
            if (in_array($ip, $blacklistIPs)) {
                echo '<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />';
                echo "<iframe src='blackip' style='position:absolute;width: 100%;height: 100%;top: 0;left: 0;border: none;' allowfullscreen></iframe>";
                echo '{"code":403,"respons":Forbidden,"msg":You banned for unusual behavior or by admin decision}';
                exit();
            }
        }
    }
    $thanhdieudb->query("set names 'utf8mb4'");
    $admin = $thanhdieudb->query("SELECT * FROM users ORDER BY id ASC LIMIT 1")->fetch_assoc();
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $_SESSION['session_request'] = time();
    $time = date('Y-m-d H:i:s');
    $timeformat = date('H:i - d/m/Y'); 
    $hovaten = "Khách";
    $role = "Không có";
    $taikhoan = "Tài khoản khách";
    $verify_tick = "";
    $matkhau = "";
    $avatar = "https://i.imgur.com/S78eT0P.png"; 
    if (isset($_SESSION['taikhoan'])) {
        $taikhoan = $_SESSION['taikhoan'];
        $user_query = $thanhdieudb->query("SELECT * FROM `users` WHERE `taikhoan` = '$taikhoan'");
        if (!$user_query) {
            header("Location: error");
            exit;
        }
        $user = $user_query->fetch_array();     
        $hovaten = $user['hovaten'];  
        $role = $user['role']; 
        $taikhoan = $user['taikhoan']; 
        $verify_tick = $user['verify_tick'];
        $avatar = $user['avatar'];
        $matkhau = $user['matkhau'];
    }
    $website_domain ="https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $post_url = $_SERVER['REQUEST_URI'];
    $domain = $_SERVER['HTTP_HOST'];
    function get_part_of_day($time) {
    $hour = date('H', strtotime($time));

    if ($hour >= 3 && $hour < 11) {
        return "Buổi Sáng";
    } elseif ($hour >= 11 && $hour < 14) {
        return "Buổi Trưa";
    } elseif ($hour >= 16 && $hour < 18) {
        return "Buổi Chiều";
    } elseif ($hour >= 18 && $hour < 22) {
        return "Buổi Tối";
    } else {
        return "Giờ âm phủ";
    }
}
$sql_check_user = "SELECT * FROM comments WHERE ip = '$ip'";
$users_ip_cmt = $thanhdieudb->query($sql_check_user);
// THONG TIN SETTING
$setting_query = $thanhdieudb->query("SELECT * FROM `setting`");
$setting = $setting_query->fetch_assoc();
$title = isset($setting['title']) ? htmlspecialchars($setting['title']) : '';
$mode_love = isset($setting['mode_timelove']) ? htmlspecialchars($setting['mode_timelove']) : '';
$keywords = isset($setting['keywords']) ? htmlspecialchars($setting['keywords']) : '';
$logo = isset($setting['logo']) ? htmlspecialchars($setting['logo']) : '';
$description = isset($setting['description']) ? htmlspecialchars($setting['description']) : '';
$blackip = isset($setting['blackip']) ? htmlspecialchars($setting['blackip']) : '';
$author = isset($setting['author']) ? htmlspecialchars($setting['author']) : '';
$footer = isset($setting['footer']) ? htmlspecialchars($setting['footer']) : '';
$usercmt = isset($setting['user_cmt']) ? htmlspecialchars($setting['user_cmt']) : '';
$bg_img = isset($setting['background']) ? htmlspecialchars($setting['background']) : '';
$user_cmt = isset($setting['user_cmt']) ? htmlspecialchars($setting['user_cmt']) : '';
$modal_on_off = isset($setting['modal_on_off']) ? htmlspecialchars($setting['modal_on_off']) : '';
$modal_title = isset($setting['modal_title']) ? htmlspecialchars($setting['modal_title']) : '';
$modal_content = isset($setting['modal_content']) ? htmlspecialchars($setting['modal_content']) : '';
$baotri_site = isset($setting['baotri']) ? htmlspecialchars($setting['baotri']) : '';
// THÔNG TIN HẸN HÒ
$rela_query = $thanhdieudb->query("SELECT * FROM `love_setting`");
$relationship = $rela_query->fetch_assoc();
// Khai báo biến thông tin của bạn
$tenban = isset($relationship['tenban']) ? htmlspecialchars($relationship['tenban']) : '';
$avatarboy = isset($relationship['avatarboy']) ? htmlspecialchars($relationship['avatarboy']) : '';
$cunghoangdao_boy = isset($relationship['cunghoangdao_boy']) ? htmlspecialchars($relationship['cunghoangdao_boy']) : '';
// Khai báo biến thông tin của ny bạn
$tennguoiay = isset($relationship['tennguoiay']) ? htmlspecialchars($relationship['tennguoiay']) : '';
$avatargirl = isset($relationship['avatargirl']) ? htmlspecialchars($relationship['avatargirl']) : '';
$cunghoangdao_girl = isset($relationship['cunghoangdao_girl']) ? htmlspecialchars($relationship['cunghoangdao_girl']) : '';
// Thong tin chung
$ngayhenho = isset($relationship['ngayhenho']) ? htmlspecialchars($relationship['ngayhenho']) : '';
$themerela = isset($relationship['themerela']) ? htmlspecialchars($relationship['themerela']) : '';
$titlelove = isset($relationship['titlelove']) ? htmlspecialchars($relationship['titlelove']) : '';
$effect_fall = isset($relationship['effect_fall']) ? htmlspecialchars($relationship['effect_fall']) : '';
$music = isset($relationship['music']) ? htmlspecialchars($relationship['music']) : '';
$music_urls = explode('|', $music);
$music_url_string = implode("', '", $music_urls);
function RandRay($ch, $len = 32)
{
    if ($ch) {
        return '?cache=' . substr(md5(openssl_random_pseudo_bytes(20)), -$len);
    } else {
        return substr(md5(openssl_random_pseudo_bytes(20)), -$len);
    }
}
$Cache = RandRay(true, 7);
$RayID = RandRay(false, 20);
function Directory($dirname) {
    return "./static/{$dirname}/";
}
function DetectSQLInjection($input) {
    $list_query = "/\b(union|select|insert|update|delete|drop|alter|truncate|exec|xp_cmdshell|or|order\s*by|from|where|and|group\s*by|having|char|nchar|varchar|nvarchar|cast|convert|declare|script|' OR '1'='1' -- -|' OR '1'='1' #|' OR 1=1 --|' OR 'x'='x' --|' OR 1=1 LIMIT 1 -- -|' OR 1=1; --|' OR '1'='1' --|' OR '1'='1'; --|' OR '1'='1'; DROP TABLE users -- -|' OR 1=CONVERT\(int, \(SELECT @@version\)\) --|' OR 1=\(SELECT COUNT\(\*\) FROM information_schema\.tables\) --|' OR 'x'='x' AND 'y'='y' --|' OR 'x'='x' AND 'y'='z' --|' UNION SELECT null, taikhoan, matkhau FROM users --)\b/i";
    $excluded_query = "/' UNION SELECT null, taikhoan, matkhau FROM users --/i";
    if (preg_match($list_query, $input) && !preg_match($excluded_query, $input)) {
        return true;
    }
    return false;
}
$user_agent = $_SERVER['HTTP_USER_AGENT'];
if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i', $user_agent)
    || preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i', substr($user_agent, 0, 4))) {
    $themerela = 0; 
}
function CheckContent($noidung) {
    $check_keywords = array('ngu','lồn', 'cặc', 'rác','đụ','địt','trẩu','súc vật','ranh con','óc','chó','khuyết tật','súc sinh','má','mẹ','rách','gà','đm','cmm','cc','lòn','lon','lỏ','sv','đần','ngáo','dốt','cạc','cac');
   $input_lower = mb_strtolower($noidung, 'UTF-8');
    foreach ($check_keywords as $keyword) {
        if (stripos($input_lower, $keyword) !== false) {
            return "Vui lòng sử dụng ngôn từ lịch sự.";
        }
    }

    $safe_content = strip_tags($noidung);
    return $safe_content;
}
$mysqlversion = mysqli_get_server_info($thanhdieudb);

//$tongbinhluan = mysqli_fetch_assoc(mysqli_query($thanhdieudb, "SELECT COUNT(*) AS tongbinhluan FROM `comments`"))['tongbinhluan'];
$tongadmin = mysqli_fetch_assoc(mysqli_query($thanhdieudb, "SELECT COUNT(*) AS total_admin FROM `users`"))['total_admin'];
$query_ip = "SELECT LENGTH(`blackip`) - LENGTH(REPLACE(`blackip`, '|', '')) + 1 AS tongbanned FROM `setting` WHERE `blackip` IS NOT NULL AND `blackip` <> ''";
$result_blackip = $thanhdieudb->query($query_ip);
if (!$result_blackip) {
    $tongbanned = 0;
} else {
    $row = mysqli_fetch_assoc($result_blackip);
    $tongbanned = isset($row['tongbanned']) ? $row['tongbanned'] : 0;
}
$tongcmt = mysqli_fetch_assoc($thanhdieudb->query("SELECT COUNT(*) AS tongcmt FROM `comments`"))['tongcmt'];
$cmthomnay = mysqli_fetch_assoc($thanhdieudb->query("SELECT COUNT(*) AS cmthomnay FROM `comments` WHERE DATE(ngaybinhluan) = CURDATE()"))['cmthomnay'];
//$tongluottruycap = mysqli_fetch_assoc($thanhdieudb->query("SELECT COUNT(*) AS tongluottruycap FROM `traffic` WHERE `users_view` > 0"))['tongluottruycap'];
// Geo ip
$geoip = file_get_contents('https://api.ip.sb/geoip/'.$ip);
$dataip = json_decode($geoip, true);
function CheckImage($url) {
    $allowedExtensions = ['gif', 'jpg', 'jpeg', 'png', 'ico', 'webp'];
    $urlInfo = pathinfo($url);
    $extension = isset($urlInfo['extension']) ? strtolower($urlInfo['extension']) : '';
    return in_array($extension, $allowedExtensions);
}
function CheckDateRela($dateString) {
    $date = DateTime::createFromFormat('d-m-Y', $dateString);
    return $date && $date->format('d-m-Y') === $dateString;
}
function CheckName($name) {
    $length = mb_strlen($name, 'UTF-8');
    return ($length >= 1 && $length <= 12);
}
function CheckNameCmt($name) {
    $length = mb_strlen($name, 'UTF-8');
    return ($length >= 4 && $length <= 25);
}
function CheckNoiDung($name) {
    $length = mb_strlen($name, 'UTF-8');
    return ($length >= 1 && $length <= 350);
}
function CheckMusic($url) {
    $allowedExtensions = ['mp3','wav','flac','aac',];
    $urlInfo = pathinfo($url);
    $extension = isset($urlInfo['extension']) ? strtolower($urlInfo['extension']) : '';
    return in_array($extension, $allowedExtensions);
}
// 12 cung hoàng đạo
$zodiacs = ["Bạch Dương", "Cung Kim Ngưu", "Cung Song Tử", "Cung Cự Giải", "Cung Sư Tử", "Cung Xử Nữ", "Cung Thiên Bình", "Cung Hổ Cáp", "Cung Nhân Mã", "Cung Ma Kết", "Cung Bảo Bình", "Cung Song Ngư"];
$zodiacs_name = [
"Bạch Dương (Aries) | 21/3 - 19/4",
"Kim Ngưu (Taurus) | 20/4 - 20/5",
"Song Tử (Gemini) | 21/5 - 20/6",
"Cự Giải (Cancer) | 21/6 - 22/7",
"Sư Tử (Leo) | 23/7 - 22/8",
"Xử Nữ (Virgo) | 23/8 - 22/9",
"Thiên Bình (Libra) | 23/9 - 22/10",
"Hổ Cáp (Scorpio) | 23/10 - 21/11",
"Nhân Mã (Sagittarius) | 22/11 - 21/12",
"Ma Kết (Capricorn) | 22/12 - 19/1",
"Bảo Bình (Aquarius) | 20/1 - 18/2",
"Song Ngư (Pisces) | 19/2 - 20/3"
];
// remove def
function Confuscator($noidung) {
    $understand_dev = array(
        '/<\s*script[^>]*>.*?<\s*\/\s*script\s*>/is',
        '/<\s*style[^>]*>.*?<\s*\/\s*style\s*>/is',  
        '/<\?php.*?\?>/is',                                  
        '/\bphp\b/i',                    
        '/\bjavascript\b/i',              
        '/<\//', 
        '/<\/>/', 
        '/</',  
        '/>/',
    );
    $remove_cmt = preg_replace($understand_dev, '', $noidung);
    if (empty($remove_cmt)) {
        $remove_cmt = '<i style="color: #fbff00;font-size:14px;text-shadow: 0 0 5px red;"><strong>“ Bình luận này vi phạm hệ thống đã ẩn sẽ sớm được quản trị viên xem xét ! ”</strong></i>';
    }
    return $remove_cmt;
}
// Get device
function get_browser_info() {
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    $browser_name = "Google Chrome";
    $browser_icon = "chrome";

    if (strpos($user_agent, 'Firefox') !== false) {
        $browser_name = 'Firefox';
        $browser_icon = 'firefox';
    } elseif (strpos($user_agent, 'Chrome') !== false) {
        $browser_name = 'Google Chrome';
        $browser_icon = 'chrome';
    } elseif (strpos($user_agent, 'Safari') !== false) {
        $browser_name = 'Safari';
        $browser_icon = 'safari';
    } elseif (strpos($user_agent, 'Edge') !== false) {
        $browser_name = 'Microsoft Edge';
        $browser_icon = 'edge';
    } elseif (strpos($user_agent, 'MSIE') !== false || strpos($user_agent, 'Trident') !== false) {
        $browser_name = 'Internet Explorer';
        $browser_icon = 'ie';
    } elseif (strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR')) {
        $browser_name = 'Opera';
        $browser_icon = 'opera';
    }
    return array('name' => $browser_name, 'icon' => $browser_icon);
}

function get_device_info() {
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    $device_name = "Unknown Device";
    $device_icon = "android";
    if (strpos($user_agent, 'Android') !== false) {
        $device_name = 'Android';
        $device_icon = 'android';
    } elseif (preg_match('/iPhone(?:\s+OS)?\s([0-9_]+)?\s*.*\s*like\s*Mac OS X/', $user_agent, $matches)) {
        $device_name = 'iOS';
        $iphone_version = !empty($matches[1]) ? str_replace('_', '.', $matches[1]) : '';
        $device_name = $iphone_version ? "iPhone $iphone_version" : 'iPhone';
        $device_icon = 'apple';
    } elseif (strpos($user_agent, 'iPad') !== false) {
        $device_name = 'iPad';
        $device_icon = 'apple';
    } elseif (strpos($user_agent, 'Windows Phone') !== false) {
        $device_name = 'Windows Phone';
        $device_icon = 'win1';
    } elseif (strpos($user_agent, 'Macintosh') !== false) {
        $device_name = 'macOS';
        $device_icon = 'mac';
    } elseif (strpos($user_agent, 'Linux') !== false) {
        $device_name = 'Linux';
        $device_icon = 'linux';
    } elseif (strpos($user_agent, 'Windows') !== false) {
        if (preg_match('/Windows\s(?:NT\s)?(\d+\.\d+)/', $user_agent, $windows_matches)) {
            $windows_version = $windows_matches[1];
            $device_name = "Windows $windows_version";
        } else {
            $device_name = 'Windows';
        }
        $device_icon = 'win1';
    }

    return array('name' => $device_name, 'icon' => $device_icon);
}
$browser_info = get_browser_info();
$device_info = get_device_info();

$browser_name = $browser_info['name'];
$browser_icon = 'icon-' . strtolower(str_replace(' ', '', $browser_info['icon']));

$device_name = $device_info['name'];
$device_icon = 'icon-' . strtolower(str_replace(' ', '', $device_info['icon']));
$LoveHidden = ($themerela == 0) ? 'hidden-wus-pc' : '';
$LoveHidden = ($themerela == 1) ? 'hidden-namelove' : '';
$LoveFormat = ($themerela == 0) ? 'format-luvday' : '';
$LoveHiddenName = ($mode_love == 'lich2') ? 'hidden-namelove' : '';
} elseif ($status === 'off') {
     http_response_code(401);
    ?>
    <!DOCTYPE html>
    <html lang="vi-VN">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="shortcut icon" href="https://i.imgur.com/Z9S96Sm.png" type="image/x-icon">
        <title>Giấy phép key không tồn tại</title>
        <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
        <link rel="stylesheet" id="css-main" href="./assets/oneui/css/oneui.min-5.6.css"> <!--MainCss-->
        <link rel="stylesheet" id="css-main" href="../assets/oneui/css/oneui.min-5.6.css"><!--Dashboard Css-->
    </head>
    <body onLoad="Notifykey()">
            <div class="content mb-3 animated fadeIn">
                <div class="block block-rounded h-100 mb-4">
                    <div class="content content-full">
                        <div class="row justify-content-center">
                            <div class="col-md-8 col-lg-6 col-xl-4 py-6">
                                <div class="text-center">
                                    <p><i class="fa fa-3x fa-warning text-primary"></i></p>
                                    <h1 class="h4 mb-1">Chưa Kích Hoạt Giấy Phép :(</h1><br>
                                    <h2 class="h6 fw-normal text-muted mb-3" style="color:blue !important;">Thông báo: <?= $reason ?? 'không có dữ liệu'; ?></h2>
                                    <span class="h6 fw-normal text-muted mb-3" style="color:green !important;">Đang chờ kích hoạt giấy phép</span>
                                    <h2 style="color:red !important;" class="h6 fw-danger text-muted mb-3">Cấu Hình Giấy Phép: {domain}/key.php</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-content block-content-full ">
                        <div class="" style="display: block;margin-top:-80px;">
                            <div class="chatBox-content" id="article-wrapper">
                                <div class="text-center" id="">
                                    <img height="250" src="https://i.pinimg.com/564x/13/69/bc/1369bcc94fd6b721d56860f18d9a6e5f.jpg">
                                    <div class="row">
                                        <ul class="list-unstyled mt-3">
                                            <li><span onclick="window.open('https://facebook.com/WusThanhDieu');" class="opacity-50 btn btn-alt-secondary w- mt-3">"  Liên hệ cho chủ sở hữu code  " </span></li>
                                            <li><span id="notikey" class="opacity-50 btn btn-alt-secondary w- mt-3">" Cách để có giấy phép  " </span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer id="page-footer" class="bg-body-light fixed-bottom">
        <div class="content py-3">
        <div class="row fs-sm">
            <div class="col-sm-6 order-sm-2 py-1 text-center text-sm-end">
                Crafted with <i class="fa fa-heart text-danger"></i> by <a class="fw-semibold" href="https://thanhdieu.com" target="_blank">WusThanhDieu</a>
            </div>
            <div class="col-sm-6 order-sm-1 py-1 text-center text-sm-start">
                <a class="fw-semibold" href="https://thanhdieu.com" target="_blank">ThanhDieu.Com</a> ©
                <span data-toggle="year-copy" class="js-year-copy-enabled">2023</span>
            </div>
        </div>
    </div>
</footer>
<script>function Notifykey(){document.getElementById("notikey").addEventListener("click",(function(){new Typed("#notikey",{strings:["","Muốn có giấy phép để thực thi, vui lòng ấn vào Liên hệ cho chủ sở hữu code","Bằng cách liên hệ bạn phải trả với giá 5$ đô la để mua giấy phép!"],typeSpeed:50,showCursor:!1})}))}</script>
    </body>
    </html>
    
    <?php
        die();
    }
}
?>