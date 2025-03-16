<?php
function insert_sanpham($tensp, $giasp, $hinh, $mota, $iddm)
{
    $sql = "INSERT INTO sanpham(name, price, img, mota, iddm) VALUES (?, ?, ?, ?, ?)";
    pdo_execute($sql, $tensp, $giasp, $hinh, $mota, $iddm);
}

function delete_sanpham($id)
{
    $sql = "DELETE FROM sanpham WHERE id = ?";
    pdo_execute($sql, $id);
}

function loadall_sanpham_home()
{
    $sql = "SELECT * FROM sanpham ORDER BY id DESC ";
    return pdo_query($sql);
}

function loadall_sanpham_top10()
{
    $sql = "SELECT * FROM sanpham ORDER BY luotxem DESC LIMIT 0, 6";
    return pdo_query($sql);
}
function loadone_ten_dm($id)
{
    $sql = "SELECT * FROM sanpham WHERE id = ?";
    return pdo_query_one($sql, $id);
}
function loadone_sanpham($id)
{
    $sql = "SELECT * FROM sanpham WHERE id = ?";
    return pdo_query_one($sql, $id);
}

function update_sanpham($id, $iddm, $tensp, $giasp, $mota, $hinh)
{
    if ($hinh != "") {
        $sql = "UPDATE sanpham SET iddm = ?, name = ?, price = ?, mota = ?, img = ? WHERE id = ?";
        pdo_execute($sql, $iddm, $tensp, $giasp, $mota, $hinh, $id);
    } else {
        $sql = "UPDATE sanpham SET iddm = ?, name = ?, price = ?, mota = ? WHERE id = ?";
        pdo_execute($sql, $iddm, $tensp, $giasp, $mota, $id);
    }
}
function loadall_sanpham($kyw = "", $iddm = 0)
//Chức năng: Hàm này dùng để tìm kiếm và lấy danh sách sản phẩm dựa trên từ khóa ($kyw) và ID danh mục ($iddm).
{
    $sql = "SELECT * FROM sanpham WHERE 1";
    if ($kyw != "") {
        $sql .= " AND name LIKE ?";
        $kyw = "%" . $kyw . "%";
    }
    if ($iddm > 0) {
        $sql .= " AND iddm = ?";
    }
    $sql .= " ORDER BY id DESC";

    // Tạo mảng chứa các tham số
    $params = [];
    if ($kyw != "") {
        $params[] = $kyw;
    }
    if ($iddm > 0) {
        $params[] = $iddm;
    }
    return pdo_query($sql, ...$params);
}
// function loadone_sanpham_cungloai($id, $iddm)
// {
//     $sql = "SELECT * FROM sanpham WHERE iddm = ? AND id <> ?";
//     return pdo_query($sql, $iddm, $id);
// }