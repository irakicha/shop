<div class="container product-container">
    <section class="row align-items-start product-filters">
        <div class="filter-name">Sort:</div>
        <div class="filter-item">
            <a href="">the cheapest</a>
        </div>
        <div class="filter-item">
            <a href="">most recent</a>
        </div>
    </section> <!--  product-filters -->

    <section class="row justify-content-between product-gallery">

        <?php foreach ($data as $product): ?>

            <div class="col-12 col-md-5 col-lg-3 product">
                <div class="product-img">
                    <a href="product/<?php echo $product['id']; ?>" class="product-link">
                        <img src="<?php echo $product['image'] ?>" alt="<?php echo $product['title']; ?>">
                    </a>
                </div>

                <h3 class="product-title">
                    <a href="product/<?php echo $product['id']; ?>"
                       class="product-item_link"><?php echo $product['title']; ?></a>
                </h3>
                <div class="product-description">
                    <p><?php echo $product['description']; ?></p>
                </div>
                <div class="row align-items-center product-details">
                    <div class="col-6 product-price">
                        <?php echo $product['price']; ?><span class="product-price_currency">USD</span>
                    </div>
                    <div class="col-6 btn-container">
                        <a href="/classes/AddToBasket.php?id=<?= $product['id'] ?>" class="btn add-to-cart">Add To
                            Cart</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>


    </section> <!--  product-gallery -->

    <section class="column pagination-container">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </section> <!--  pagination-container -->

</div>