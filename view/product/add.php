<?php
session_start();
if ($_SESSION['position'] !== 'admin') {
    header("location: ../../index.php ");
}
?>
<div class="container col-8 float-left text-light" style="background: rgb(0,0,0,0.2)">
    <form method="post" enctype="multipart/form-data" class="mt-4 mb-4">
        <div class="form-group">
            <label for="exampleFormControlInput1">Tên sản phẩm</label>
            <input type="text" class="form-control text-light"  style="background: rgb(0,0,0,0.1)" name="name" required>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Giá</label>
            <input type="number" class="form-control text-light" name="price" style="background: rgb(0,0,0,0.1)" required>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Số lượng</label>
            <input type="number" class="form-control text-light" name="quantity" style="background: rgb(0,0,0,0.1)">
        </div>
        <div class="form-group">
            <label>Ghi chú</label>
            <textarea class="form-control text-light" name="description" rows="3"
                      style="background: rgb(0,0,0,0.1)"></textarea>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Phân loại</label>
            <select class="form-control" name="category" required>
                <?php foreach ($categories as $category): ?>
                    <option value="<?php echo $category->getCategoryId(); ?>"><?php echo $category->getName(); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Ảnh sản phẩm</label>
            <input type="file" class="form-control text-light" name="img" style="background: rgb(0,0,0,0.1)">
        </div>
        <input type="submit" value="Thêm sản phẩm" class="btn btn-success">
        <a href="?page=addProduct" class="btn btn-secondary">Thoát</a>
    </form>
</div>
