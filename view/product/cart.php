<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    foreach ($_SESSION["product_id"] as $key => $value) {
        if ($_SESSION["quantity"][$key] != $_POST["quantity$key"]) {
            $_SESSION["quantity"][$key] = $_POST["quantity$key"];
        }
    }
}

?>
<div class="container">
    <form method="post">
        <div class="card">
            <div class="col-12">
                <table class="table table-hover shopping-cart-wrap">
                    <thead class="text-muted">
                    <tr style="background-color: #9bc166; color: white" class="text-center">
                        <th scope="col">Product</th>
                        <th scope="col" width="120px">Quantity</th>
                        <th scope="col" width="120px">Price</th>
                        <th scope="col" width="200px">Action</th>
                    </tr>
                    </thead>
                    <?php foreach ($cart as $key => $product) : ?>
                        <tr class="text-center">
                            <td>
                                <figure class="media">
                                    <div class="img-wrap"><img src="images/<?php echo $product->getImg(); ?>"
                                                               class="img-thumbnail img-sm"></div>
                                    <figcaption class="media-body">
                                        <h6 class="title text-truncate"><?php echo $product->getName(); ?> </h6>
                                    </figcaption>
                                </figure>
                            </td>
                            <td>
                                <input type="number" class="form-control" name="quantity<?php echo $key ?>">
                            </td>
                            <td>
                                <div class="price-wrap">
                                    <var class="price"><?php echo $product->getPrice() ?></var>
                                    <small class="text-muted">(USD15 each)</small>
                                </div>
                            </td>
                            <td class="text-right">
                                <a href="index.php?page=cart&id=<?php echo $product->getProductId() ?>"
                                   class="btn btn-outline-danger btn-round"> × Remove</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <input type="submit" value="Mua Hàng" href="?page=getOrder" class="btn btn-outline-success">
            </div>
        </div>
    </form>
</div>
