<?php
require_once('../conf/conn.php');
if (isset($_POST['dangnhap'])) {
    $taikhoan = (is_string($_POST['taikhoan'])) ? $thanhdieudb->real_escape_string($_POST['taikhoan']) : '';
    $matkhau = (is_string($_POST['matkhau'])) ? $thanhdieudb->real_escape_string($_POST['matkhau']) : '';    
    $td_thanhdieu = $thanhdieudb->query("SELECT * FROM `users` WHERE `taikhoan` = '$taikhoan'");
    $verify_tick = '<img class="verify_tick" src="./static/img/verified.png">';
    $ip_address = $_SERVER['REMOTE_ADDR'];
    if (DetectSQLInjection($taikhoan) || DetectSQLInjection($matkhau)) {
        echo "def";
     die();
    }
    if (trim($taikhoan) == "") {
        echo "Tài khoản không được bỏ trống!";
        exit;
    } elseif (trim($matkhau) == "") {
        echo "Mật khẩu không được bỏ trống!";
        exit;
    } else {
        if ($td_thanhdieu) {
        $row = $td_thanhdieu->fetch_assoc();
        if (!$row) {
            echo "Tài khoản không đúng!";
            exit;
        }
        if ($matkhau != $row['matkhau']) {
            if ($matkhau != $row['matkhau']) {
                echo "Mật khẩu không đúng!";
            } 
            exit;
        } elseif ($row['banned'] == 1) {
            echo "Tài khoản của bạn đã bị cấm!";
            exit;
        } else {
            if (strtolower($row['role']) === "admin" || strtolower($row['role']) === "support") {
                $thanhdieudb->query("UPDATE users SET verify_tick = '$verify_tick', ip = '$ip' WHERE taikhoan = '$taikhoan'");
                $_SESSION['taikhoan'] = $taikhoan;
                echo "success";
                exit;
            } else {
                echo "Bạn không đủ quyền hạn để vào trang admin!";
                exit;
            }
        }
    } else {
      //  echo "Error: " . $thanhdieudb->error;
      echo "Đã xảy ra lỗi...liên hệ với quản trị viên để biết chi tiết";
        exit;
    }
}
}
?>