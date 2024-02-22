<?php
require_once('../conf/conn.php');

if (isset($_POST['setting_save'])) {
    $set_bg = mysqli_real_escape_string($thanhdieudb, $_POST['set_bg']);
    $set_title = mysqli_real_escape_string($thanhdieudb, $_POST['set_title']);
    $set_timelove = mysqli_real_escape_string($thanhdieudb, $_POST['set_mode_love']);
    $set_description = mysqli_real_escape_string($thanhdieudb, $_POST['set_description']);
    $set_logo = mysqli_real_escape_string($thanhdieudb, $_POST['set_logo']);
    $set_keywords = mysqli_real_escape_string($thanhdieudb, $_POST['set_keywords']);
    $set_blackip = mysqli_real_escape_string($thanhdieudb, $_POST['set_blackip']);
    $set_usercmt = mysqli_real_escape_string($thanhdieudb, $_POST['set_usercmt']);
    $set_author = mysqli_real_escape_string($thanhdieudb, $_POST['set_author']);
    $set_footer = mysqli_real_escape_string($thanhdieudb, $_POST['set_footer']);
    $modal_on_off = mysqli_real_escape_string($thanhdieudb, $_POST['modal_on_off']);
    $modal_title = mysqli_real_escape_string($thanhdieudb, $_POST['modal_title']);
    $modal_content = mysqli_real_escape_string($thanhdieudb, $_POST['modal_content']);
    $set_baotri = mysqli_real_escape_string($thanhdieudb, $_POST['baotri_site']);
    $update_query = "UPDATE `setting` SET 
        `background`= '$set_bg',
        `mode_timelove`= '$set_timelove',
        `title`= '$set_title',
        `description` = '$set_description',
        `logo` = '$set_logo',
        `keywords` = '$set_keywords',
        `blackip` = '$set_blackip',
        `user_cmt` = '$set_usercmt',
        `author` = '$set_author',
        `modal_on_off` = '$modal_on_off',
        `modal_title` = '$modal_title',
        `modal_content` = '$modal_content',
        `footer` = '$set_footer',
        `baotri` = '$set_baotri'
    ";
    $update_result = mysqli_query($thanhdieudb, $update_query);
    if ($update_result) {
        echo 'Lưu thông tin thành công';
    } else {
        echo 'Lỗi Máy Chủ Khi Thực Thi: ' . mysqli_error($thanhdieudb);
    }
} else {
    echo "Phiên đã hết hạn vui lòng đăng nhập lại!";
    exit();
}
?>
