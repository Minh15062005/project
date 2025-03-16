<div class="container my-5">
    <form action="index.php?act=billcomfirm" method="post">
        <!-- Thông tin đặt hàng -->
        <div class="mb-4">
            <h4 class="text-primary">THÔNG TIN ĐẶT HÀNG</h4>
            <div class="card p-4 shadow-sm">
                <div class="row g-3">
                    <?php
                    if (isset($_SESSION['user'])) {
                        $name = $_SESSION['user']['name'];
                        $address = $_SESSION['user']['address'];
                        $email = $_SESSION['user']['email'];
                        $tel = $_SESSION['user']['tel'];
                    } else {
                        $name = "";
                        $address = "";
                        $email = "";
                        $tel = "";
                    }
                    ?>
                    <div class="col-md-6">
                        <label for="name" class="form-label">Người đặt hàng</label>
                        <input type="text" id="name" name="name" value="<?= $name ?>" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="address" class="form-label">Địa chỉ</label>
                        <input type="text" id="address" name="address" value="<?= $address ?>" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" value="<?= $email ?>" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="tel" class="form-label">Điện thoại</label>
                        <input type="text" id="tel" name="tel" value="<?= $tel ?>" class="form-control">
                    </div>
                </div>
            </div>
        </div>

        <!-- Phương thức thanh toán -->
        <div class="mb-4">
            <h4 class="text-primary">PHƯƠNG THỨC THANH TOÁN</h4>
            <div class="card p-4 shadow-sm">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="pttt" value="Trả tiền khi nhận hàng" id="cash" checked>
                    <label class="form-check-label" for="cash">
                        Trả tiền khi nhận hàng
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="pttt" value="bank" id="bank">
                    <label class="form-check-label" for="bank">
                        Chuyển khoản ngân hàng
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="pttt" value="online" id="online">
                    <label class="form-check-label" for="online">
                        Thanh toán online
                    </label>
                </div>
            </div>
        </div>

        <!-- Thông tin giỏ hàng -->
        <div class="mb-4">
            <h4 class="text-primary">THÔNG TIN GIỎ HÀNG</h4>
            <div class="card p-4 shadow-sm">
                <table class="table table-bordered">
                    <?php viewcart(0); ?>
                </table>
            </div>
        </div>

        <!-- Nút xác nhận -->

        <div class="row mb bill">
            <input type="submit" class="btn btn-danger" value="ĐỒNG Ý ĐẶT HÀNG" name="dongydathang">
        </div>

    </form>
</div>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>