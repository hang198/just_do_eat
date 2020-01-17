<div class="container">
    <div class="card">
        <div class="col-12">
            <table class="table table-hover shopping-cart-wrap">
                <thead class="text-muted">
                <tr style="background-color: #9bc166; color: white">
                    <th scope="col">Product</th>
                    <th scope="col" width="120px">Quantity</th>
                    <th scope="col" width="120px">Price</th>
                    <th scope="col" width="200px">Action</th>
                </tr>
                </thead>
                <tbody>

<!--list product-->
            <?php foreach ($products as $product) :?>
                <tr>
                    <td>
                        <figure class="media">
                            <div class="img-wrap"><img src="images/<?php echo $product->getImg(); ?>"
                                                                class="img-thumbnail img-sm"></div>
                            <figcaption class="media-body">
                                <h6 class="title text-truncate"><?php echo $product->getName(); ?> </h6>
                                <dl class="param param-inline small">
                                    <dt><?php echo $product->getDescription() ?></dt>

                                </dl>
                            </figcaption>
                        </figure>
                    </td>
                    <td>
                        <input type="number" class="form-control">
                    </td>
                    <td>
                        <div class="price-wrap">
                            <var class="price"><?php echo $product->getPrice() ?></var>
                            <small class="text-muted">(USD15 each)</small>
                        </div> <!-- price-wrap .// -->
                    </td>
                    <td class="text-right">
                        <a href="index.php?page=cart&id=<?php echo $product->getProductId() ?>" class="btn btn-outline-danger btn-round"> × Remove</a>
                    </td>
                </tr>
            <?php endforeach; ?>
                </tbody>
            </table>

<!-- list product-->

            <div style="float: right; margin-right:35px">
                <button class="btn btn-outline-success" >Mua hang</button>
            </div>
        </div>
    </div>
</div>

