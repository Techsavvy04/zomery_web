<?php
require_once('../conf/conn.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sua_binhluan'])) {
    $query = "SELECT `role` FROM users WHERE taikhoan = '$taikhoan'";
    $result = mysqli_query($thanhdieudb, $query);
    if ($result) {
        $user_data = mysqli_fetch_assoc($result);
        $check_admin = $user_data['role'];
        if (strtolower($check_admin) !== 'admin') {
            echo "Bạn không có đủ quyền hạn thực hiện thay đổi thông tin hồ sơ này!";
        } else {
            $id_cmt = mysqli_real_escape_string($thanhdieudb, $_POST["id_cmt"]);
            $sua_avatar = mysqli_real_escape_string($thanhdieudb, $_POST["sua_avatar"]) ?? $avatar;
            $sua_hovaten = mysqli_real_escape_string($thanhdieudb, $_POST["sua_hovaten"]);
            $sua_noidung = mysqli_real_escape_string($thanhdieudb, $_POST["sua_noidung"]);
            if (strpos($sua_avatar, '<script') !== false || 
             strpos($sua_hovaten, '<script') !== false || 
             strpos($sua_noidung, '<script') !== false) {
             echo "Chú em tuổi deface web anh?!";
             exit();
            } else {
            if (empty($sua_hovaten) || empty($sua_noidung)) {
                echo "Hãy đảm bảo rằng bạn không để trống mục nào!";
            } else {
                if (!CheckImage($sua_avatar)) {
                    echo 'Link ảnh không đúng định dạng, chỉ chấp nhận .jpg .png .gif .webp';
                    exit();
                } else {
                    $query_update = "UPDATE `comments` SET 
                    `avatar`= '$sua_avatar',
                    `hovaten`= '$sua_hovaten',
                    `noidung`= '$sua_noidung'
                    WHERE `comment_id` = '$id_cmt'";
                    $result_update = mysqli_query($thanhdieudb, $query_update);
                    if ($result_update) {
                        echo "Chỉnh sửa thông tin bình luận thành công!";
                    } else {
                        echo "Lỗi khi cập nhật bình luận!";
                    }
                }
        }
    }
}
    } else {
        echo "Lỗi khi thay đổi bình luận!";
    }
} else {
    echo "Liên hệ thanhdieutv";
}
?>
