
<?php
if (is_array(($dm))) {
  extract($dm);
}
?>
<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center text-primary mb-4">Cập Nhật Danh Mục</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="index.php?act=update" method="post" class="p-4 border rounded shadow-sm bg-light">
                <div class="mb-3">
                    <label for="maloai" class="form-label">Mã Loại</label>
                    <input type="text" class="form-control" id="maloai" name="maloai" disabled>
                </div>
                <div class="mb-3">
                    <label for="tenloai" class="form-label">Tên Loại</label>
                    <input type="text" class="form-control" id="tenloai" name="tenloai" 
                           value="<?php if (isset($name) && ($name != '')) echo $name; ?>">
                </div>
                <input type="hidden" name="id" value="<?php if (isset($id) && ($id > 0)) echo $id; ?>">
                <div class="d-flex justify-content-between">
                <input type="hidden" name="id" value="<?php if (isset($id)&&($id>0)) echo $id; ?>">
                <input class="btn btn-info" type="submit" name="capnhat" value="Cập nhật">
                 <a href="index.php?act=lisdm"> <input type="button" class="btn btn-info" value="Danh sách"></a>
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
