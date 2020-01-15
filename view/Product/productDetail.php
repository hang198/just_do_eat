
<div class="container">
    <div class="card">
        <div class="container-fliud">
            <div class="wrapper row">
                <div class="preview col-md-6">

                    <div class="preview-pic tab-content">
                        <div class="tab-pane active" id="pic-1"><img src="images/<?php echo $product->getImg() ?>" /></div>
                        <div class="tab-pane" id="pic-2"><img src="images/<?php echo $product->getImg() ?>" /></div>
                        <div class="tab-pane" id="pic-3"><img src="images/<?php echo $product->getImg() ?>" /></div>
                        <div class="tab-pane" id="pic-4"><img src="images/<?php echo $product->getImg() ?>" /></div>
                        <div class="tab-pane" id="pic-5"><img src="images/<?php echo $product->getImg() ?>" /></div>
                    </div>

                </div>
                <div class="details col-md-6">
                    <h3 class="product-title"><?php echo $product->getName() ?></h3>
                    <div class="rating">
                        <div class="stars">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                        <span class="review-no">41 reviews</span>
                    </div>
                    <p class="product-description"><?php echo $product->getDescription() ?></p>
                    <h4 class="price">current price:<span style="margin-left: 10px"><?php echo $product->getPrice() ?></span></h4>
                    <p class="vote"><strong>91%</strong> of buyers enjoyed this product! <strong>(87 votes)</strong></p>
                    <h5 class="colors">colors:
                        <span class="color orange not-available" data-toggle="tooltip" title="Not In store"></span>
                        <span class="color green"></span>
                        <span class="color blue"></span>
                    </h5>
                    <div class="action">
                        <button class="btn btn-warning" type="button">add to cart</button>
                        <button class="btn btn-warning" type="button"><span class="fa fa-heart"></span></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
