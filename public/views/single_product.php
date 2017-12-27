<?php
include_once "layouts/header.php";
?>

<main class="main product-page">
    <div class="container">
        <div class="row">
            <h1 class="page-title">Peugeot 3008</h1>
            <div class="row justify-content-between product-row">
                <div class="col-5 product-img">
                    <a href="#">
                        <img src="/images/dummy_img.jpeg" alt="Car">
                    </a>
                </div>
                <div class="col-5">
                    <div class="product-description">
                        <p>At Peugeot we pride ourselves on innovation. Award-winning PureTech 3-cylinder engine technology is just another example of this. PureTech provides the drive and performance normally associated with bigger engines but with significantly improved fuel consumption.</p>
                    </div>
                    <div class="row align-items-center product-details">
                        <div class="col product-price">
                            <div>650000<span class="product-price_currency">USD</span></div>
                        </div>
                        <div class="col btn-container">
                            <button class="btn add-to-cart">Add To Cart</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main>

<?php
include_once "layouts/footer.php";
?>