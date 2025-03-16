<?php
session_start();
ob_start();
if (isset($_SESSION['role']) && ($_SESSION['role'] == 1)) {
    include "../model/pdo.php";
    include "./header.php";
    include "../model/danhmuc.php";
    include "../model/sanpham.php";
    include "../model/bill.php";
    include "../model/cart.php";
    if (isset($_GET['act'])) {
        $act = $_GET['act'];
        switch ($act) {

            case 'adddm':
                if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                    $tenloai = $_POST['tenloai'];
                    insert_danhmuc($tenloai);
                    $thongbao = "Thêm thành công";
                }
                include "./danhmuc/add.php";
                break;

            case 'listdm':
                $listdanhmuc = loadall_danhmuc();
                include "./danhmuc/list.php";
                break;

            case 'xoadm';
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    delete_danhmuc($_GET['id']);
                }
                $listdanhmuc = loadall_danhmuc();
                include "./danhmuc/list.php";
                break;

            case 'suadm';
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $dm = loadone_danhmuc($_GET['id']);
                }
                include "./danhmuc/update.php";
                break;

            case 'update';
                if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                    $tenloai = $_POST['tenloai'];
                    $id = $_POST['id'];
                    update_danhmuc($id, $tenloai);
                    $thongbao = "cập nhật thành công";
                }
                $listdanhmuc = loadall_danhmuc();
                include "./danhmuc/list.php";
                break;

                // controller cho sản phẩm
            case 'addsp':
                if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                    $iddm = $_POST['iddm'];
                    $tensp = $_POST['tensp'];
                    $giasp = $_POST['giasp'];
                    $mota = $_POST['mota'];
                    $hinh = $_FILES['hinh']['name'];
                    $target_dir = "../upload/";
                    $target_file = $target_dir . basename($_FILES['hinh']['name']);
                    move_uploaded_file($_FILES['hinh']['tmp_name'], $target_file);
                    insert_sanpham($tensp, $giasp, $hinh, $mota, $iddm);
                    $thongbao = "Thêm thành công";
                }
                $listdanhmuc = loadall_danhmuc();
                include "./sanpham/add.php";
                break;

            case 'listsp':
                if (isset($_POST['listok']) && ($_POST['listok'])) {
                    $kyw = $_POST['kyw'];
                    $iddm = $_POST['iddm'];
                } else {
                    $kyw = '';
                    $iddm = 0;
                }
                $listdanhmuc = loadall_danhmuc();
                $listsanpham = loadall_sanpham($kyw = "", $iddm = 0);
                include "./sanpham/list.php";
                break;

            case 'xoasp';
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    delete_sanpham($_GET['id']);
                }
                $listsanpham = loadall_sanpham($kyw = "", $iddm = 0);
                include "./sanpham/list.php";
                break;

            case 'suasp':
                //Chuẩn bị dữ liệu và hiển thị form cập nhật.
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $sanpham = loadone_sanpham($_GET['id']);
                }
                $listdanhmuc = loadall_danhmuc();
                include "sanpham/update.php";
                break;

            case 'updatesp':
                if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                    $id = $_POST['id'];
                    $iddm = $_POST['iddm'];
                    $tensp = $_POST['tensp'];
                    $giasp = $_POST['giasp'];
                    $mota = $_POST['mota'];
                    $hinh = $_FILES['hinh']['name'];
                    $target_dir = "../upload/";
                    $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                    if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                        // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                    } else {
                        // echo "Sorry, there was an error uploading your file.";
                    }
                    update_sanpham($id, $iddm, $tensp, $giasp, $mota, $hinh);
                    $thongbao = "Cập nhật thành công";
                }
                $listdanhmuc = loadall_danhmuc();
                $listsanpham = loadall_sanpham("", 0);
                include "sanpham/list.php";
                break;

            case 'quanliuser':
                include "../admin/quanliuser.php";
                break;

            case 'deleteusers':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $id_to_delete = $_GET['id'];
                    delete_users($id_to_delete);
                }
                header("Location: index.php?act=quanliuser");
                exit();
                break;

            case 'thongke':
                // Gọi các hàm thống kê
                $total_products = get_total_products();
                $total_categories = get_total_categories();
                $total_users = get_total_users();
                $total_comments = get_total_comments();
                $total_orders = get_total_orders();
                $total_revenue = get_total_revenue();
                include "./thongke.php";
                break;

            case 'listbill':
                $listbill = loadall_bill(0);
                // mặc định phần slect
                include "bill/listbill.php";
                break;

            case 'deletebill':
                if (isset($_GET['act']) && $_GET['act'] == 'deletebill') {
                    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                        $id = $_GET['id'];
                        $message = delete_bill($id);
                        header('location:index.php?act=listbill');
                        exit();
                    } else {
                        echo "<script>alert('ID đơn hàng không hợp lệ!');</script>";
                    }
                }
                break;

            case 'update_status':
                // tồn tại và thỏa mãn điều kiện
                if (isset($_GET['act']) && $_GET['act'] == 'update_status') {
                    // lấy gtr từ biểu mẫu
                    $id = $_POST['id'];
                    $bill_status = $_POST['bill_status'];
                    // cập nhật trạng thái trong csdl
                    $sql = "UPDATE bill SET bill_status = :bill_status WHERE id = :id";
                    pdo_execute($sql, [':bill_status' => $bill_status, ':id' => $id]);
                    header("Location: index.php?act=listbill");
                    exit;
                }
                break;

            case 'edituser':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $user = load_user_by_id($_GET['id']);
                }
                include "../admin/edit_user.php";
                break;

            case 'thoat':
                if (isset($_SESSION['role']))
                    unset($_SESSION['role']);
                header('location:login.php');
                break;

            default:
                include "home.php";
                break;
        }
    } else {
        include "thongke.php";
    }
} else {
    header('location:login.php');
}
