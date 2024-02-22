<?php
$title_web='Chỉnh Sửa Hẹn Hò';
?>
<?php include 'partials/head.php'; ?>
<div id="pjax-container">
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
                <div class="flex-grow-1">
                    <h1 class="h3 fw-bold mb-2">
                        <?=$title_web?>
                    </h1>
                </div>
                <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="./index.php">Trang Chủ</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            <?=$title_web?>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title"> Cài Đặt Hẹn Hò </h3>
            </div>
            <div class="block-content">
                <div class="row mb-4">
                    <div class="col-6">
                        <div class="form-check form-block">
                            <input class="form-check-input" type="radio" id="set_boyfriend" name="gender" checked>
                            <label class="form-check-label" for="set_boyfriend">
                                <span class="d-flex align-items-center">
                                    <img class="img-avatar img-avatar48" src="../assets/img/boy.png" />
                                    <span class="ms-2">
                                        <span class="fw-bold">Thông Tin Của Bạn</span>
                                        <span class="d-block fs-sm text-muted">Bạn có thể chỉnh sửa chính mình ở
                                            đây</span>
                                    </span>
                                </span>
                            </label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-check form-block">
                            <input class="form-check-input" type="radio" id="set_girlfriend" name="gender">
                            <label class="form-check-label" for="set_girlfriend">
                                <span class="d-flex align-items-center">
                                    <img class="img-avatar img-avatar48" src="../assets/img/girl.png" />
                                    <span class="ms-2">
                                        <span class="fw-bold">Thông Tin Của Ny Bạn</span>
                                        <span class="d-block fs-sm text-muted">Bạn có thể chỉnh sửa người yêu mình ở
                                            đây</span>
                                    </span>
                                </span>
                            </label>
                        </div>
                    </div>
                </div>
                <!-- SET BOY FRIENDS-->
                <form id="__td-boy" method="post">
                    <div class="boy-config" style="display: block;">
                        <h2 class="content-heading border-bottom mb-2 pb-1 text-dark" style="padding: 0">Cấu Hình Bạn
                            Nam
                        </h2>
                        <div class="form-group mb-2">
                            <label class="form-label fs-sm text-muted" for="thanhdieu">Tên Bạn</label>
                            <input type="text" name="yourname" id="yourname" value="<?=$tenban?>" class="form-control"
                                placeholder="Tên của bạn" />
                        </div>
                        <div class="form-group mb-2">
                            <label class="form-label fs-sm text-muted" for="thanhdieu">Ảnh Đại Diện</label>
                            <input type="text" name="avatarboy" id="avatarboy" value="<?=$avatarboy?>"
                                class="form-control" placeholder="Link ảnh đại diện của bạn" />
                        </div>
                        <div class="form-group mb-2">
                            <label class="form-label fs-sm text-muted" for="thanhdieu">Cung Hoàng Đạo</label>
                            <select id="zodiac" class="form-select" aria-label="Default select example" name="zodiac">
                                <?php
                             foreach ($zodiacs as $index => $zodiac) {
                            $selected = ($zodiac == $cunghoangdao_boy) ? 'selected' : '';
                            $tencunghoangdao = $zodiacs_name[$index];
                            echo "<option value='$zodiac' $selected>$tencunghoangdao</option>";
                            }
                            ?>
                            </select>
                        </div>
                        <hr>
                        <h2 class="content-heading border-bottom mb-2 pb-1 text-dark" style="padding: 0">Cấu Hình Chung
                        </h2>
                        <div class="form-group mb-2">
                            <label class="form-label fs-sm text-muted" for="thanhdieu">Ngày Hẹn Hò</label>
                            <input type="text" name="timelove" id="timelove"
                                value="<?= isset($ngayhenho) ? $ngayhenho : date('d-m-Y');?>" class="form-control"
                                placeholder="Ngày hẹn hò" />
                        </div>
                        <div class="form-group mb-2">
                            <label class="form-label fs-sm text-muted" for="thanhdieu">Tiêu Đề Hẹn Hò</label>
                            <input type="text" name="titlelove" id="titlelove" value="<?=$titlelove?>"
                                class="form-control" placeholder="Tiêu đề tình yêu, lãng mạn...." />
                        </div>
                        <div class="form-group mb-2">
                            <label class="form-label fs-sm text-muted" for="thanhdieu">Thêm Nhạc</label>
                            <textarea type="text" name="music" id="music" value="music" class="form-control" rows="3"
                                placeholder="Link nhạc mp3, thêm nhiều nhạc bằng cách phân tách bằng |"><?=$music?></textarea>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="theme-rela-white" value="1"
                                <?php echo $themerela == 1 ? 'checked' : ''; ?>>
                            <label class="form-label fs-sm text-muted" for="theme-rela-white">Nền Hẹn Hò Trắng ( Not Support Mobile )</label>
                        </div>
                        <hr>
                        <h2 class="content-heading border-bottom mb-2 pb-1 text-dark" style="padding: 0">Cấu Hình Hiệu
                            Ứng
                        </h2>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="effect_fall" id="tuyetroi"
                                value="tuyetroi" <?php echo $effect_fall === 'tuyetroi' ? 'checked' : ''; ?>>
                            <label class="form-label fs-sm text-muted" for="tuyetroi">Hiệu Ứng Tuyết Rơi</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="effect_fall" id="hoaroi" value="hoaroi"
                                <?php echo $effect_fall === 'hoaroi' ? 'checked' : ''; ?>>
                            <label class="form-label fs-sm text-muted" for="hoaroi">Hiệu Ứng Hoa Rơi</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="effect_fall" id="traitimroi"
                                value="traitimroi" <?php echo $effect_fall === 'traitimroi' ? 'checked' : ''; ?>>
                            <label class="form-label fs-sm text-muted" for="traitimroi">Hiệu Ứng Trái Tim Rơi</label>
                        </div>
                        <div class="row mb-4">
                            <div class="col-xl-12 mt-2">
                                <button type="submit" name="save_boy"
                                    class="btn btn-sm btn-alt-primary form-control">Lưu
                                    Thay Đổi</button>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- SET GIRL FRIENDS-->
                <form id="__td-girl" method="post">
                    <div class="girl-config" style="display: none;">
                        <h2 class="content-heading border-bottom mb-2 pb-1 text-dark" style="padding: 0">Cấu Hình Bạn Nữ
                        </h2>
                        <div class="form-group mb-2">
                            <label class="form-label fs-sm text-muted" for="thanhdieu">Tên Người Ấy</label>
                            <input type="text" name="namegirl" id="namegirl" value="<?=$tennguoiay?>"
                                class="form-control" placeholder="Tên của người ấy" />
                        </div>
                        <div class="form-group mb-2">
                            <label class="form-label fs-sm text-muted" for="thanhdieu">Ảnh Đại Diện</label>
                            <input type="text" name="avatargirl" id="avatargirl" value="<?=$avatargirl?>"
                                class="form-control" placeholder="Link ảnh đại diện của người ấy" />
                        </div>
                        <div class="form-group mb-2">
                            <label class="form-label fs-sm text-muted" for="thanhdieu">Cung Hoàng Đạo</label>
                            <select id="zodiacgirl" class="form-select" aria-label="Default select example"
                                name="zodiacgirl">
                                <?php
                             foreach ($zodiacs as $index => $zodiac) {
                            $selected = ($zodiac == $cunghoangdao_girl) ? 'selected' : '';
                            $tencunghoangdao = $zodiacs_name[$index];
                            echo "<option value='$zodiac' $selected>$tencunghoangdao</option>";
                            }
                            ?>
                            </select>
                        </div>
                        <div class="row mb-4">
                            <div class="col-xl-12 mt-2">
                                <button type="submit" name="save_girl"
                                    class="btn btn-sm btn-alt-primary form-control">Lưu
                                    Thay Đổi</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- END-->
        <?php include 'partials/foot.php'; ?>