<?php
require_once('../conf/conn.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['taikhoan'])) {
        $query = "SELECT `role` FROM users WHERE taikhoan = '$taikhoan'";
        $result = mysqli_query($thanhdieudb, $query);

        if ($result) {
            $user_data = mysqli_fetch_assoc($result);
            $check_admin = $user_data['role'];
            
            if (strtolower($check_admin) !== 'admin') {
                echo json_encode(['status' => 'error', 'message' => 'Bạn không có đủ quyền hạn thực hiện khóa hồ sơ này!']);
            } else {
                if (isset($_POST['id'])) {
                    $id = $_POST['id'];
                    $banned = "UPDATE comments SET banned = 1 - banned WHERE comment_id = $id";
                    
                    if (mysqli_query($thanhdieudb, $banned)) {
                        $messages_status = mysqli_query($thanhdieudb, "SELECT banned FROM comments WHERE comment_id = $id")->fetch_assoc()['banned'];
                        $status_text = $messages_status === '1' ? 'Đang bị khóa' : 'Hoạt động';
                        echo json_encode(['status' => 'success', 'newStatus' => $messages_status, 'statusText' => $status_text]);
                        exit();
                    } else {
                        echo json_encode(['status' => 'error', 'message' => 'Lỗi khi cập nhật trạng thái banned: ' . mysqli_error($thanhdieudb)]);
                    }
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Yêu cầu không hợp lệ']);
                }
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Lỗi khi truy vấn cơ sở dữ liệu!']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Phiên không tồn tại hoặc hết hạn']);
        session_destroy();
    }
}
?>
