<?php
session_start();
if ($_SESSION['position'] !== 'admin') {
    header("location: ../../index.php ");
}
?>
<div class="container col-8 float-left text-light" style="background: rgb(0,0,0,0.2)">
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="exampleFormControlInput1">Tên sản phẩm</label>
            <input type="text" class="form-control" name="name" value="<?php echo $product->getName() ?>">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Giá</label>
            <input type="number" class="form-control" name="price" value="<?php echo $product->getPrice() ?>">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Số lượng</label>
            <input type="number" class="form-control" name="quantity" value="<?php echo $product->getQuantity() ?>">
        </div>
        <div class="form-group">
            <label>Ghi chú</label>
            <textarea class="form-control" name="description"
                      rows="3"><?php echo $product->getDescription() ?></textarea>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Phân loại</label>
            <select class="form-control" name="category" required>
                <?php foreach ($categories as $category): ?>
                    <option value="<?php echo $category->getCategoryId(); ?>" <?php if ($product->getProductId() == $category->getCategoryId()) echo "selected" ?>><?php echo $category->getName(); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="exampleFormControlInput1">Ảnh sản phẩm</label>
            <input type="file" name="img" class="form-control mb-2" value="<?php echo $product->getImg(); ?>">
            <img src="../../images/<?php echo $product->getImg() ?>" style="width: 100px;height: 100px">
        </div>

        <input type="submit" value="Edit" class="btn btn-secondary mb-3" onclick="return confirm('bạn có chắc chắn muốn sửa sản phẩm này không ?')">
        <input type="reset" class="btn btn-danger mb-3" value="Reset">
    </form>
</div>
