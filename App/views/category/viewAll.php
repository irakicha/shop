<?php
/**
 * Created by PhpStorm.
 * User: ira
 * Date: 26.01.18
 * Time: 11:54
 */
?>

<div class="container category-container">
    <section class="row align-items-start product-filters">
        <div class="filter-name">Sort:</div>
        <div class="filter-item">
            <a href="">the cheapest</a>
        </div>
        <div class="filter-item">
            <a href="">most recent</a>
        </div>
    </section> <!--  product-filters -->

    <section class="container product-categories">
        <div class="row justify-content-between">
            <?php foreach ($data as $category_title): ?>
                <div class="col-3 category-title">
                    <h2>
                        <a href="/category/<?php echo $category_title; ?>">
                            <?php echo $category_title; ?>
                        </a>
                    </h2>
                </div>
            <? endforeach;?>
        </div>

    </section> <!--  product-filters -->

</div>