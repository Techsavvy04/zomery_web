<?php
include '../conf/conn.php';
if (isset($_SESSION['taikhoan'])) {
    $taikhoan = $_SESSION['taikhoan'];
    $sql_importavt = "SELECT avatar FROM users WHERE taikhoan = '$taikhoan'";
    $result_avatar = $thanhdieudb->query($sql_importavt);
    if ($result_avatar->num_rows > 0) {
        $row = $result_avatar->fetch_assoc();
        $avatar = $row['avatar'];
    }
}
if (isset($_POST['binhluan'])) {
    $taikhoan = $_POST['taikhoan'];
    if (isset($_POST['avatar']) && !empty($_POST['avatar'])) {
        $avatar = $_POST['avatar'];
    }
    $hovaten = $_POST['hovaten'];
    $noidung = $thanhdieudb->real_escape_string($_POST['noidung']);
    $role_check = $_POST['role'] ?? '';
    $tickxanh = $_POST['tichxanh'] ?? '';
    $tenthietbi = $device_name;
    $iconthietbi = $device_icon;
    $icontrinhduyet = $browser_icon;
    $tentrinhduyet = $browser_name;
    $role_badge = $role;
    if (isset($_SESSION['last_comment_time'])) {
        $lastCommentTime = strtotime($_SESSION['last_comment_time']);
        $timeDiff = time() - $lastCommentTime;
        $limitTime = 0;
        if (isset($_SESSION['show_notification']) && $_SESSION['show_notification']) {
            if ($timeDiff < $limitTime) {
                $timeDelay = $limitTime - $timeDiff;
                echo "Thao tác quá thường xuyên, vui lòng đợi $timeDelay giây";
                exit;
              /*  $blacklist_ips[] = $ip;
                $new_blacklist = implode('|', $blacklist_ips);
                $sql_blacklist_ip = "UPDATE setting SET blackip='$new_blacklist'";
                if ($thanhdieudb->query($sql_blacklist_ip) === TRUE) {
                    echo "Hoạt động đáng ngờ, bạn đã bị cấm!";
                    echo '<meta http-equiv="refresh" content="2.7">';
                    die();
                }*/
            } else {
                $_SESSION['show_notification'] = false;
                
            }
        }
    
        if ($timeDiff < $limitTime) {
            $_SESSION['show_notification'] = true;
            echo "Thao tác quá thường xuyên, vui lòng đợi $limitTime giây";
            exit;
        }
    }
    $_SESSION['show_notification'] = false;
    $_SESSION['last_comment_time'] = date("Y-m-d H:i:s");   }
if (empty($hovaten) || !CheckNameCmt($hovaten)) {
        echo "Vui lòng nhập tên hợp lệ (không quá 25 ký tự)!";
    } elseif (!CheckNoiDung($noidung)) {
        echo "Nội dung quá dài, chỉ được từ 1-350 từ!";
    } elseif (strlen($noidung) <= 6) {
        echo "Bình luận quá ngắn!"; 
    } elseif (!CheckImage($avatar)) {
        echo "Link ảnh không hợp lệ, đuôi ảnh là jpg, png, gif v.v.v";
        } else {    
            /*$vitri = $dataip['country'] .' '. $ip;*/
             $vitri = $ip;
            $ngaycmt = date("Y-m-d H:i:s");
            $sql_cmt = "INSERT INTO comments (taikhoan, hovaten, avatar, noidung, ngaybinhluan, ip, tichxanh, vitri, device, browser, device_icon, browser_name, `role`) VALUES ('$taikhoan', '$hovaten', '$avatar','$noidung','$ngaycmt','$ip','$tickxanh','$vitri','$tenthietbi','$icontrinhduyet','$iconthietbi','$tentrinhduyet','$role_badge')";            
            if ($thanhdieudb->query($sql_cmt) === TRUE) {
                echo "success";
            } else {
                echo "Lỗi: " . $thanhdieudb->error;
            }
        }
?>
