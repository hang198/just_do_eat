<div class="container col-8 float-left text-light" style="background: rgb(0,0,0,0.2)">
    <form method="post" enctype="multipart/form-data" class="mt-4 mb-4">
        <div class="form-group">
            <label for="exampleFormControlInput1">Tên sản phẩm</label>
            <input type="text" class="form-control text-light" style="background: rgb(0,0,0,0.1)" name="name">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Giá</label>
            <input type="number" class="form-control text-light" name="price" style="background: rgb(0,0,0,0.1)">
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
            <select class="form-control text-light" name="category" style="background: rgb(0,0,0,0.1)">
                <option class="text-dark">chon the loai</option>
                <option value="1" class="text-dark">Đồ ăn</option>
                <option value="2" class="text-dark">Đồ uống</option>
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
