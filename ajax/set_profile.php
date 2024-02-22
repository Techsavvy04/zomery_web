<?php
require_once('../conf/conn.php');
if (isset($_POST['change_profile'])) {
    $avatarusers = mysqli_real_escape_string($thanhdieudb, $_POST['avatarusers']);
    $nameadmin = mysqli_real_escape_string($thanhdieudb, $_POST['nameadmin']);
    $oldpwd = isset($_POST['oldpwd']) ? mysqli_real_escape_string($thanhdieudb, trim($_POST['oldpwd'])) : null;
    $newpwd = !empty($_POST['newpwd']) ? mysqli_real_escape_string($thanhdieudb, trim($_POST['newpwd'])) : null;
    $newpwd2 = !empty($_POST['newpwd2']) ? mysqli_real_escape_string($thanhdieudb, trim($_POST['newpwd2'])) : null;
    $nameadminaccents = str_replace(
        ['á', 'à', 'ả', 'ã', 'ạ', 'â', 'ấ', 'ầ', 'ẩ', 'ẫ', 'ậ', 'ă', 'ắ', 'ằ', 'ẳ', 'ẵ', 'ặ', 'đ', 'é', 'è', 'ẻ', 'ẽ', 'ẹ', 'ê', 'ế', 'ề', 'ể', 'ễ', 'ệ', 'í', 'ì', 'ỉ', 'ĩ', 'ị', 'ó', 'ò', 'ỏ', 'õ', 'ọ', 'ô', 'ố', 'ồ', 'ổ', 'ỗ', 'ộ', 'ơ', 'ớ', 'ờ', 'ở', 'ỡ', 'ợ', 'ú', 'ù', 'ủ', 'ũ', 'ụ', 'ư', 'ứ', 'ừ', 'ử', 'ữ', 'ự', 'ý', 'ỳ', 'ỷ', 'ỹ', 'ỵ'],
        ['a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'd', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'i', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'y', 'y', 'y', 'y', 'y'],
        $nameadmin
    );
    $avatartest = 'https://i.imgur.com/S78eT0P.png';
if (empty($avatarusers)) {
    $avatarusers = $avatartest;
} else {
    if (!CheckImage($avatarusers)) {
        echo 'Link ảnh không đúng định dạng, chỉ chấp nhận .jpg .png .gif .webp';
        exit();
    }
}
    if (mb_strlen($nameadmin, 'UTF-8') > 20) {
        echo 'Họ và tên không được vượt quá 20 ký tự.';
        exit();
    }
    if (!empty($oldpwd)) {
        $check_oldpwd_query = "SELECT * FROM `users` WHERE `taikhoan` = '$taikhoan' AND `matkhau` = '$oldpwd'";
        $check_oldpwd_result = mysqli_query($thanhdieudb, $check_oldpwd_query);

        if (!$check_oldpwd_result || mysqli_num_rows($check_oldpwd_result) == 0) {
            echo 'Mật khẩu cũ không đúng.';
            exit();
        }
    }
    if (!empty($newpwd)) {
        if (empty($oldpwd)) {
            echo 'Vui lòng nhập mật khẩu cũ để thay đổi mật khẩu mới.';
            exit();
        }
    } else {
    }
    if ($newpwd !== $newpwd2) {
        echo 'Mật khẩu nhập lại không khớp.';
        exit();
    }
if (!empty($newpwd)) {
    $update_profile = "UPDATE `users` SET 
        `avatar`= '$avatarusers',
        `matkhau` = '$newpwd2',
        `hovaten`= '$nameadmin'
        WHERE `taikhoan` = '$taikhoan'";
} else {
    $update_profile = "UPDATE `users` SET 
        `avatar`= '$avatarusers',
        `hovaten`= '$nameadmin'
        WHERE `taikhoan` = '$taikhoan'";
}

$update_result = mysqli_query($thanhdieudb, $update_profile);

    if ($update_result) {
        echo 'Thay đổi thông tin thành công';
    } else {
        echo 'Lỗi Máy Chủ Khi Thực Thi: ' . mysqli_error($thanhdieudb);
    }
} else {
    echo "Phiên đã hết hạn vui lòng đăng nhập lại!";
    exit();
}
?>
