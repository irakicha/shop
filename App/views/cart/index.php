<?php

use App\Models\Storage;

?>
<h1 class="page-title">Basket</h1>
<table class="table table-hover basket-table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">#</th>
        <th scope="col"></th>
        <th scope="col">Product</th>
        <th scope="col">Qty</th>
        <th scope="col">Price</th>
        <th scope="col">Total</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($productsInCart as $index => $product) : ?>
    <tr data-id="<?php echo($product['id']); ?>">
        <td><?php echo $index+1?></td>
        <td>
            <a href="/product/<?php echo $product['id']; ?>">
                <img src="<?php echo $product['image']; ?>" class="basket-table-img" alt="Car">

            </a>
        </td>
        <td>
            <a href="/product/<?php echo $product['id']; ?>">
                <?php echo $product['title']; ?></td>
            </a>
        <td>
            <div class="product__button-decrease">-</div>
            <input type="text" name="count" value="<?php echo Storage::productsInCartQty($product['id']); ?>"class="product__count-input">
            <div class="product__button-increase">+</div>
            <div class="product__button-remove" data-id="<?php echo($product['id']); ?>">
                <span aria-hidden="true">&times;</span>
            </div>
        </td>
        <td>
            <?php echo $product['price']; ?>
            <span class="product-price_currency">USD</span>
        </td>
        <td>
            <?php echo Storage::getProductSubtotal($product['id'], $product['price']); ?>
            <span class="product-price_currency">USD</span>
        </td>
    </tr>
    <?php endforeach;?>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>Total</td>
        <td>
            <?php echo Storage::getTotalPrice($productsInCart); ?>
            <span class="product-price_currency">USD</span>
        </td>
    </tr>

    <tr>

    </tr>
    </tbody>
</table>
<div class="row btn-row">
    <div class="col btn-container">
        <a href="/" class="btn continue-shopping">Continue Shopping</a>
        <button class="btn buy">Buy</button>
    </div>
</div>
