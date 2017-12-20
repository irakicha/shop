<?php
    require_once "products/products.php";
    include_once "layouts/header.php";
//    echo var_dump($products);
?>

	<main class="main">
		<div class="container">
			<div class="row">
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
                        <?php foreach ($products as $product): ?>
                            <div class="col-12 col-md-5 col-lg-3 product">
							    <div class="product-img">
								    <a href="<?php echo $product['name'];?>" class="product-link">
									    <img src="<?php echo $product['image']?>" alt="<?php echo $product['name'];?>">
								    </a>
							    </div>

								<h3 class="product-title">
									<a href="#" class="product-item_link"><?php echo $product['name'];?></a>
								</h3>
								<div class="product-description">
									<p><?php echo $product['description'];?></p>
								</div>
							<div class="row align-items-center product-details">
								<div class="col-6 product-price">
                                    <?php echo $product['price'];?><span class="product-price_currency">USD</span>
								</div>
								<div class="col-6 btn-container">
                                        <a href="/classes/AddToBasket.php?id=<?=$product['id']?>" class="btn add-to-cart">Add To Cart</a>
								</div>
							</div>   <!-- product-item-description  -->
						</div>  <!-- product -->
                        <?php endforeach;?>


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
			</div>
		</div>
	</main>

<?php
    include_once "layouts/footer.php";
?>