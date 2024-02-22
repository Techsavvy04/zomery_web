<?php include 'partials/head.php'; ?>
<?php
$title_suacmt = "Chỉnh Sửa Profile";
?>
<div id="pjax-container">
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
                <div class="flex-grow-1">
                    <h1 class="h3 fw-bold mb-2">
                        <?php echo $title_suacmt ?>
                    </h1>
                </div>
                <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="./index.php">Trang Chủ</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            Sửa bình luận
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="content animated fadeIn">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title"> Sửa bình luận </h3>
                <div class="block-options">
                    <button type="button" onclick="" class="btn-block-option" data-toggle="block-option"
                        data-action="state_toggle" data-action-mode="demo">
                        <i class="si si-refresh"></i>
                    </button>
                </div>
            </div>
            <?php 
if (isset($_GET['id'])) {
    $id_cmt = $_GET['id'];
}
$fuck_thanhdieuuu = mysqli_query($thanhdieudb, "SELECT * FROM `comments` WHERE `comment_id` = '" . $id_cmt . "' ");
if (!$fuck_thanhdieuuu) {
    die('Query failed: ' . mysqli_error($thanhdieudb));
}
if(mysqli_num_rows($fuck_thanhdieuuu) == 0) {
    header('Location: set_comments.php');
    exit();
}
while ($row = mysqli_fetch_array($fuck_thanhdieuuu)) {?>
            <div class="block-content">
                <form method="post" id="td-sua-binhluan" class="form-horizontal" role="form">
                    <input type="hidden" id="id_cmt" name="id_cmt" value="<?=$id_cmt?>">
                    <div class="mb-4">
                        <img src="<?=htmlspecialchars($row['avatar'])?>"
                            style="height:100px;width:100px;border-radius:50%;box-shadow:0 0 10px black;object-fit:cover;">
                        <input style="margin-top:17px;" type="url" value="<?=htmlspecialchars($row['avatar'])?>"
                            class="form-control form-control-lg" id="sua_avatar" name="sua_avatar"
                            placeholder="Up ảnh lấy link rồi dán vào đây">
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="sua_hovaten"><b>Sửa Nickname</b></label>
                        <input type="text" rows="3" class="form-control form-control-lg" id="sua_hovaten"
                            name="sua_hovaten" value="<?=htmlspecialchars($row['hovaten']);?>">
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="sua_noidung"><b>Sửa Bình Luận</b></label>
                        <textarea rows="3" class="form-control form-control-lg" id="sua_noidung"
                            name="sua_noidung"><?=htmlspecialchars($row['noidung']);?></textarea>
                    </div>
                    <div class="mb-4">
                        <button type="submit" id="sua_binhluan" name="sua_binhluan" class="btn btn-primary">
                            <i class="fa fa-check opacity-50 me-1"></i> <b>Lưu lại</b>
                        </button>
                        <button onclick="window.history.back();" type="button" class="btn btn-default">
                            <b>Quay lại</b>
                        </button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php }?>
<?php include 'partials/foot.php';?>