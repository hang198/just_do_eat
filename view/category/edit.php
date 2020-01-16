<?php
session_start();
if ($_SESSION['position'] !== 'admin') {
    header("location: ../../index.php ");
}
?>
<div class="container col-8 float-left text-light" style="background: rgb(0,0,0,0.2)">
    <form method="post" class="mt-4 mb-4">
        <div class="form-group">
            <label for="exampleFormControlInput1">Tên mặt hàng</label>
            <input type="text" class="form-control text-light" style="background: rgb(0,0,0,0.1)" name="name" value="<?php echo $category->getName(); ?>">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Mô tả mặt hàng</label>
            <textarea class="form-control text-light" name="description" style="background: rgb(0,0,0,0.1)" rows="3"><?php echo $category->getDescription(); ?></textarea>
        </div>
        <input type="submit" value="Sửa thông tin sản phẩm" class="btn btn-success" onclick="return confirm('bạn có chắc chắn muốn sửa thông tin loại này không ?')">
        <input type="reset" class="btn btn-danger" value="Reset">
    </form>
</div>

