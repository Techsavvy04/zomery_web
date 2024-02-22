<?php
$title_cmt='Quản lý bình luận';
include 'partials/head.php';
?>
<!--<div class="modal" id="modal-store" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-top" role="document">
        <div class="modal-content">
            <div class="block block-rounded shadow-none mb-0">
                <div class="block-header block-header-default">
                    <h3 class="block-title" id="modal-title">Sửa đổi thông tin bình luận</h3>
                </div>
                <div class="block-content fs-sm">
                    <form class="form-horizontal" id="form-store">
                        <input type="hidden" name="action" id="action" />
                        <input type="hidden" name="id" id="id" />
                        <div class="mb-4">
                            <label class="form-label">Tên bình luận</label>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Loại tệp</label>
                            <input type="text" class="form-control" name="type" id="type">
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Kích thước bình luận</label>
                            <input type="text" class="form-control" name="size" id="size" disabled>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Tệp MD5</label>
                            <input type="text" class="form-control" name="hash" id="hash" disabled>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Có nên ẩn không</label>
                            <select name="hide" id="hide" class="form-select form-control">
                                <option value="0">Không</option>
                                <option value="1">Có</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Thêm mật khẩu</label>
                            <select name="ispwd" id="ispwd" class="form-select form-control"
                                onchange="change_ispwd(this)">
                                <option value="0">Không</option>
                                <option value="1">Có</option>
                            </select>
                        </div>
                        <div class="mb-4" id="pwd_frame">
                            <label class="form-label">Thêm mật khẩu</label>
                            <input type="text" class="form-control" name="pwd" id="pwd"
                                placeholder="Thêm mật khẩu tải xuống">
                        </div>
                    </form>
                </div>
                <div class="block-content block-content-full block-content-sm text-end border-top">
                    <button class="btn btn-alt-secondary" id="store" onclick="save()">Lưu thay đổi</button>
                    <button type="button" class="btn btn-alt-secondary" data-bs-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
</div>-->
<div id="pjax-container">
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
                <div class="flex-grow-1">
                    <h1 class="h3 fw-bold mb-2">
                        <?php echo $title_cmt ?>
                    </h1>
                </div>
                <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="./index.php">Trang Chủ</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            <?php echo $title_cmt ?>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title"> Danh sách bình luận </h3>
                <div class="block-options">
                    <button type="button" onclick="" class="btn-block-option" data-toggle="block-option"
                        data-action="state_toggle" data-action-mode="demo">
                        <i class="si si-refresh"></i>
                    </button>
                </div>
            </div>
            <div class="block-content block-content-full">
                <link rel="stylesheet" id="css-main" href="../assets/css/bootstrap-table.css">
                <form onsubmit="return searchSubmit()" method="GET" class="form-inline" id="searchToolbar">
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn btn-sm btn-alt-secondary" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="d-sm-none">Hoạt động hàng loạt</span>
                            <span class="d-none d-sm-inline-block fw-semibold">Hoạt động hàng loạt</span>
                            <i class="fa fa-align-left opacity-50 ms-1"></i>
                        </button>
                        <div class="dropdown-menu fs-sm" aria-labelledby="dropdown-content-rich-primary"
                            data-popper-placement="bottom-start">
                            <a class="dropdown-item" href="javascript:operation()">Xóa bỏ tất cả</a>
                        </div>
                    </div>
                </form>
                <table class="text-center" id="listTable" border="1" data-toggle="table" data-search="true"
                    data-show-columns="true">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tài Khoản</th>
                            <th>Nick Name</th>
                            <th>Nội Dung</th>
                            <th>Ngày Bình Luận</th>
                            <th>Trạng Thái</th>
                            <th>Thao Tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
        $showcmt = "SELECT * FROM comments ORDER BY ngaybinhluan";
        $result_cmt = $thanhdieudb->query($showcmt);
        if ($result_cmt === false) {
            echo "Error: " . $thanhdieudb->error;
        } else {
            if ($result_cmt->num_rows > 0) {
                while ($row = $result_cmt->fetch_assoc()) {
        ?>
                        <tr>
                            <td><?= $row['comment_id']; ?></td>
                            <td><?= $row['taikhoan']; ?></td>
                            <td><?= htmlspecialchars($row['hovaten']); ?></td>
							<td class="hi1" style="word-wrap: break-word; max-width: 200px;"><?= htmlspecialchars($row['noidung'])?></td>
                            <td><?= date('H:i:s, d-m-Y', strtotime($row["ngaybinhluan"])) ?></td>
                            <td>
                                <?php if ($row['banned'] == '1') { ?>
                                <div class="btn-group">
                                    <a class="btn btn-xs btn-danger banned_cmts" title="Nhấn để mở khóa"
                                        data-toggle="tooltip" data-id="<?= $row['comment_id']; ?>">Đang bị khóa</a>
                                </div>
                                <?php } else { ?>
                                <div class="btn-group">
                                    <a class="btn btn-xs btn-success banned_cmts" title="Nhấn để khóa"
                                        data-toggle="tooltip" data-id="<?= $row['comment_id']; ?>">Hoạt động</a>
                                </div>
                                <?php } ?>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-xs btn-default td_edit" href="sua_comment.php?id=<?= $row['comment_id']; ?>"
                                        title="Chỉnh sửa" data-toggle="tooltip"><i class="fa fa-pencil"></i></a>&ensp;
                                    <a class="btn btn-xs btn-default delete-link" data-id="<?= $row['comment_id']; ?>"
                                        data-toggle="tooltip" title="Xóa link cọc" onclick="XoaBinhLuan(this)"><i
                                            class="fa fa-window-close"></i></a>
                                </div>
                            </td>
                        </tr>
                        <?php
                }
            } else {
                echo '<tr><td colspan="7">Chưa có dữ liệu</td></tr>';
            }
        }
        ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    updateToolbar();
    const defaultPageSize = 7;
    const pageNumber = typeof window.$_GET['pageNumber'] != 'undefined' ? parseInt(window.$_GET['pageNumber']) :
        1;
    const pageSize = typeof window.$_GET['pageSize'] != 'undefined' ? parseInt(window.$_GET['pageSize']) :
        defaultPageSize;
    $("#listTable").bootstrapTable({
        pageNumber: pageNumber,
        pageSize: pageSize,
        showJumpTo: false,
        paginationDetailHAlign: 'right',
        paginationHAlign: 'left',
        paginationVAlign: 'bottom',
        sidePagination: "server",
        buttonsClass: 'light btn-dim btn-sm',
        showButtonText: false,
        pageList: [15, 25, 50, 100],
        searchHighlight: true,
        classes: 'table table-striped table-hover table-bordered'
    })
})
</script>
<?php include 'partials/foot.php';?>