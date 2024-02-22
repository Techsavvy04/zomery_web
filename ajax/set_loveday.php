<?php
include '../conf/conn.php';
if (isset($_POST['save_boy'])) {
    $tenban = $_POST['yourname'];
    $avatarboy = $_POST['avatarboy'];
    $cunghoangdao_boy = $_POST['zodiac'];
    $ngayhenho = trim($_POST['timelove']);   
    $timestamp = strtotime($ngayhenho);
    $titlelove = $_POST['titlelove'];
    $theme_rela_white = isset($_POST['theme_rela_white']) && $_POST['theme_rela_white'] === '1' ? 1 : 0;
    $effect_fall = $_POST['effect_fall'];
    $music = $_POST['music'];
    $music = trim($music);    
    if ($timestamp === false) {
        echo 'Ngày tháng không hợp lệ';
    } else {
        $namhenho__ = date('Y', $timestamp);
        $namhientai__ = date('Y');
        if ($namhenho__ > $namhientai__) {
            echo 'Năm hẹn hò vượt quá năm hiện tại';
        } else if (empty($tenban) || empty($avatarboy) || empty($cunghoangdao_boy) || empty($ngayhenho)) {
        echo "Vui lòng điền đầy đủ thông tin";
    } else if (!CheckImage($avatarboy)) {
        echo "Link ảnh không hợp lệ. Định dạng cho phép .jpg .png .gif v.v.v";
    } else if (!CheckDateRela($ngayhenho)) {
        echo "Ngày hẹn hò không hợp lệ, phải là 01-01-2023.";
    } else if (!CheckName($tenban)) {
        echo "Tên chỉ cho phép dưới 12 chữ cái!<br>Nếu tên dài quá, hãy viết tắt tên.<br/>Hoặc sử dụng nickname biệt danh.";
    } else {
        if (!CheckMusic($music)) {
            echo "Link nhạc hoặc phân tách không hợp lệ.";
            return;
        }
        $sql_boy = "UPDATE love_setting SET tenban='$tenban', avatarboy='$avatarboy', cunghoangdao_boy='$cunghoangdao_boy', ngayhenho='$ngayhenho', titlelove='$titlelove',
         themerela='$theme_rela_white', effect_fall='$effect_fall', music='$music'";
        if ($thanhdieudb->query($sql_boy) === TRUE) {
            echo "Lưu thông tin thành công";
        } else {
            echo "Lỗi: " . $thanhdieudb->error;
        }
    }
}
} else if (isset($_POST['save_girl'])) {
    $tennguoiay = $_POST['namegirl'];
    $avatargirl = $_POST['avatargirl'];
    $cunghoangdao_girl = $_POST['zodiacgirl'];
    if (empty($tennguoiay) || empty($avatargirl) || empty($cunghoangdao_girl)) {
        echo "Vui lòng điền đầy đủ thông tin";
    } else if (!CheckImage($avatargirl)) {
        echo "Link ảnh không hợp lệ. định dạng .jpg, .png, .gif v.v.v";
    } else if (!CheckDateRela($ngayhenho)) {
        echo "Ngày hẹn hò không hợp lệ, phải là 01-01-2023.";
    } else if (!CheckName($tennguoiay)) {
        echo "Tên chỉ cho phép dưới 15 chữ cái!";
    } else {
        $sql_girl = "UPDATE love_setting SET tennguoiay='$tennguoiay',avatargirl='$avatargirl', cunghoangdao_girl='$cunghoangdao_girl'";
        if ($thanhdieudb->query($sql_girl) === TRUE) {
            echo "Lưu thông tin thành công";
        } else {
            echo "Lỗi: " . $thanhdieudb->error;
        }
    }
} else {
    echo "Phiên đã hết hạn, vui lòng đăng nhập lại!";
}
?>
