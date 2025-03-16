<?php
function pdo_get_connection()
{
    $dburl = "mysql:host=localhost;dbname=duan1;charset=utf8";
    $username = 'root';
    $password = '';

    $conn = new PDO($dburl, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
}

function pdo_execute($sql, ...$args)
{
    $conn = pdo_get_connection();
    $stmt = $conn->prepare($sql);
    if (count($args) == 1 && is_array($args[0])) {
        $stmt->execute($args[0]); 
    } else {
        $stmt->execute($args); 
    }
}

function pdo_execute_return_lastInsertId($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        return $conn->lastInsertId();
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}
function pdo_query($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $rows = $stmt->fetchAll();
        return $rows;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}


function pdo_query_one($sql)
{
    try {
        $sql_args = array_slice(func_get_args(), 1);
        $conn = pdo_get_connection();
        if (!$conn) {
            throw new Exception("Không thể kết nối đến cơ sở dữ liệu.");
        }

        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result ?? false;
    } catch (PDOException $e) {
        echo "Lỗi cơ sở dữ liệu: " . $e->getMessage();
        return false;
    } catch (Exception $e) {
        echo "Lỗi: " . $e->getMessage();
        return false;
    }
}


function pdo_query_value($sql, ...$args)
{
    $conn = pdo_get_connection();
    $stmt = $conn->prepare($sql);
    $stmt->execute($args);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return array_values($row)[0];
}
//kiểm tra pt get
function isGet()
{
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        return true;
    }
    return false;
}
//kiểm tra pt post
function isPost()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        return true;
    }
    return false;
}
// hàm filter lọc dữ liệu
function filter()
{
    $filterArr = [];
    if (isGet()) {
        //xử lý dữ liệu trc khi hiển thị ra
        //return $_get
        if (!empty($_GET)) {
            foreach ($_GET as $key => $value) {
                $key = strip_tags($key);
                if (is_array($value)) {
                    $filterArr[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_SCALAR);
                }
            }
        }
    }
}
//tim kiếm sản phẩm
function search_products($search)
{
    $conn = pdo_get_connection(); // Kết nối PDO
    $sql = "SELECT sanpham.*, danhmuc.name AS tendanhmuc
            FROM sanpham
            INNER JOIN danhmuc ON sanpham.iddm = danhmuc.id
            WHERE sanpham.name LIKE :search"; // Sửa lỗi ở đây

    $stmt = $conn->prepare($sql);
    $search_param = '%' . $search . '%'; // Thêm ký tự wildcard
    $stmt->bindParam(':search', $search_param, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC); // Trả về kết quả tìm kiếm
}

// thongke.php

function get_total_products()
{
    $conn = pdo_get_connection(); // Kết nối cơ sở dữ liệu
    $sql = "SELECT COUNT(*) as total FROM sanpham";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchColumn();
}

function get_total_categories()
{
    $conn = pdo_get_connection(); // Kết nối cơ sở dữ liệu
    $sql = "SELECT COUNT(*) as total FROM danhmuc";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchColumn();
}

function get_total_users()
{
    $conn = pdo_get_connection(); // Kết nối cơ sở dữ liệu
    $sql = "SELECT COUNT(*) as total FROM users";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchColumn();
}

function get_total_comments()
{
    $conn = pdo_get_connection(); // Kết nối cơ sở dữ liệu
    $sql = "SELECT COUNT(*) as total FROM comments";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchColumn();
}
function get_total_orders()
{
    $conn = pdo_get_connection(); // Kết nối cơ sở dữ liệu
    $sql = "SELECT COUNT(*) as total FROM bill"; // Lấy tổng số đơn hàng
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchColumn();
}

function get_total_revenue()
{
    $conn = pdo_get_connection(); // Kết nối cơ sở dữ liệu
    $sql = "SELECT SUM(total) as total FROM bill"; // Tính tổng tiền bán được
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchColumn();
}
function load_user_by_id($id)
{
    $sql = "SELECT * FROM users WHERE id = :id";
    return pdo_query_one($sql, [':id' => $id]); // Lấy thông tin của người dùng
}

function loadall_user()
{
    $sql = "SELECT * FROM users";
    return pdo_query($sql);
}
function delete_users($id)
{
    $sql = "DELETE FROM users WHERE id = :id";
    return pdo_execute($sql, [':id' => $id]); // Đúng định dạng tham số
}
