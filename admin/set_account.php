<?php include 'partials/head.php'; ?>
<?php
$titleaccount = "Chỉnh Sửa Profile";
?>
<div id="pjax-container">
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
                <div class="flex-grow-1">
                    <h1 class="h3 fw-bold mb-2">
                        <?php echo $titleaccount ?>
                    </h1>
                </div>
                <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="./index.php">Trang Chủ</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            Cài đặt hệ thống
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="content animated fadeIn">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title"> Cài đặt tài khoản quản trị viên </h3>
                <div class="block-options">
                    <button type="button" onclick="" class="btn-block-option" data-toggle="block-option"
                        data-action="state_toggle" data-action-mode="demo">
                        <i class="si si-refresh"></i>
                    </button>
                </div>
            </div>
            <div class="block-content">
            <form method="post" id="td-change-profile" class="form-horizontal" role="form" enctype="multipart/form-data">
                    <div class="mb-4">
                    <img id="avatarimg" src="<?=htmlspecialchars($avatar)?>"
                                style="height:100px;width:100px;border-radius:50%;box-shadow:0 0 10px black;object-fit:cover;">
                                <input style="margin-top:17px;" type="url" value="<?=htmlspecialchars($avatar)?>" class="form-control form-control-lg" id="avatarusers" name="avatarusers" placeholder="Up ảnh lấy link rồi dán vào đây">
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="nameadmin"><b>Họ Và Tên</b></label>
                        <input type="text" class="form-control form-control-lg" id="nameadmin" name="nameadmin"
                            value="<?=htmlspecialchars($hovaten)?>" placeholder="Nhập tên nick name">
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="oldpwd"><b>Mật khẩu cũ</b></label>
                        <input type="password" class="form-control form-control-lg" id="oldpwd" name="oldpwd" value=""
                            placeholder="Nhập mật khẩu hiện tại của bạn">
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="newpwd"><b>Mật khẩu mới</b></label>
                        <input type="password" class="form-control form-control-lg" id="newpwd" name="newpwd" value=""
                            placeholder="Mật khẩu mới">
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="newpwd2"><b>Nhập lại mật khẩu mới</b></label>
                        <input type="password" class="form-control form-control-lg" id="newpwd2" name="newpwd2" value=""
                            placeholder="Nhập lại mật khẩu mới">
                    </div>
                    <div class="mb-4">
                        <button type="submit" id="change_profile" name="change_profile" class="btn btn-primary">
                            <i class="fa fa-check opacity-50 me-1"></i> <b>Lưu lại</b>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'partials/foot.php';?>