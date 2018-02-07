<h1 class="page-title"><?php echo $title ;?></h1>

<div class="row justify-content-between product-row ">
    <div class="col-5 product-img">
            <img src="<?php echo $image ;?>" alt="<?php echo $name ;?>">
    </div>
    <div class="col-6">
        <div class="product-description">
            <p><?php echo $description;?></p>
        </div>
        <div class="row align-items-center product-details">
            <div class="col product-price">
                <div><?php echo $price;?><span class="product-price_currency">USD</span></div>
            </div>
            <div class="col btn-container">
                <a href="/cart/add/<?php echo $id ?>" data-id="<?php echo $product['id'] ?>" class="btn add-to-cart">Add To Cart</a>
            </div>
        </div>
    </div>
</div>