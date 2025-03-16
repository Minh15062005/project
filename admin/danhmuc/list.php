
<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center text-primary mb-4">Danh Sách Danh Mục</h1>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col text-end text-center">
            <a href="index.php?act=adddm" class="btn btn-primary ">Nhập thêm</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-striped table-hover text-center">
                <thead class="table-dark">
                    <tr>
                        <th scope="col"><input type="checkbox" id="selectAll"></th>
                        <th scope="col">Mã danh mục</th>
                        <th scope="col">Tên danh mục</th>
                        <th scope="col">Sửa & Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($listdanhmuc as $dmuc) {
                        extract($dmuc);
                        $suadm = "index.php?act=suadm&id=" . $id;
                        $xoadm = "index.php?act=xoadm&id=" . $id;
                        echo '<tr>
                                <td><input type="checkbox" name="select"></td>
                                <td>' . $id . '</td>
                                <td>' . $name . '</td>
                                <td>
                                    <a href="' . $suadm . '" class="btn btn-sm btn-warning">Sửa</a>
                                    <a href="' . $xoadm . '" class="btn btn-sm btn-danger" onclick="return confirm(\'Bạn có muốn xoá không?\')">Xóa</a>
                                </td>
                              </tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
