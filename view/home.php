<style>
    .slideshow-container img {
        width: 100%;
        height: 400px;
        object-fit: cover;
        border-radius: 8px;
    }
    .boxsp {
        border: 1px solid #ddd;
        border-radius: 8px;
        margin-bottom: 20px;
        overflow: hidden;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .boxsp img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .mac-name {
        color: #333;
        font-weight: bold;
        text-decoration: none;
    }

    .mac-name:hover {
        color: #666f79;
    }

    .btnaddtocart input[type="submit"] {
        background-color: #666f79;
        color: white;
        border: none;
        padding: 10px 15px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .btnaddtocart input[type="submit"]:hover {
        background-color: #575e67;
    }

    .boxphai {
        padding: 20px;
        background-color: #f8f9fa;
        border-radius: 8px;
    }
</style>
</head>
<body>
    <div class="container-fluid px-0">
        <!-- Slideshow Section -->
        <div class="row mb-4">
            <div class="col-12">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://cdnv2.tgdd.vn/mwg-static/topzone/Banner/d4/f9/d4f9d5d80a7752f6af6049ebcf673c68.png" class="d-block w-100" alt="Slide 1">
                        </div>
                        <div class="carousel-item">
                            <img src="https://cdnv2.tgdd.vn/mwg-static/topzone/Banner/90/7f/907fc4bc1e2e84348c8921ae1e571fcd.png" class="d-block w-100" alt="Slide 2">
                        </div>
                        <div class="carousel-item">
                            <img src="https://cdnv2.tgdd.vn/mwg-static/topzone/Banner/c0/a5/c0a5e9e8fb94a8abacf5ba9681ef2e55.png" class="d-block w-100" alt="Slide 3">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <?php
                    $i = 0;
                    foreach ($spnew as $sp) {
                        extract($sp);
                        //extract($sp): lấy các sp từ mảng
                        $linksp = "index.php?act=sanphamct&idsp=" . $id;
                        $hinh = $img_path . $img;

                        echo '
                        <div class="col-md-4">
                            <div class="boxsp p-3">
                                <div class="row img mb-3">
                                    <a href="' . $linksp . '"><img src="./' . $hinh . '" alt="' . $name . '"></a>
                                </div>
                                <p class="text-center fw-bold text-danger">$' . number_format($price, 0, ',', '.') . '</p>
                                <a class="mac-name text-center d-block mb-3" href="' . $linksp . '">' . $name . '</a>

                                <div class="btnaddtocart text-center">
                                    <form action="index.php?act=addtocart" method="post">
                                        <input type="hidden" name="id" value="' . $id . '">
                                        <input type="hidden" name="name" value="' . $name . '">
                                        <input type="hidden" name="img" value="' . $img . '">
                                        <input type="hidden" name="price" value="' . $price . '">
                                        <input type="submit" name="addtocart" value="Thêm Vào Giỏ Hàng">
                                    </form>
                                </div>
                                
                            </div>
                        </div>';
                        $i++;
                    }
                    ?>
                </div>
            </div>

            <!-- Right Side (Box Right) -->
            <div class="col-md-3">
                <div class="boxphai">
                    <?php include "boxright.php"; ?>
                </div>
            </div>
        </div>
    </div>