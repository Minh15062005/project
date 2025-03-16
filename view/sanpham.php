<style>
    /* Toàn màn hình */
    .full-height {
        min-height: 100vh;
        /* Chiếm toàn bộ chiều cao màn hình */
    }

    /* Tạo hiệu ứng bóng mờ cho các box */
    .boxsp {
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 10px;
        text-align: center;
        padding: 15px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .boxsp:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
    }

    .boxsp img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
        margin-bottom: 15px;
    }

    .boxsp p {
        font-size: 1.2rem;
        color: #ff5722;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .boxsp a {
        font-size: 1rem;
        color: #007bff;
        font-weight: 500;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .boxsp a:hover {
        color: #0056b3;
    }

    /* Thêm khoảng cách cho các phần tử */
    .container {
        padding: 0;
    }
</style>
</head>

<body>

    <div class="container-fluid full-height d-flex flex-column">
        <!-- Content Section -->
        <div class="container-fluid flex-grow-1">
            <div class="row">
                <!-- Main Content (Products) -->
                <div class="col-lg-9 col-md-8 col-sm-12">
                    <div class="row mb-4">
                        <div class="col-12">
                            <div class="boxtitle">SẢN PHẨM <strong><?= is_array($tendm) ?: $tendm ?></strong></div>
                        </div>
                        <div class="row">
                            <?php
                            foreach ($dssp as $sp) {
                                // if (!is_array($sp) || !isset($sp['id'], $sp['img'], $sp['price'], $sp['name'])) {
                                //     continue;//bỏ qua
                                // }
                                extract($sp);
                                
                                $linksp = "index.php?act=sanphamct&idsp=" . $id;
                                $img_src = $img_path . $img;
                                // if (!file_exists($img_src)) {
                                //     echo "Hình ảnh không tồn tại: " . $img_src;
                                //     continue;
                                // }
                                echo '
                                <div class="col-md-3 mb-4">
                                    <div class="card h-100 shadow-sm border-0">
                                        <a href="' . $linksp . '">
                                            <img src="./' . $img_src . '" class="card-img-top" alt="' . htmlspecialchars($name) . '">
                                        </a>
                                        <div class="card-body text-center">
                                            <p class="card-text text-danger">' . number_format($price, 0, ',', '.') . ' $</p>
                                            <a href="' . $linksp . '" class="card-title text-primary">' . htmlspecialchars($name) . '</a>
                                        </div>
                                    </div>
                                </div>';
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <!-- Sidebar (optional) -->
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="col-12">
                        <div class="boxtitle bg-primary text-white py-2 px-3 mb-3">Danh Mục</div>
                        <div class="boxconten2 menudoc">
                            <ul class="list-group">
                                <?php
                                foreach ($dsdm as $dm) {
                                    extract($dm);
                                    $linkdm = "index.php?act=sanpham&iddm=" . $id;
                                    echo '<li class="list-group-item"><a class="text-decoration-none text-dark" href="' . $linkdm . '">' . $name . '</a></li>';
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>