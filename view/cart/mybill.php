<div class="container my-5">
    <div class="row">
        <div class="col-12">
            <!-- Đơn hàng của bạn -->
            <div class="card shadow-sm p-4">
                <h4 class="text-primary fw-bold text-center mb-4">ĐƠN HÀNG CỦA BẠN</h4>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle text-center">
                        <thead class="table-primary">
                            <tr>
                                <th>MÃ ĐƠN HÀNG</th>
                                <th>NGÀY ĐẶT</th>
                                <th>SỐ LƯỢNG MẶT HÀNG</th>
                                <th>TỔNG GIÁ TRỊ ĐƠN HÀNG</th>
                                <th>TÌNH TRẠNG ĐƠN HÀNG</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (is_array($listbill)) {
                                foreach ($listbill as $bill) {
                                    extract($bill);
                                    $ttdh = get_ttdh($bill['bill_status']);
                                    $countsp = loadall_cart_count($bill['id']); // Hàm trả về số lượng sản phẩm
                                    echo "<tr>
                                        <td><strong>DH-" . $bill['id'] . "</strong></td>
                                        <td>" . $bill['ngaydathang'] . "</td>
                                        <td>" . $countsp . "</td>
                                        <td>" . number_format($bill['total'], 0, ',', '.') . " VNĐ</td>
                                        <td><span class='badge bg-info text-dark'>" . $ttdh . "</span></td>
                                    </tr>";
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
