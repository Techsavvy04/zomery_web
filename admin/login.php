<?php include '../conf/conn.php';?>
<?php if (file_exists('../install.lock')) { $installLockContent = file_get_contents('../install.lock'); if (trim($installLockContent) === 'thanhdieulove=true') { } else { header('Location: ../install/'); exit(); } } else { header('Location: ../install/'); exit(); }?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Đăng Nhập Dashboard</title>
    <meta name="description" content="Đăng nhập trang quản trị - bảng điều khiển">
    <link rel="shortcut icon" href="https://i.imgur.com/Z9S96Sm.png" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="shortcut icon" href="../assets/media/favicon.png" type="image/x-icon">
    <link rel="stylesheet" id="css-main" href="../assets/oneui/css/oneui.min-5.6.css">
</head>
<body>
    <div id="page-container">
        <main id="main-container">
            <div class="hero-static d-flex align-items-center">
                <div class="content">
                    <div class="row justify-content-center push">
                        <div class="col-md-8 col-lg-6 col-xl-4">
                            <div class="block block-rounded mb-0">
                                <div class="block-content">
                                    <div class="p-sm-3 px-lg-4 px-xxl-5 py-lg-5">
                                        <h1 class="h2 mb-1">Login Dashboard</h1>
                                        <p class="fw-medium text-muted">
                                            Chào mừng bạn đăng nhập, hôm nay là một ngày tốt lành
                                        </p>
                                        <form class="js-validation-signin" id="login_td" method="POST">
                                            <div class="py-3">
                                                <div class="mb-4">
                                                    <input type="text"
                                                        class="form-control form-control-alt form-control-lg"
                                                        id="taikhoan" name="taikhoan" placeholder="Tài khoản">
                                                </div>
                                                <div class="mb-4">
                                                    <input type="password"
                                                        class="form-control form-control-alt form-control-lg"
                                                        id="matkhau" name="matkhau" placeholder="Mật khẩu"
                                                        autocomplete>
                                                </div>
                                                <div class="mb-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="login-remember" name="login-remember">
                                                        <label class="form-check-label fs-sm" for="login-remember">Ghi
                                                            nhớ tôi</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-md-6 col-xl-5">
                                                    <button type="submit" id="submit" name="dangnhap" class="btn w-100 btn-alt-primary">
                                                        <i class="fa fa-fw fa-sign-in-alt me-1 opacity-50"></i> Đăng
                                                        Nhập
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="fs-sm text-muted text-center">
                        <strong>Copyright</strong> © <span data-toggle="year-copy" class="js-year-copy-enabled">ThanhDieu.Com 2023</span>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <!-- jquery -->
    <script src="../assets/oneui/js/lib/jquery.min.js"></script>
    <script src="https://cdn.bootcdn.net/ajax/libs/jquery.pjax/2.0.1/jquery.pjax.min.js"></script>
    <script src="https://lf9-cdn-tos.bytecdntp.com/cdn/expire-0-M/nprogress/0.2.0/nprogress.min.js"></script>
    <script src="../assets/oneui/js/lib/layer.min.js"></script>
    <script src="../assets/oneui/js/oneui.app.min-5.6.js"></script>
    <script src="../assets/oneui/js/plugins/chart.js/chart.min.js"></script>
    <script src="../assets/oneui/js/plugins/bootstrap-notify/bootstrap-notify.min.js"></script>
    <script src="../assets/js/custom.js"></script>
</body>
</html>