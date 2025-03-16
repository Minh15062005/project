<?php
// Lấy thông tin người dùng
if (isset($_GET['id']) && ($_GET['id'] > 0)) {
    $user = load_user_by_id($_GET['id']);
} else {
    // Nếu không có ID người dùng, chuyển hướng về trang quản lý người dùng
    header("Location: index.php?act=quanliuser");
    exit();
}
?>

<div class="container mt-4">
    <h2 class="text-center">Sửa Người Dùng</h2>
    <form action="index.php?act=updateuser" method="POST">
        <input type="hidden" name="id" value="<?php echo $users['id']; ?>">
        <div class="mb-3">
            <label for="name" class="form-label">Tên</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $users['name']; ?>"
                required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $users['email']; ?>"
                required>
        </div>
        <div class="mb-3">
            <label for="pass" class="form-label">Mật Khẩu (để trống nếu không thay đổi)</label>
            <input type="password" class="form-control" id="pass" name="pass">
        </div>
        <button type="submit" name="capnhat" class="btn btn-primary">Cập nhật</button>
    </form>
</div>