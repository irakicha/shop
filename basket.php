<?php
    include_once "layouts/header.php";
?>

<main class="main basket-page">
    <div class="container">
        <div class="row">
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
                <tr>
                    <th scope="row">1</th>
                    <th><img src="/images/dummy_img_thumb.jpeg" alt="Car"></th>
                    <td>Peugeot 3008</td>
                    <td class="">
                        <div class="product__button-decrease">-</div>
                        <input type="text" name="count" value="1" class="product__count-input">
                        <div class="product__button-increase">+</div>
                        <div class="product__button-remove">
                            <span aria-hidden="true">&times;</span
                        </div>
                    </td>
                    <td>100 <span class="product-price_currency">USD</span></td>
                    <td>120 <span class="product-price_currency">USD</span></td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <th><img src="/images/dummy_img_thumb.jpeg" alt="Car"></th>
                    <td>Peugeot 3008</td>
                    <td>
                        <div class="product__button-decrease">-</div>
                        <input type="text" name="count" value="1" class="product__count-input">
                        <div class="product__button-increase">+</div>
                        <div class="product__button-remove">
                            <span aria-hidden="true">&times;</span
                        </div>
                    </td>
                    <td>100 <span class="product-price_currency">USD</td>
                    <td>120 <span class="product-price_currency">USD</span></td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <th><img src="/images/dummy_img_thumb.jpeg" alt="Car"></th>
                    <td>Peugeot 3008</td>
                    <td>
                        <div class="product__button-decrease">-</div>
                        <input type="text" name="count" value="1" class="product__count-input">
                        <div class="product__button-increase">+</div>
                        <div class="product__button-remove">
                            <span aria-hidden="true">&times;</span
                        </div>
                    </td>
                    <td>100 <span class="product-price_currency">USD</td>
                    <td>120 <span class="product-price_currency">USD</span></td>
                </tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Total</td>
                    <td>120 <span class="product-price_currency">USD</span></td>
                <tr>
                    
                </tr>
                </tbody>
            </table>
            <div class="row btn-row">
                <div class="col btn-container">
                    <button class="btn continue-shopping">Continue Shopping</button>
                    <button class="btn buy">Buy</button>
                </div>
            </div>

        </div>
    </div>
</main>
<?php
    include_once "layouts/footer.php";
?>
