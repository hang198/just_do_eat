<?php
session_start();
if ($_SESSION['position'] !== 'admin') {
    header("location: ../../index.php ");
}
?>
<div class="container col-8 float-left text-light" style="background: rgb(0,0,0,0.2)">
    <form method="post" class="mt-4 mb-4 need-validation">
        <div class="form-group">
            <label for="validationDefaultUsername">Tên mặt hàng</label>
            <input type="text" class="form-control text-light" id="validationCustomUsername"
                   style="background: rgb(0,0,0,0.1)" name="name" required>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Mô tả mặt hàng</label>
            <textarea class="form-control text-light" name="description" style="background: rgb(0,0,0,0.1)" rows="3">

            </textarea>
        </div>
        <input type="submit" value="Thêm sản phẩm" class="btn btn-success">
    </form>
</div>
