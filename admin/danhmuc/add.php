<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center text-primary mb-4">Thêm Danh Mục Mới</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="index.php?act=adddm" method="post" class="p-4 border rounded shadow-sm bg-light">
                <div class="mb-3">
                    <label for="maloai" class="form-label">Mã Loại Danh Mục</label>
                    <input type="text" class="form-control" id="maloai" name="maloai" disabled>
                </div>
                <div class="mb-3">
                    <label for="tenloai" class="form-label">Tên Loại Danh Mục</label>
                    <input type="text" class="form-control" id="tenloai" name="tenloai">
                </div>
                <div class="d-flex justify-content-between">
                <input type="submit" name="themmoi" class="btn btn-danger" value="Thêm mới">
                <a href="index.php?act=listdm"> <input type="button" class="btn btn-danger" value="Danh sách"></a>
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
