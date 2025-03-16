<?php
ob_start();
session_start();
include "./model/user.php";
include "./model/pdo.php";
include "./model/sanpham.php";
include "./model/danhmuc.php";
include "./model/cart.php";
include "./view/header.php";
include "./global.php";

if (!isset($_SESSION['mycart'])) $_SESSION['mycart'] = [];
// Lấy danh sách tất cả sản phẩm mới hiển thị trên trang chủ.
$spnew = loadall_sanpham_home();
$dsdm = loadall_danhmuc();
$dstop10 = loadall_sanpham_top10();
if (isset($_GET['act']) && $_GET['act'] != "") {
    $act = $_GET['act'];
} else {
    $act = 'home';
}
switch ($act) {
    case 'sanpham':
        if (isset($_GET['iddm']) && $_GET['iddm']) {
            $iddm = $_GET['iddm'];
            $dssp = loadall_sanpham("", $iddm);
            // lấy danh sách sản phẩm có trg danh mục
            $tendm = loadone_ten_dm($iddm);
            // lấy tên danh mục
            include "./view/sanpham.php";
        }
        break;
    case 'sanphamct':
        if (isset($_GET['idsp']) && $_GET['idsp']) {
            $id = $_GET['idsp'];
            $onesp = loadone_sanpham($id);
            // extract($onesp);
            include "./view/sanphamct.php";
        } else {
            include "view/home.php";
        }
        break;
    case 'dangnhapuser':
        include "view/dangnhapuser.php";
        break;
    case 'dangky':
        if (isset($_POST['dangky']) && ($_POST['dangky'])) {
            $user = $_POST['name'];  // Thay đổi từ 'user' sang 'name' theo form
            $pass = $_POST['pass'];
            $email = $_POST['email'];
            $address = $_POST['address']; // Thêm địa chỉ
            $tel = $_POST['tel']; // Thêm số điện thoại

            // Kiểm tra xem tài khoản hoặc email đã tồn tại hay chưa
            $conn = pdo_get_connection();
            $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? OR name = ?");
            $stmt->execute([$email, $user]);
            $existingUser = $stmt->fetch();

            if ($existingUser) {
                $error = "Tài khoản hoặc email đã tồn tại!";
                include "view/dangky.php";
            } else {
                // Mã hóa mật khẩu trước khi lưu
                $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);
                $stmt = $conn->prepare("INSERT INTO users (name, email, pass, address, tel, role) VALUES (?, ?, ?, ?, ?, ?)");
                $role = 0; // Đặt vai trò cho người dùng

                if ($stmt->execute([$user, $email, $hashed_pass, $address, $tel, $role])) {
                    // Lưu thông tin người dùng vào session
                    $_SESSION['role'] = $role;
                    $_SESSION['iduser'] = $conn->lastInsertId(); // Lưu ID người dùng vừa tạo
                    $_SESSION['user'] = $user; // Lưu tên người dùng

                    header('Location: index.php');
                    exit(); // Không quên exit() để ngăn chặn việc thực thi mã tiếp theo
                } else {
                    $error = "Đăng ký thất bại. Vui lòng thử lại!";
                    include "view/dangky.php";
                }
            }
            break;
        }
        include "view/dangky.php";
        break;
    case 'timkiem':
        if (isset($_POST['search']) && $_POST['search']) {
            $search = $_POST['search'];
            //Lấy từ khóa người dùng nhập: Lưu vào biến $search.
            $rows = search_products($search);
            //Hàm này thực hiện truy vấn cơ sở dữ liệu để tìm kiếm sản phẩm.
            include "./view/tiemkiem.php"; // Hiển thị kết quả(Frontend)
            break;
        }
        include "tiemkiem.php"; // Hiển thị trang tìm kiếm nếu không có dữ liệu tìm kiếm
        break;
    case 'addtocart':
        if (isset($_POST['addtocart']) && ($_POST['addtocart'])) {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $img = $_POST['img'];
            $price = $_POST['price'];
            $soluong = 1;

            // Kiểm tra sản phẩm đã tồn tại trong giỏ hàng chưa
            $found = false;
            foreach ($_SESSION['mycart'] as &$cart) {
                if ($cart[0] == $id) {
                    $cart[4] += $soluong; // Tăng số lượng
                    $cart[5] = $cart[4] * $cart[3]; // Cập nhật thành tiền
                    $found = true;
                    break;
                }
            }

            // Nếu sản phẩm chưa tồn tại, thêm mới
            if (!$found) {
                $ttien = $soluong * $price;
                $spadd = [$id, $name, $img, $price, $soluong, $ttien];
                $_SESSION['mycart'][] = $spadd;
            }
        }
        include "./view/cart/viewcart.php";
        break;
    case 'updatecart':
        // Cập nhật số lượng sản phẩm trong giỏ hàng
        if (isset($_POST['idcart']) && isset($_POST['quantity'])) {
            $idcart = $_POST['idcart'];
            $quantity = intval($_POST['quantity']);

            if ($quantity > 0 && isset($_SESSION['mycart'][$idcart])) {
                // Cập nhật số lượng
                $_SESSION['mycart'][$idcart][4] = $quantity;

                // Cập nhật thành tiền
                $_SESSION['mycart'][$idcart][5] = $quantity * $_SESSION['mycart'][$idcart][3];
            }
        }
        include "./view/cart/viewcart.php";
        break;
    case 'delcart':
        if (isset($_GET['idcart']) && is_numeric($_GET['idcart']) && $_GET['idcart'] >= 0 && $_GET['idcart'] < count($_SESSION['mycart'])) {
            unset($_SESSION['mycart'][$_GET['idcart']]);
            $_SESSION['mycart'] = array_values($_SESSION['mycart']); // Sắp xếp lại chỉ số sau khi xóa
        } else {
            // Nếu không có idcart, xóa toàn bộ giỏ hàng
            $_SESSION['mycart'] = [];
        }

        // Điều hướng về trang giỏ hàng
        header('Location:index.php?act=addtocart');
        exit();
        break;
    case 'bill':
        include "./view/cart/bill.php";
        break;
    case 'billcomfirm':
        // Tạo bill khi người dùng đồng ý đặt hàng
        if (isset($_POST['dongydathang']) && ($_POST['dongydathang'])) {
            if (isset($_SESSION['user'])) $iduser = $_SESSION['user']['id'];
            else $id = 0;
            echo '<pre>';

            $name = $_POST['name'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $tel = $_POST['tel'];
            $pttt = $_POST['pttt'];
            $ngaydathang = date('h:i:sa d/m/Y'); // Lấy ngày giờ hiện tại
            $tongdonhang = tongdonhang(); // Lấy tổng đơn hàng từ hàm tongdonhang()

            // Gọi hàm insert_bill và lấy ID của bill vừa được tạo
            $idbill = insert_bill($iduser, $name, $email, $address, $tel, $pttt, $ngaydathang, $tongdonhang);
            foreach ($_SESSION['mycart'] as $cart) {
                $iduser = $_SESSION['user']['id'];  // Lấy ID người dùng từ session
                $idpro = $cart[0];  // Giả sử cart[0] là ID sản phẩm
                $img = $cart[2];  // Giả sử cart[2] là hình ảnh của sản phẩm
                $name = $cart[1];  // Giả sử cart[1] là tên sản phẩm
                $price = $cart[3];  // Giả sử cart[3] là giá sản phẩm
                $soluong = $cart[4];  // Giả sử cart[4] là số lượng sản phẩm
                $Sthanhtien = $cart[3] * $cart[4];  // Tính thành tiền (giá * số lượng)
                $idbill = $idbill;  // ID bill, cần xác định từ đâu để gán giá trị

                // Gọi hàm insert_cart để thêm từng sản phẩm vào bảng cart
                insert_cart($iduser, $idpro, $img, $name, $price, $soluong, $Sthanhtien, $idbill);
            }
            $_SESSION['mycart'] = [];

            $bill = loadone_bill($idbill);
            $billct = loadall_cart($idbill);
            // Bao gồm view để xác nhận thông tin đơn hàng
            include "view/cart/billcomfirm.php";
        }
        break;
    case 'mybill':
        // Lấy danh sách hóa đơn của người dùng
        $listbill = loadall_bill($_SESSION['user']['id']);

        // Hiển thị danh sách hóa đơn
        include "view/cart/mybill.php";
        break;
    case 'gioithieu':
        include "./view/gioithieu.php";
        break;
    case 'dangky':
        include "./view/dangky.php";
        break;
    case 'login':
        include "./view/login.php";
        break;
    case 'lienhe':
        include "./view/lienhe.php";
        break;
    case 'hoidap':
        include "./view/hoidap.php";
        break;
    case 'nhanxet':
        include "./view/nhanxet.php";
        break;
    case 'logout':
        $_SESSION = [];
        session_destroy();
        header("Location:index.php");
        break;
    default:
        include "./view/home.php";
        break;
}
include "./view/footer.php";
