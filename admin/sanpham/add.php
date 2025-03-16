<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center text-primary mb-4">THÊM MỚI SẢN PHẨM</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="index.php?act=addsp" method="post" enctype="multipart/form-data" class="p-4 border rounded shadow-sm bg-light">
                <div class="mb-3">
                    <label for="iddm" class="form-label">Danh Mục</label>
                    <select name="iddm" class="form-select">
                        <?php
                        foreach ($listdanhmuc as $danhmuc) {
                            extract($danhmuc);
                            echo '<option value="' . $id . '">' . $name . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="tensp" class="form-label">Tên Sản Phẩm</label>
                    <input type="text" class="form-control" id="tensp" name="tensp" required>
                </div>
                <div class="mb-3">
                    <label for="giasp" class="form-label">Giá</label>
                    <input type="text" class="form-control" id="giasp" name="giasp" required>
                </div>
                <div class="mb-3">
                    <label for="hinh" class="form-label">Hình Ảnh</label>
                    <input type="file" class="form-control" name="hinh" id="hinh" required>
                </div>
                <div class="mb-3">
                    <label for="mota" class="form-label">Mô Tả</label>
                    <textarea class="form-control" name="mota" id="mota" cols="30" rows="10" required></textarea>
                </div>
                <div class="d-flex justify-content-between">
                <input type="submit" name="themmoi" class="btn btn-danger" value="THÊM MỚI">
                <a href="index.php?act=listsp"><input class="btn btn-danger" type="button" value="DANH SÁCH"></a>
                </div>
                <?php
                if (isset($thongbao) && ($thongbao != '')) {
                    echo '<div class="mt-3 text-success">' . $thongbao . '</div>';
                }
                ?>
            </form>
        </div>
    </div>
</div>
