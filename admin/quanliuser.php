<?php
// Kết nối cơ sở dữ liệu và tải danh sách người dùng
$listuser = loadall_user();

// Xử lý xóa người dùng
if (isset($_GET['act']) && $_GET['act'] === 'deleteusers') {
    if (isset($_GET['id']) && ($_GET['id'] > 0)) {
        delete_users($_GET['id']); // Hàm xóa người dùng
    }
    $listuser = loadall_user(); // Tải lại danh sách người dùng
}
?>
<div class="container mt-4">
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="text-center text-primary">QUẢN LÝ NGƯỜI DÙNG</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-striped table-hover table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Email</th>
                        <th scope="col">Pass</th>
                        <th scope="col">Hành Động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($listuser as $users): ?>
                        <tr>
                            <td><?php echo $users['id'] !== null ? $users['id'] : ''; ?></td>
                            <td><?php echo $users['name'] !== null ? $users['name'] : ''; ?></td>
                            <td><?php echo $users['email'] !== null ? $users['email'] : ''; ?></td>
                            <td><?php echo $users['pass'] !== null ? $users['pass'] : ''; ?></td>
                            <td>
                                <a href="index.php?act=deleteusers&id=<?php echo $users['id']; ?>"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>