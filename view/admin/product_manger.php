<?php
session_start();
if ($_SESSION['position'] !== 'admin') {
    header("location: ../../index.php ");
}
?>
<div class="row col-10 ml-2 float-left text-light" style="background: rgb(0,0,0,0.5)">
    <table class="table table-striped text-light">
        <tr>
            <th class="mt-3">#</th>
            <th class="mt-3">Tên sản phẩm</th>
            <th class="mt-3">Giá</th>
            <th class="mt-3">Số lượng</th>
            <th class="mt-3">Mô tả</th>
            <th class="mt-3">Hình ảnh</th>
            <th class="mt-3">Loại hàng</th>
            <th colspan="2">
                <a class="btn btn-success text-light" href="?page=addProduct">&nbsp;&nbsp;&nbsp;Add Product&nbsp;&nbsp;&nbsp;</a>
            </th>
        </tr>
        <?php foreach ($products as $key => $product): ?>
            <tr>
                <td><?php echo ++$key; ?></td>
                <td><?php echo $product->getName(); ?></td>
                <td><?php echo $product->getPrice(); ?></td>
                <td><?php echo $product->getQuantity(); ?></td>
                <td><?php echo $product->getDescription(); ?></td>
                <td><img src="../../images/<?php echo $product->getImg(); ?>" style="width: 50px; height: 50px"></td>
                <td><?php echo $product->getCategory(); ?></td>
                <td>
                    <a class="btn btn-danger text-light"
                       href="?page=deleteProduct&product_id=<?php echo $product->getProductId(); ?>"
                       onclick="return confirm('bạn có chắc chắn muốn xóa sản phẩm này không ?')">
                        Delete
                    </a>
                </td>
                <td>
                    <a class="btn btn-primary text-light"
                       href="?page=editProduct&product_id=<?php echo $product->getProductId(); ?>">Edit</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>