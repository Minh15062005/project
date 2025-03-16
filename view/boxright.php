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
    <!-- Sản phẩm hot -->
    <div class="col-12">
        <div class="boxtitle bg-danger text-white py-2 px-3 mb-3">Sản Phẩm Hot</div>
        <div class="row g-3">
            <?php
            foreach ($dstop10 as $sp) {
                extract($sp);
                $linksp = "index.php?act=sanphamct&idsp=" . $id;
                $img = $img_path . $img;

                echo '
                <div class="col-md-4 col-sm-6">
                    <div class="card h-100">
                        <a href="' . $linksp . '">
                            <img src="./' . $img . '" class="card-img-top" alt="' . $name . '">
                        </a>                      
                    </div>
                </div>';
            }
            ?>
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
