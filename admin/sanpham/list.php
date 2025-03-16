<div class="container mt-4">
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="text-center text-primary">DANH SÁCH SẢN PHẨM</h1>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-12 text-center">
            <a href="index.php?act=addsp" class="btn btn-primary">Nhập thêm</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th></th>
                            <th>Mã sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Hình</th>
                            <th>Giá</th>
                            <th>Lượt xem</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($listsanpham as $sanpham) {
                            extract($sanpham);
                            $suasp = "index.php?act=suasp&id=" . $id;
                            $xoasp = "index.php?act=xoasp&id=" . $id;
                            $hinhpath = "../upload/" . $img;
                            if (is_file($hinhpath)) {
                                $hinh = "<img src='" . $hinhpath . "' height='80'>";
                            } else {
                                $hinh = "no photo";
                            }

                            echo '<tr>
                                <td><input type="checkbox" name="" id=""></td>
                                <td>' . $id . '</td>
                                <td>' . $name . '</td>
                                <td>' . $hinh . '</td>
                                <td>' . $price . '</td>
                                <td>' . $luotxem . '</td>
                                <td>
                                    <a href="' . $suasp . '" class="btn btn-warning btn-sm">Sửa</a>
                                    <a href="' . $xoasp . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Bạn có muốn xoá sản phẩm này?\')">Xóa</a>
                                </td>
                            </tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
