<div class="container mt-4">
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="text-center text-warning">CẬP NHẬT SẢN PHẨM</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="index.php?act=updatesp" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="iddm" class="form-label">Danh mục</label>
                    <select name="iddm" id="iddm" class="form-select">
                        <?php
                        foreach ($listdanhmuc as $danhmuc) {
                            extract($danhmuc);
                            if ($iddm == $id) $s = "selected";
                            else $s = "";
                            echo '<option value="' . $id . '" ' . $s . '>' . $name . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <?php
                if (is_array($sanpham)) {
                    extract($sanpham);
                }
                $hinhpath = "../upload/" . $img;
                if (is_file($hinhpath)) {
                    $hinh = "<img src='" . $hinhpath . "' height='80' class='img-thumbnail'>";
                } else {
                    $hinh = "No photo";
                }
                ?>
                <div class="mb-3">
                    <label for="tensp" class="form-label">Tên sản phẩm</label>
                    <input type="text" name="tensp" id="tensp" class="form-control" value="<?= $name ?>">
                </div>
                <div class="mb-3">
                    <label for="giasp" class="form-label">Giá</label>
                    <input type="text" name="giasp" id="giasp" class="form-control" value="<?= $price ?>">
                </div>
                <div class="mb-3">
                    <label for="hinh" class="form-label">Hình</label>
                    <input type="file" name="hinh" id="hinh" class="form-control">
                    <div class="mt-2"><?= $hinh ?></div>
                </div>
                <div class="mb-3">
                    <label for="mota" class="form-label">Mô tả</label>
                    <textarea name="mota" id="mota" cols="30" rows="5" class="form-control"><?= $mota ?></textarea>
                </div>
                <div class="mb-3">
                <input type="hidden" name="id" value="<?=$id?>">
                        <input class="btn btn-info" type="submit" name="capnhat" value="CẬP NHẬT">
                        <a href="index.php?act=listsp"><input type="button" class="btn btn-info" value="DANH SÁCH"></a>
                </div>
                <?php
                if (isset($thongbao) && ($thongbao != "")) echo "<div class='alert alert-info'>$thongbao</div>";
                ?>
            </form>
        </div>
    </div>
</div>
