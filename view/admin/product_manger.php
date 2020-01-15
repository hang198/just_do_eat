<div class="row col-9 ml-4 float-left text-light">
    <table class="table table-striped text-light">
        <tr>
            <th class="mt-3">#</th>
            <th class="mt-3">Product Name</th>
            <th class="mt-3">Price</th>
            <th class="mt-3">Quantity</th>
            <th class="mt-3">Description</th>
            <th class="mt-3">Image</th>
            <th class="mt-3">Category</th>
            <th>
                <a class="btn btn-success text-light" href="?page=addProduct">Add Product</a>
            </th>
        </tr>
        <?php foreach ($products as $key => $product): ?>
            <tr>
                <td><?php echo ++$key; ?></td>
                <td><?php echo $product->getName(); ?></td>
                <td><?php echo $product->getPrice(); ?></td>
                <td><?php echo $product->getQuantity(); ?></td>
                <td><?php echo $product->getDescription(); ?></td>
                <td><?php echo $product->getImg(); ?></td>
                <td><?php echo $product->getCategory(); ?></td>
                <td>
                    <a class="btn btn-danger text-light"
                       href="?page=deleteProduct&product_id=<?php echo $product->getProductId(); ?>">
                        Delete
                    </a>
                    <a class="btn btn-primary text-light"
                       href="?page=editProduct&product_id=<?php echo $product->getProductId(); ?>">Edit</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>