<div class="container my-5">
    <div class="row">
        <div class="col-12">
            <!-- Cảm ơn -->
            <div class="card p-4 shadow-sm text-center mb-4">
                <h4 class="text-primary fw-bold">CẢM ƠN</h4>
                <p class="fs-5">Cám ơn quý khách đã đặt hàng!</p>
            </div>

            <!-- Thông tin đơn hàng -->
            <div class="card p-4 shadow-sm mb-4">
                <h4 class="text-primary fw-bold">THÔNG TIN ĐƠN HÀNG</h4>
                <?php
                // if (isset($_POST['dongydathang'])) {
                //     $name = $_POST['name'];
                //     $address = $_POST['address'];
                //     $email = $_POST['email'];
                //     $tel = $_POST['tel'];
                //     $pttt = $_POST['pttt'];

                //     echo "<pre>";
                //     print_r($_POST);
                //     echo "</pre>";

                // }

                if (isset($bill) && is_array($bill)) {
                    extract($bill);
                }
                ?>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Mã đơn hàng:</strong> DH-<?= $bill['id']; ?></li>
                    <li class="list-group-item"><strong>Ngày đặt hàng:</strong> <?= $bill['ngaydathang']; ?></li>
                    <li class="list-group-item"><strong>Tổng đơn hàng:</strong> <?= $bill['total']; ?></li>
                    <li class="list-group-item"><strong>Phương thức thanh toán:</strong> <?= $bill['bill_pttt']; ?></li>
                </ul>
            </div>

            <!-- Thông tin đặt hàng -->
            <div class="card p-4 shadow-sm mb-4">
                <h4 class="text-primary fw-bold">THÔNG TIN ĐẶT HÀNG</h4>
                <table class="table table-bordered">
                    <tr>
                        <th>Người đặt hàng</th>
                        <td><?= $bill['bill_name']; ?></td>
                    </tr>
                    <tr>
                        <th>Địa chỉ</th>
                        <td><?= $bill['bill_address']; ?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><?= $bill['bill_email']; ?></td>
                    </tr>
                    <tr>
                        <th>Điện thoại</th>
                        <td><?= $bill['bill_tel']; ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <!-- Chi tiết giỏ hàng -->
    <div class="row">
        <div class="col-12">
            <div class="card p-4 shadow-sm">
                <h4 class="text-primary fw-bold">CHI TIẾT GIỎ HÀNG</h4>
                <table class="table table-striped table-bordered">
                    <?php
                    if (isset($billct) && is_array($billct)) {
                        bill_chi_tiet($billct);
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>