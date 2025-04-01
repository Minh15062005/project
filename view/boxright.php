<div class="row mb-4">
    <!-- Danh mục -->
    <div class="col-12">
        <div class="boxtitle bg-primary text-white py-2 px-3 mb-3">Danh Mục</div>
        <div class="boxconten2 menudoc">
            <ul class="list-group">
                <?php
                foreach ($dsdm as $dm) {
                    extract($dm);
                    $linkdm = "index.php?act=sanpham&iddm=" . $id;
                    // load sản phẩm theo iddm
                    echo '<li class="list-group-item"><a class="text-decoration-none text-dark" href="' . $linkdm . '">' . $name . '</a></li>';
                }
                ?>
            </ul>
        </div>
    </div>
  
    <!-- Quản lý tài khoản -->
    <div class="col-12">
        <div class="boxtitle bg-success text-white py-2 px-3 mb-3">Quản lý Tài Khoản</div>
        <div class="boxconten2 menudoc">
            <ul class="list-group">
                <li class="list-group-item">
                    <a class="text-decoration-none text-dark" href="index.php?act=mybill">Đơn hàng của tôi</a>
                </li>
                <li class="list-group-item">
                    <a class="text-decoration-none text-dark" href="index.php?act=logout">Đăng xuất</a>
                </li>
                <!-- <li class="list-group-item">
                    <a class="text-decoration-none text-dark" href="index.php?act=forgot_password">Quên mật khẩu</a>
                </li> -->
            </ul>
        </div>
    </div>
</div>
