<?php
include_once 'model/pdo.php';
// session_start();  // Khởi tạo session nếu chưa có
if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    // Kết nối CSDL
    $conn = pdo_get_connection();
    $sql = "SELECT * FROM users WHERE email = :email"; // Sử dụng prepared statement để bảo mật hơn
    $query = $conn->prepare($sql);
    $query->bindParam(':email', $email);
    $query->execute();
    $data = $query->fetch(PDO::FETCH_ASSOC);

    // Kiểm tra email có tồn tại
    if ($data) {
        // So sánh mật khẩu trực tiếp
        if ($pass == $data['pass']) {
            // Lưu thông tin user vào session
            $_SESSION['user'] = $data;
            header('location:index.php');
            exit();
        } else {
            $error = "Sai mật khẩu";
        }
    } else {
        $error = "Email không tồn tại";
    }
}
?>

<body>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white text-center">
                        <h4 class="mb-0">ĐĂNG NHẬP</h4>
                    </div>
                    <div class="card-body">
                        <form action="index.php?act=dangnhapuser" method="POST">
                            <?php if (isset($error)) {
                                echo "<p class='text-danger'>$error</p>";
                            } ?>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Nhập email" required>
                            </div>

                            <div class="mb-3">
                                <label for="pass" class="form-label">Mật khẩu</label>
                                <input type="password" name="pass" id="pass" class="form-control" placeholder="Nhập mật khẩu" required>
                            </div>

                            <div class="d-grid">
                                <button type="submit" name="dangnhap" class="btn btn-success">ĐĂNG NHẬP</button>
                            </div>

                            <p class="text-center mt-3">Nếu bạn chưa có tài khoản? <a href="index.php?act=dangky">Đăng ký tại đây</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>