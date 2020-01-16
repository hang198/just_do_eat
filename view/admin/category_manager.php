<div class="row col-10 ml-2 float-left text-light" style="background: rgb(0,0,0,0.5)">
    <table class="table table-striped text-light">
        <tr>
            <th class="mt-3">#</th>
            <th class="mt-3">Tên mặt hàng</th>
            <th class="mt-3">Mô tả mặt hàng</th>
            <th colspan="2">
                <a class="btn btn-success text-light" href="?page=addCategory">&nbsp;&nbsp;&nbsp;Thêm mặt hàng&nbsp;&nbsp;&nbsp;</a>
            </th>
        </tr>
        <?php foreach ($categories as $key => $category): ?>
            <tr>
                <td><?php echo ++$key; ?></td>
                <td><?php echo $category->getName(); ?></td>
                <td><?php echo $category->getDescription(); ?></td>
                <td>
                    <a class="btn btn-danger text-light"
                       href="?page=deleteCategory&category_id=<?php echo $category->getCategoryId(); ?>">
                        Delete
                    </a>
                    <a class="btn btn-primary text-light ml-4"
                       href="?page=editCategory&category_id=<?php echo $category->getCategoryId(); ?>">Edit</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>