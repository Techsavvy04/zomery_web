<?php include 'partials/head.php'; ?>
<div id="pjax-container">
    <div class="content animated fadeIn">
        <div class="d-flex flex-column flex-md-row justify-content-md-between align-items-md-center py-2 text-center text-md-start">
            <div class="flex-grow-1 mb-1 mb-md-0">
                <h1 class="h3 fw-bold mb-2">
                   Tại đây bạn có thể quản lý tất cả tính năng của website
                </h1>
                <h2 class="h6 fw-medium fw-medium text-muted mb-0">
                Chào mừng <a class="fw-semibold" href="javascript:void(0)"><?=$hovaten?></a>, mọi thứ trông thật tuyệt.
                </h2>
            </div>
            <div class="mt-3 mt-md-0 ms-md-3 space-x-1">
                <a class="btn btn-sm btn-alt-secondary space-x-1" data-pjax href="./set_comments.php">
                    <i class="fa fa-cloud opacity-50"></i>
                    <span>Danh sách tệp</span>
                </a>
                <a class="btn btn-sm btn-alt-secondary space-x-1" data-pjax href="./set_user.php">
                    <i class="fa fa-users opacity-50"></i>
                    <span>Danh sách người dùng</span>
                </a>
            </div>
        </div>
    </div>
    <div class="content animated fadeIn">
        <div class="row items-push">
            <div class="col-sm-12 col-xxl-12">
                <div class="block block-rounded d-flex flex-column h-100 mb-0">
                    <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                        <dl class="mb-0">
                            <dt class="fs-3 fw-bold"><span  id="current-time"></span></dt>
                            <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Giờ việt nam</dd>
                        </dl>
                        <div class="item item-rounded-lg bg-body-light">
                            <i class="fa fa-clock fs-3 text-primary"></i>
                        </div>
                    </div>
                    <div class="bg-body-light rounded-bottom">
                        <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between" data-pjax href="https://time.is/vi/Vietnam">
                            <span>Giờ hiện tại của Việt Nam</span>
                            <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xxl-3">
                <div class="block block-rounded d-flex flex-column h-100 mb-0">
                    <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                        <dl class="mb-0">
                            <dt class="fs-3 fw-bold" id="count1">100</dt>
                            <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Tổng số bình luận</dd>
                        </dl>
                        <div class="item item-rounded-lg bg-body-light">
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
                            <dt class="fs-3 fw-bold" id="count2">>100</dt>
                            <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Bình luận hôm nay</dd>
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
    <div class="content animated fadeIn">
        <div class="row">
            <div class="col-lg-12 mb-4">
                <div class="block block-rounded mb-0">
                    <div class="block-header block-header-default">
                        <h3 class="block-title"><b>Thông tin máy chủ</b></h3>
                        <div class="block-options">
                            <button type="button" onclick="" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content block-content-full" data-toggle="slimscroll" data-height="259px">
                        <div class="fw-medium fs-sm">
                            <div class="border-start border-4 rounded-2 border-primary mb-2">
                                <div class="rounded p-2 text-pulse-light">
                                    <ul class="list-group text-dark">
                                        <li class="list-group-item"><b>PHP Phiên bản: </b><?php echo phpversion() ?> <?php if(ini_get('safe_mode')) { echo 'An toàn'; } else { echo 'Không an toàn'; } ?></li>
                                        <li class="list-group-item"><b>MySQL Phiên bản: </b><?php echo $mysqlversion ?></li>
                                        <li class="list-group-item"><b> WEB Phần mềm: </b><?php echo $_SERVER['SERVER_SOFTWARE'] ?></li>
                                        <li class="list-group-item"><b>Giờ Máy Chủ: </b><?php echo date('H:i:s');?> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="block block-rounded mb-0">
                    <div class="block-header block-header-default">
                        <h3 class="block-title"><b>tin nhắn hệ thống 1</b></h3>
                        <div class="block-options">
                            <button type="button" onclick="" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content block-content-full" data-toggle="slimscroll" data-height="259px">
                        <div class="fw-medium fs-sm">
                            <div class="border-start border-4 rounded-2 border-primary mb-2">
                                <div class="rounded p-2 text-pulse-light">
                                <ul class="list-group text-dark">
                                    <li class="list-group-item"><font color="green">Bạn đang sử dụng phiên bản mới nhất!</font></li>
                                    <li class="list-group-item">Phiên bản hiện tại：V5.5 (Build 1531)</li>
                                    <li class="list-group-item">Powered by <a href="" target="_blank" rel="noopener noreferrer">ThanhDieu.Com</a>
                                    </li>
                                </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="block block-rounded mb-0">
                    <div class="block-header block-header-default">
                        <h3 class="block-title"><b>tin nhắn hệ thống 2</b></h3>
                        <div class="block-options">
                            <button type="button" onclick="" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content block-content-full" data-toggle="slimscroll" data-height="259px">
                        <div class="fw-medium fs-sm">
                            <div class="border-start border-4 rounded-2 border-primary mb-2">
                                <div class="rounded p-2 text-pulse-light">
                                <ul class="list-group text-dark">
                                    <li class="list-group-item"><font color="green">Bạn đang sử dụng phiên bản mới nhất!</font></li>
                                    <li class="list-group-item">Phiên bản hiện tại：V5.5 (Build 1531)</li>
                                    <li class="list-group-item">Powered by <a href="" target="_blank" rel="noopener noreferrer">ThanhDieu.Com</a>
                                    </li>
                                </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title"><b>Phím tắt </b></h3>
                        <div class="block-options">
                            <button type="button" onclick="" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <div class="block-content block-content-full">
                            <div class="py-3 text-center">
                                <div class="mb-3">
                                    <i class="fa fa-comments fa-4x text-primary"></i>
                                </div>
                                <div class="fs-4 fw-semibold">Quản trị comments</div>
                                <div class="pt-3">
                                    <a class="btn btn-alt-primary" href="./set_comments.php">
                                        <i class="fa fa-comments opacity-50 me-1"></i> <b>Danh sách bình luận</b>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title"><b>Phím tắt</b></h3>
                        <div class="block-options">
                            <button type="button" onclick="" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <div class="block-content block-content-full">
                            <div class="py-3 text-center">
                                <div class="mb-3">
                                    <i class="fa fa-users fa-4x text-primary"></i>
                                </div>
                                <div class="fs-4 fw-semibold">Quản trị danh sách người dùng</div>
                                <div class="pt-3">
                                    <a class="btn btn-alt-primary" href="./set_user.php">
                                        <i class="fa fa-users opacity-50 me-1"></i> <b>Danh sách người dùng</b>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'partials/foot.php';?>