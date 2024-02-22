<?php include 'partials/head.php'; ?>
<div id="pjax-container">
    <div class="content animated fadeIn">
        <div class="row items-push">
            <div class="col-sm-12 col-xxl-12">
                
            </div>
            <div class="col-sm-6 col-xxl-3">
                <div class="block block-rounded d-flex flex-column h-100 mb-0 border   border-bottom ">
                    <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                        <dl class="mb-0">
                            <dt class="fs-3 fw-bold" id="count1"><?=$tongcmt?></dt>
                            <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Tổng số lượt truy cập</dd>
                        </dl>
                        <div class="item item-rounded-lg bg-body-light border-info">
                            <i class="fa fa-comments fs-3 text-primary"></i>
                        </div>
                    </div>
                    <div class="bg-body-light rounded-bottom">
                        <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between" data-pjax href="./set_comments.php">
                            <span>Kiểm tra chi tiết</span>
                            <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xxl-3">
                <div class="block block-rounded d-flex flex-column h-100 mb-0">
                    <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                        <dl class="mb-0">
                            <dt class="fs-3 fw-bold" id="count2"><?=$cmthomnay?></dt>
                            <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Lượt truy c hôm nay</dd>
                        </dl>
                        <div class="item item-rounded-lg bg-body-light">
                            <i class="fa fa-comment fs-3 text-primary"></i>
                        </div>
                    </div>
                    <div class="bg-body-light rounded-bottom">
                        <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between" data-pjax href="./set_comments.php">
                            <span>Kiểm tra chi tiết</span>
                            <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xxl-3">
                <div class="block block-rounded d-flex flex-column h-100 mb-0">
                    <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                        <dl class="mb-0">
                            <dt class="fs-3 fw-bold" id="count3"><?=$tongbanned?></dt>
                            <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Danh Sách IP Bị Cấm</dd>
                        </dl>
                        <div class="item item-rounded-lg bg-body-light">
                            <i class="fa fa-ban fs-3 text-primary"></i>
                        </div>
                    </div>
                    <div class="bg-body-light rounded-bottom">
                        <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between" data-pjax href="./list_blackip.php">
                            <span>Kiểm tra chi tiết</span>
                            <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xxl-3">
                <div class="block block-rounded d-flex flex-column h-100 mb-0">
                    <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                        <dl class="mb-0">
                            <dt class="fs-3 fw-bold" id="count4"><?=$tongadmin?></dt>
                            <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Tổng số quản trị viên</dd>
                        </dl>
                        <div class="item item-rounded-lg bg-body-light">
                            <i class="fa fa-users fs-3 text-primary"></i>
                        </div>
                    </div>
                    <div class="bg-body-light rounded-bottom">
                        <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between" data-pjax href="./set_user.php">
                            <span>Kiểm tra chi tiết</span>
                            <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include 'partials/foot.php';?>