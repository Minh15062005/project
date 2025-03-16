<?php
function delete_bill($id)
{
    // Kiểm tra nếu ID tồn tại trong cơ sở dữ liệu
    $sql_check = "SELECT COUNT(*) FROM bill WHERE id = :id";
    $stmt_check = pdo_get_connection()->prepare($sql_check);
    $stmt_check->execute([':id' => $id]);
    $exists = $stmt_check->fetchColumn();

    if ($exists) {
        $sql = "DELETE FROM bill WHERE id = :id";
        return pdo_execute($sql, [':id' => $id]); 
    } else {
        return "Không tìm thấy đơn hàng với ID $id.";
    }
}


?>