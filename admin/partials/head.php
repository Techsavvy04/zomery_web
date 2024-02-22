<?php
@header('Content-Type: text/html; charset=UTF-8');
include("../conf/conn.php");
$allowed_ranks = array('admin','support');
if (isset($_SESSION['taikhoan'])) {
    $taikhoan = $_SESSION['taikhoan'];
    $thdieuthongtin = "SELECT `role` FROM users WHERE taikhoan = '$taikhoan'";
    $thdieuresult = $thanhdieudb->query($thdieuthongtin);
    if ($thdieuresult) {
        $row = $thdieuresult->fetch_assoc();

        if ($row && in_array(strtolower($row['role']), array_map('strtolower', $allowed_ranks))) {
            $taikhoan = $_SESSION['taikhoan'];
        } else {
            session_destroy();
            header("Location: login.php");
            exit();
        }
        
        $thdieuresult->free();
    } else {
        session_destroy();
        header("Location: login.php");
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}
?>
<?php if (file_exists('../install.lock')) { $installLockContent = file_get_contents('../install.lock'); if (trim($installLockContent) === 'thanhdieulove=true') { } else { header('Location: ../install/'); exit(); } } else { header('Location: ../install/'); exit(); }?>
<!DOCTYPE html>
<html lang="vi-VN">
<head>
    <meta charset="utf-8">
    <meta name="author" content="<?=$author?>">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Trang Quản Trị | Admin Manager</title>
    <link rel="shortcut icon" href="../assets/oneui/media/favicon.jpg" type="image/x-icon">
    <link rel="stylesheet" id="css-main" href="../assets/oneui/css/oneui.min-5.6.css">
    <link rel="stylesheet" href="../assets/oneui/js/plugins/magnific-popup/magnific-popup.css">
    <link rel="stylesheet" id="css-main" href="../assets/oneui/css/nprogress.min.css">
    <script src="../assets/oneui/js/lib/jquery.min.js"></script>
    <script src="https://cdn.bootcdn.net/ajax/libs/jquery.pjax/2.0.1/jquery.pjax.min.js"></script>
    <script src="../assets/oneui/js/nprogress.min.js"></script>
    <script src="../assets/oneui/js/lib/layer.min.js"></script>
    <script src="../assets/oneui/js/oneui.app.min-5.6.js"></script>
    <script src="../assets/oneui/js/plugins/chart.js/chart.min.js"></script>
    <script src="../assets/oneui/js/plugins/bootstrap-notify/bootstrap-notify.min.js"></script>
    <script src="../assets/oneui/js/plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="../assets/oneui/js/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <link href="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.css" rel="stylesheet">
    <script src="../assets/oneui/js/bootstrap-table-123.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.18.3/extensions/filter-control/bootstrap-table-filter-control.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.18.3/extensions/filter-control/bootstrap-table-filter-control.js"></script>
    <style>
        .btn-xs {
            --bs-btn-padding-y: 0.125rem;
            --bs-btn-padding-x: 0.25rem;
            --bs-btn-font-size: 0.75rem;
            /*--bs-btn-border-radius: 0.125rem;*/
        }
        .table thead th {
            text-transform: none;
        }
        tbody, td, tfoot, th, thead, tr {
            border-color: inherit;
            border-style: none;
            border-width: 0;
        }
    </style>
</head>
<body>
    <div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-narrow side-trans-enabled">
 <?php include("partials/nav.php");?>
        <main id="main-container">