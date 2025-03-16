<div class="container my-5">
    <div class="row">
        <div class="col-12">
            <!-- Giỏ hàng -->
            <div class="card shadow-sm p-4 mb-4">
                <h4 class="text-primary fw-bold text-center mb-4">GIỎ HÀNG</h4>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle text-center">
                        <?php
                        viewcart(1);
                        // hiển thị nd giỏ hàng
                        ?>
                    </table>
                </div>
            </div>

            <div class="text-center mt-4 btn-group-container">
                <?php if (!empty($_SESSION['mycart'])) : ?>
                    <a href="index.php?act=bill" class="btn btn-primary btn-lg px-5">Đặt hàng</a>
                    <a href="index.php" class="btn btn-warning btn-lg px-5">Thêm sản phẩm</a>
                    <a href="index.php?act=delcart" class="btn btn-danger btn-lg px-5" onclick="delete_giohang()">Xóa giỏ hàng</a>
                    <script>
                        function delete_giohang() {
                            alert("Bạn có chắc chắn muốn xóa tất cả sản phẩm không.");
                            window.location = "index.php";
                        }
                    </script>
                <?php else : ?>
                    <script>
                        function alertCartEmpty() {
                            alert("Giỏ hàng của bạn đang trống. Vui lòng thêm sản phẩm trước khi đặt hàng.");
                            window.location = "index.php";
                        }
                    </script>
                    <a href="#" onclick="alertCartEmpty()" class="btn btn-primary btn-lg px-5">Đặt hàng</a>
                    <a href="index.php" class="btn btn-warning btn-lg px-5">Chọn sản phẩm</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- CSS Flexbox -->
<style>
    .btn-group-container {
        display: flex;
        justify-content: center;
        gap: 10px; /* Khoảng cách giữa các nút */
    }
</style>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
