<style>
    .spct img {
        width: 100%;
        max-height: 400px;
        object-fit: contain;
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .buy-button {
        display: inline-block;
        background-color: #28a745;
        color: white;
        padding: 10px 20px;
        text-align: center;
        border-radius: 5px;
        text-decoration: none;
        font-weight: bold;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        transition: background-color 0.3s ease;
    }

    .buy-button:hover {
        background-color: #218838;
    }

    .comment-form textarea {
        width: 100%;
        padding: 10px;
        border-radius: 8px;
        border: 1px solid #ddd;
    }

    .comment-form input[type="submit"] {
        background-color: #007bff;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-weight: bold;
    }

    .comment-form input[type="submit"]:hover {
        background-color: #0056b3;
    }
</style>
</head>

<body>

    <div class="container my-5">
        <div class="row">
            <div class="col-md-8 mb-4">
                <div class="card shadow-lg">
                    <?php extract($onesp); ?>
                    <div class="card-header text-center bg-primary text-white">
                        <h5 class="mb-0"><?= $name ?></h5>
                    </div>
                    <div class="card-body">
                        <!-- Hình ảnh sản phẩm -->
                        <div class="text-center mb-4 spct">
                            <?php
                            $img = $img_path . $img;
                            echo '<img src="./' . $img . '" class="img-fluid">';
                            ?>
                        </div>
                        <!-- Mô tả sản phẩm -->
                        <p><?= $mota ?></p>
                        <!-- Giá sản phẩm -->
                        <p><strong>Giá: <?= number_format($price, 0, ',', '.') ?> VNĐ</strong></p>
                        <!-- Nút Mua ngay -->
                        <a href="index.php?act=addtocart&id=<?= $id ?>" class="buy-button">Mua ngay</a>
                        <!-- Đánh giá sản phẩm -->
                        <div class="rating mb-3">
                            <p class="text-warning mb-1 fs-5">Đánh giá trung bình: ⭐⭐⭐⭐☆ (4.5/5)</p>
                            <button class="btn btn-outline-primary btn-sm">Thêm đánh giá</button>
                        </div>

                        <!-- Chia sẻ sản phẩm -->
                        <div class="share-buttons">
                            <p>Chia sẻ:</p>
                            <a href="#" class="btn btn-outline-secondary btn-sm"><i class="bi bi-facebook"></i> Facebook</a>
                            <a href="#" class="btn btn-outline-secondary btn-sm"><i class="bi bi-twitter"></i> Twitter</a>
                            <a href="#" class="btn btn-outline-secondary btn-sm"><i class="bi bi-link"></i> Sao chép liên kết</a>
                        </div>
                    </div>
                </div>

                <!-- Bình luận -->
                <div class="card mt-4 shadow-lg">
                    <div class="card-header bg-secondary text-white">
                        <h5 class="mb-0">BÌNH LUẬN</h5>
                    </div>
                    <div class="card-body">
                        <!-- Form bình luận -->
                        <form action="index.php?act=submit_comment" method="post" class="comment-form mb-4">
                            <input type="hidden" name="idsp" value="<?= $id ?>">
                            <textarea name="comment" rows="4" placeholder="Viết bình luận của bạn..."></textarea>
                            <br>
                            <input type="submit" value="Gửi">
                        </form>

                        <!-- Hiển thị bình luận -->
                        <?php
                        echo '<p>Chưa có bình luận nào.</p>';
                        ?>
                    </div>
                </div>
            </div>

            <!-- Sidebar (Box right) -->
            <div class="col-md-4">
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
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>