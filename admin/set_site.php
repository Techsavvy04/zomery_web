<?php
$title_web='Cài Đặt Website';
include 'partials/head.php';
?>
<div id="pjax-container">
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
                <div class="flex-grow-1">
                    <h1 class="h3 fw-bold mb-2">
                        <?php echo $title_web ?>
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
                <h3 class="block-title"> Cài đặt thông tin trang web </h3>
                <div class="block-options">
                    <button type="button" onclick="" class="btn-block-option" data-toggle="block-option"
                        data-action="state_toggle" data-action-mode="demo">
                        <i class="si si-refresh"></i>
                    </button>
                </div>
            </div>
            <div class="block-content">
                <form id="td-setting" method="post" class="form-horizontal">
                    <div class="mb-4">
                        <label class="form-label" for="setbg">Background Main</label>
                        <select name="set_bg" class="form-select" id="set_bg">
                            <option value="" <?= $bg_img == '' ? 'selected' : '' ?>>Background Default</option>
                            <option value="luffy" <?= $bg_img == 'luffy' ? 'selected' : '' ?>>Background Luffy</option>
                            <option value="together" <?= $bg_img == 'together' ? 'selected' : '' ?>>Background Together
                            </option>
                            <option value="megumi" <?= $bg_img == 'megumi' ? 'selected' : '' ?>>Background Megumi Black
                            </option>
                            <option value="tanjiro" <?= $bg_img == 'tanjiro' ? 'selected' : '' ?>>Background Tanjiro
                                Kamado</option>
                            <option value="rdanime" <?= $bg_img == 'rdanime' ? 'selected' : '' ?>>Background Random
                                Anime</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="set_mode_love">Chế Độ Điếm Ngày Yêu</label>
                        <select name="set_mode_love" class="form-select" id="set_mode_love" onchange="checkOption(this)">
                            <option value="macdinh" <?= $mode_love == 'macdinh' ? 'selected' : '' ?>>Mặc Định</option>
                            <option value="vongtron" <?= $mode_love == 'vongtron' ? 'selected' : '' ?>>Vòng Tròn Điếm
                                Ngày Yêu</option>
                            <option value="lich" <?= $mode_love == 'lich' ? 'selected' : '' ?>>Lịch Điếm Ngày Yêu V1
                            </option>
                            <option value="lich2" <?= $mode_love == 'lich2' ? 'selected' : '' ?>>Lịch Điếm Ngày Yêu V2
                            </option>
                            <option value="lich3" <?= $mode_love == 'lich3' ? 'selected' : '' ?>>Lịch Điếm Ngày Yêu V3
                            </option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="title"><b>Tiêu Đề Trang</b></label>
                        <input type="text" class="form-control form-control-lg" id="set_title" name="set_title"
                            value="<?=$title?>" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="keywords"><b>Từ Khóa</b></label>
                        <input type="text" class="form-control form-control-lg" id="set_keywords"
                            placeholder="Từ khóa phân tách bằng dấu chấm phẩy" name="set_keywords"
                            value="<?=$keywords?>">
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="logo"><b>Logo Website</b></label>
                        <input type="text" class="form-control form-control-lg" id="set_logo" name="set_logo"
                            value="<?=$logo?>">
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="description"><b>Miêu Tả Của Trang Web</b></label>
                        <input type="text" class="form-control form-control-lg" id="set_description"
                            name="set_description" value="<?=$description?>">
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="author"><b>Chủ Sở Hữu</b></label>
                        <input type="text" class="form-control form-control-lg" id="set_author"
                            placeholder="Tên chủ sở hữu" name="set_author" value="<?=$author?>">
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="blackip"><b>Thêm IP Blacklist</b></label>
                        <textarea type="text" class="form-control form-control-lg" id="set_blackip" name="set_blackip"
                            rows="2" placeholder="Thêm nhiều IP bằng cách phân tách |"><?=$blackip?></textarea>
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="footer"><b>Thêm Chân Trang</b></label>
                        <textarea type="text" class="form-control form-control-lg" id="set_footer" name="set_footer"
                            rows="3" placeholder="ThanhDieu.Com"><?=$footer?></textarea>
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="usercmt">Cho Phép Người Dùng Bình Luận</label>
                        <select name="set_usercmt" class="form-select" id="set_usercmt">
                            <option value="0" <?= $usercmt == 0 ? 'selected' : '' ?>>Không Cho Phép</option>
                            <option value="1" <?= $usercmt == 1 ? 'selected' : '' ?>>Cho Phép</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="modal_on_off">Cửa Sổ Bật Lên</label>
                        <select name="modal_on_off" class="form-select" id="modal_on_off">
                            <option value="off" <?= $modal_on_off == 'off' ? 'selected' : '' ?>>Tắt Modal</option>
                            <option value="on" <?= $modal_on_off == 'on' ? 'selected' : '' ?>>Bật Modal</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="baotri_site">Bảo Trì Website</label>
                        <select name="baotri_site" class="form-select" id="baotri_site">
                            <option value="off" <?= $baotri_site == 'off' ? 'selected' : '' ?>>Không Bảo Trì</option>
                            <option value="on" <?= $baotri_site == 'on' ? 'selected' : '' ?>>Bật Bảo Trì</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <button type="button" name="setting_save" id="setting_save" class="btn btn-primary">
                            <i class="fa fa-check opacity-50 me-1"></i> <b>Lưu các thiết lập</b>
                        </button>
                    </div>
                    <div class="modal fade" id="modal_select" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Cấu Hình Modal</h5>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="modal_title" class="col-form-label">Tiêu Đề</label>
                                        <input type="text" class="form-control" value="<?=$modal_title?>"
                                            id="modal_title">
                                    </div>
                                    <div class="form-group">
                                        <label for="modal_content" class="col-form-label">Nội Dung</label>
                                        <textarea rows="2" class="form-control"
                                            id="modal_content"><?=$modal_content?></textarea>
                                    </div>
                                    <input type="hidden" class="form-control" value="on" id="modal_on_off">
                                    <small>Sau khi bấm lưu lại, hãy bấm lưu các thiết lập để lưu thông tin modal.</small>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" id="closeModalBtn"
                                        class="btn btn-primary">Lưu Lại</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
function checkOption(selectElement) {
        var selectedValue = selectElement.value;
        if (selectedValue === 'lich') {
          layer.msg('Bảo trì chế độ điếm ngày yêu V1');
            selectElement.value = 'macdinh';
        }
    }
    </script>
<?php include 'partials/foot.php';?>