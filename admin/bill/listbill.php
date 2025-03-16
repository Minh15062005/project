<div class="container mt-4">
    <div class="row mb-3">
        <h3 class="col-12">Danh Sách Đơn Hàng</h3>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th></th>
                        <th>MÃ ĐƠN HÀNG</th>
                        <th>KHÁCH HÀNG</th>
                        <th>SỐ LƯỢNG HÀNG</th>
                        <th>GIÁ TRỊ ĐƠN HÀNG</th>
                        <th>TÌNH TRẠNG ĐƠN HÀNG</th>
                        <th>NGÀY ĐẶT HÀNG</th>
                        <th>THAO TÁC</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($listbill as $bill) {
                        extract($bill);
                        $kh = $bill["bill_name"] . "<br>" . $bill["bill_email"] . "<br>" . $bill["bill_address"] . "<br>" . $bill["bill_tel"];
                        //Biến $kh chứa thông tin khách hàng: tên, email, địa chỉ, và số điện thoại.
                        $countsp = loadall_cart_count($bill["id"]);
                        //để đếm số lượng sản phẩm trong đơn hàng (dựa trên bill_id).
                        echo '<tr>
                            <td><input type="checkbox" class="form-check-input" name="" id=""></td>
                            <td>DH-' . $bill['id'] . '</td>
                            <td>' . $kh . '</td>
                            <td>' . $countsp . '</td>
                            <td><strong>' . $bill["total"] . '</strong> VND</td>
                            <td>
                                <form action="index.php?act=update_status" method="POST" style="display: inline-block;">
                                    <input type="hidden" name="id" value="' . $bill['id'] . '">
                                    <select name="bill_status" class="form-select form-select-sm" onchange="this.form.submit()">
                                        <option value="0" ' . ($bill["bill_status"] == 0 ? "selected" : "") . '>Đơn hàng mới</option>
                                        <option value="1" ' . ($bill["bill_status"] == 1 ? "selected" : "") . '>Đang xử lý</option>
                                        <option value="2" ' . ($bill["bill_status"] == 2 ? "selected" : "") . '>Đang giao hàng</option>
                                        <option value="3" ' . ($bill["bill_status"] == 3 ? "selected" : "") . '>Hoàn tất</option>
                                    </select>
                                </form>
                            </td>
                            <td>' . $bill["ngaydathang"] . '</td>
                            <td>
                                <a href="index.php?act=deletebill&id=' . $bill['id'] . '" onclick="return confirm(\'Bạn có chắc chắn muốn hủy đơn hàng này không?\')">
                                    <button class="btn btn-danger btn-sm">Hủy Đơn Hàng</button>
                                </a>
                            </td>
                        </tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
