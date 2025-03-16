<?php
function viewcart($del)
{
    global $img_path;
    $tong = 0;
    $i = 0;

    if ($del == 1) {
        $xoasp_th = '<th>Thao tác</th>';
        $xoasp_td2 = '<td></td>';
    } else {
        $xoasp_th = '';
        $xoasp_td2 = '';
    }
    echo '
        <tr>
            <th>Hình ảnh</th>
            <th>Sản phẩm</th>
            <th>Đơn giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
            ' . $xoasp_th . '
        </tr>
    ';

    foreach ($_SESSION['mycart'] as $index => $cart) {
        $hinh = $img_path . $cart[2];
        $ttien = $cart[3] * $cart[4];
        $tong += $ttien;
        if ($del == 1) {
            $xoasp_td = '<td><a href="index.php?act=delcart&idcart=' . $index . '"><input type="button" value="Xóa"></a></td>';
        } else {
            $xoasp_td = '';
        }
        echo '
            <tr>
                <td><img src="' . $hinh . '" alt="" width="100"></td>
                <td>' . $cart[1] . '</td>
                <td>' . $cart[3] . ' VNĐ</td>
                <td>
                    <form action="index.php?act=updatecart" method="post" style="display:inline;">
                        <input type="hidden" name="idcart" value="' . $index . '">
                        <input type="number" name="quantity" value="' . $cart[4] . '" min="1" style="width: 60px;">
                        <input type="submit" value="Cập nhật">
                    </form>
                </td>
                <td>' . $ttien . ' VNĐ</td>
                ' . $xoasp_td . '
            </tr>';
    }

    echo '
        <tr>
            <td colspan="4" class="text-right">Tổng tiền:</td>
            <td>' . $tong . ' VNĐ</td>
            ' . $xoasp_td2 . '
        </tr>';
}
function bill_chi_tiet($listbill)
{
    global $img_path;
    $tong = 0;  // Khởi tạo tổng
    $i = 0;     // Biến đếm số sản phẩm
    echo '<tr>
            <th>Hình</th>
            <th>Sản phẩm</th>
            <th>Đơn giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
          </tr>';

    foreach ($listbill as $cart) {
        $hinh = $img_path . $cart['img'];  // Lấy đường dẫn hình ảnh
        $tong += $cart['thanhtien'];  // Cộng dồn thành tiền vào tổng

        // In ra từng dòng của giỏ hàng
        echo '<tr>
                <td><img src="' . $hinh . '" alt="" height="80px"></td>
                <td>' . $cart['name'] . '</td>
                <td>' . $cart['price'] . '</td>
                <td>' . $cart['soluong'] . '</td>
                <td>' . $cart['thanhtien'] . '</td>
              </tr>';

        $i++;  // Tăng chỉ số sản phẩm
    }

    // Hiển thị tổng đơn hàng
    echo '<tr>
            <td colspan="4">Tổng đơn hàng</td>
            <td>' . $tong . '</td>
          </tr>';
}

// Hàm tính tổng đơn hàng
function tongdonhang()
{
    $tong = 0; // Khởi tạo biến tổng
    foreach ($_SESSION['mycart'] as $cart) {
        $ttien = $cart[3] * $cart[4]; // Tính thành tiền của từng sản phẩm
        $tong += $ttien; // Cộng dồn vào tổng tiền
    }
    return $tong; // Trả về tổng đơn hàng
}

// Hàm insert đơn hàng vào cơ sở dữ liệu
function insert_bill($iduser, $name, $email, $address, $tel, $pttt, $ngaydathang, $tongdonhang)
{
    // Tạo câu lệnh SQL để insert dữ liệu vào bảng "bill"
    $sql = "INSERT INTO bill (iduser,bill_name, bill_email, bill_address, bill_tel, bill_pttt, ngaydathang, total) 
            VALUES ('$iduser','$name', '$email', '$address', '$tel', '$pttt', '$ngaydathang', '$tongdonhang')";

    // Thực thi câu lệnh SQL
    return pdo_execute_return_lastInsertId($sql);
}
function insert_cart($iduser, $idpro, $img, $name, $price, $soluong, $Sthanhtien, $idbill)
{
    // Tạo câu lệnh SQL để insert dữ liệu vào bảng "cart"
    $sql = "INSERT INTO cart (iduser, idpro, img, name, price, soluong, thanhtien, idbill) 
            VALUES ('$iduser', '$idpro', '$img', '$name', '$price', '$soluong', '$Sthanhtien', '$idbill')";

    // Thực thi câu lệnh SQL
    return pdo_execute($sql);
}
function loadone_bill($id)
{
    // Câu lệnh SQL để chọn thông tin hóa đơn theo id
    $sql = "SELECT * FROM bill WHERE id = " . $id;

    // Thực thi truy vấn và trả về kết quả
    $bill = pdo_query_one($sql);

    return $bill;
}
function loadall_cart($idbill)
{
    // Câu lệnh SQL để chọn thông tin giỏ hàng theo idbill
    $sql = "SELECT * FROM cart WHERE idbill = " . $idbill;

    // Thực thi truy vấn và trả về kết quả
    $bill = pdo_query($sql);

    return $bill;
}
function loadall_cart_count($idbill)
{
    // Câu lệnh SQL để chọn thông tin giỏ hàng theo idbill
    $sql = "SELECT * FROM cart WHERE idbill = " . $idbill;


    $bill = pdo_query($sql);

    return sizeof($bill);
}

function loadall_bill($iduser) {
    // Chuẩn bị câu lệnh SQL
    $sql = "SELECT * FROM bill WHERE 1";
    
    if ($iduser > 0) {
        $sql .= " AND iduser = ".$iduser;  // Sử dụng tham số thay vì chèn trực tiếp giá trị vào SQL
    }
    $sql .= " ORDER BY id DESC";
    $listbill=pdo_query($sql);
    return $listbill;
}

function get_ttdh($n)
{
    switch ($n) {
        case '0':
            $tt = "Đơn hàng mới";
            break;
        case '1':
            $tt = "Đang xử lý";
            break;
        case '2':
            $tt = "Đang giao hàng";
            break;
        case '3':
            $tt = "Hoàn tất";
            break;
        default:
            $tt = "Đơn hàng mới";
            break;
    }
    return $tt;
}

