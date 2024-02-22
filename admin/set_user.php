<?php
$title_user='Quản lý thành viên';
include 'partials/head.php';
?>
<div id="pjax-container">
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
                <div class="flex-grow-1">
                    <h1 class="h3 fw-bold mb-2">
                        <?php echo $title_user ?>
                    </h1>
                </div>
                <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="./index.php">Trang Chủ</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            <?php echo $title_user ?>
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
                            <th>Role</th>
                            <th>Ngày Tham Gia</th>
                            <th>Trạng Thái</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
        $showusers = "SELECT * FROM users ORDER BY ngaythamgia";
        $result_users = $thanhdieudb->query($showusers);
        if ($result_users === false) {
            echo "Error: " . $thanhdieudb->error;
        } else {
            if ($result_users->num_rows > 0) {
                while ($row = $result_users->fetch_assoc()) {
        ?>
                        <tr>
                            <td><?= $row['id']; ?></td>
                            <td><?= $row['taikhoan']; ?></td>
                            <td><?= $row['hovaten']; ?></td>
							<td><?= $row['role']; ?></td>
                            <td><?= date('d-m-Y', strtotime($row["ngaythamgia"])) ?></td>
                            <td>
                                <?php if ($row['banned'] == '1') { ?>
                                <div class="btn-group">
                                    <a class="btn btn-xs btn-danger"
                                        data-toggle="tooltip" data-id="<?= $row['comment_id']; ?>">Đang bị khóa</a>
                                </div>
                                <?php } else { ?>
                                <div class="btn-group">
                                    <a class="btn btn-xs btn-success" 
                                        data-toggle="tooltip">Hoạt động</a>
                                </div>
                                <?php } ?>
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