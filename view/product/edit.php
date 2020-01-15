<div class="container">
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
            <textarea class="form-control" name="description" rows="3"><?php echo $product->getDescription() ?></textarea>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Phân loại</label>
            <select class="form-control" name="category" >
                <option>chon the loai</option>
                <option value="1">Đồ ăn</option>
                <option value="Đồ uống">Đồ uống</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Ảnh sản phẩm</label>
            <input type="file" class="form-control" name="img" value="<?php echo $product->getImg() ?>">
            <img src="images/<?php echo $product->getImg() ?>" style="width: 100px;height: 100px">
        </div>

        <button>Edit</button>
        <button>Thoat</button>
    </form>
</div>
