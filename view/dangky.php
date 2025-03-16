<?php
include_once 'model/pdo.php';

if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $Rpass = $_POST['Rpass'];
    $address = $_POST['address']; // Thêm trường địa chỉ
    $tel = $_POST['tel']; // Thêm trường số điện thoại
    $err = [];  // Khởi tạo mảng lỗi

    // Kiểm tra các trường nhập vào
    if (empty($name)) {
        $err['name'] = 'Bạn chưa nhập tên';
    }
    if (empty($email)) {
        $err['email'] = 'Bạn chưa nhập email';
    }
    if (empty($pass)) {
        $err['pass'] = 'Bạn chưa nhập mật khẩu';
    }
    if ($pass != $Rpass) {
        $err['Rpass'] = 'Mật khẩu nhập lại không khớp';
    }
    if (empty($address)) {
        $err['address'] = 'Bạn chưa nhập địa chỉ';
    }
    if (empty($tel)) {
        $err['tel'] = 'Bạn chưa nhập số điện thoại';
    }

    // Nếu không có lỗi, thực hiện chèn vào cơ sở dữ liệu
    if (empty($err)) {
        try {
            // Kết nối cơ sở dữ liệu
            $conn = pdo_get_connection();

            // Chèn người dùng mới với địa chỉ và số điện thoại, không mã hóa mật khẩu
            $stmt = $conn->prepare("INSERT INTO users (name, email, pass, address, tel) VALUES (?, ?, ?, ?, ?)");
            if ($stmt->execute([$name, $email, $pass, $address, $tel])) {
                echo "Đăng ký thành công!";
            } else {
                echo "Đăng ký thất bại. Vui lòng thử lại!";
            }
        } catch (PDOException $e) {
            echo "Lỗi kết nối cơ sở dữ liệu: " . $e->getMessage();
        }
    }
}
?>
<body>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white text-center">
                        <h4 class="mb-0">ĐĂNG KÝ</h4>
                    </div>
                    <div class="card-body">
                        <form action="index.php?act=dangky" method="POST">
                            <div class="mb-3">
                                <label for="name" class="form-label">Họ tên</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Nhập họ tên" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Nhập email" required>
                            </div>

                            <div class="mb-3">
                                <label for="pass" class="form-label">Mật khẩu</label>
                                <input type="password" name="pass" id="pass" class="form-control" placeholder="Nhập mật khẩu" required>
                            </div>

                            <div class="mb-3">
                                <label for="Rpass" class="form-label">Nhập lại mật khẩu</label>
                                <input type="password" name="Rpass" id="Rpass" class="form-control" placeholder="Nhập lại mật khẩu" required>
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label">Địa chỉ</label>
                                <input type="text" name="address" id="address" class="form-control" placeholder="Nhập địa chỉ" required>
                            </div>

                            <div class="mb-3">
                                <label for="tel" class="form-label">Số điện thoại</label>
                                <input type="tel" name="tel" id="tel" class="form-control" placeholder="Nhập số điện thoại" required>
                            </div>

                            <div class="d-grid">
                                <button type="submit" name="dangky" class="btn btn-success">ĐĂNG KÝ</button>
                            </div>

                            <p class="text-center mt-3">Nếu bạn đã có tài khoản? <a href="index.php?act=dangnhapuser">Đăng nhập tại đây</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>