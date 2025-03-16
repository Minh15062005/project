<div class="container my-5">
    <!-- Phần tìm kiếm -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="input-group shadow-sm">
                <input 
                    type="text" 
                    name="search" 
                    class="form-control" 
                    placeholder="Tìm sản phẩm..." 
                    value="<?php echo htmlspecialchars($search); ?>" 
                />     
            </div>
        </div>
    </div>

    <!-- Phần hiển thị sản phẩm -->
    <div class="row">
        <?php
        // Hiển thị danh sách sản phẩm
        if ($rows) {
            foreach ($rows as $row) {
                echo "
                <div class='col-md-4 mb-4'>
                    <div class='card shadow-sm h-100'>
                        <a href='index.php?timkiem&id=" . $row['id'] . "'>
                            <img src='img/" . $row['img'] . "' class='card-img-top' alt='Hình ảnh sản phẩm'>
                        </a>
                        <div class='card-body'>
                            <h5 class='card-title text-truncate'>" . $row['name'] . "</h5>
                            <p class='card-text text-muted text-truncate'>" . $row['mota'] . "</p>
                            <p class='text-primary fw-bold'>" . number_format($row['price'], 0, ',', '.') . " VND</p>
                            <p class='badge bg-info text-dark'>Danh mục: " . $row['tendanhmuc'] . "</p>
                        </div>
                    </div>
                </div>";
            }
        } else {
            echo "<div class='col-12 text-center'><p class='text-danger'>Không tìm thấy sản phẩm nào.</p></div>";
        }
        ?>
    </div>
</div>
