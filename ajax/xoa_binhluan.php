<?php
require_once('../conf/conn.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $query = "SELECT `role` FROM users WHERE taikhoan = '$taikhoan'";
    $result = mysqli_query($thanhdieudb, $query);
    if ($result) {
        $user_data = mysqli_fetch_assoc($result);
        $check_admin = $user_data['role'];
        if (strtolower($check_admin) !== 'admin') {
            echo "Bạn không có đủ tư cách để xóa bình luận này.";
        } else {
            $id = $_POST['id'];
            $deleteSql = "DELETE FROM comments WHERE comment_id = $id";

            if ($thanhdieudb->query($deleteSql) === TRUE) {
                $updateSql = "SET @num := 0;
                              UPDATE comments 
                              SET comment_id = @num := @num + 1;
                              ALTER TABLE comments AUTO_INCREMENT = 1;";
                              
                if ($thanhdieudb->multi_query($updateSql) === TRUE) {
                    echo "success";
                } else {
                    echo "Lỗi khi cập nhật số thứ tự: " . $thanhdieudb->error;
                }
            } else {
                echo "Lỗi khi xóa: " . $thanhdieudb->error;
            }
            $thanhdieudb->close();
        }
    } else {
        echo "Yêu cầu không hợp lệ";
    }
}
?>
