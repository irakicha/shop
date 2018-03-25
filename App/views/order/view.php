<?php

?>

<h1 class="page-title">Order</h1>

<div class="col-12">
    <p>Status: <?php echo $orderStatus?></p>
</div>

<section class="col-12">
    <h2>User Information:</h2>
    <?php if (isset($orderUser)) : ?>
        <?php foreach ($orderUser as $property => $val) : ?>
            <p><?php echo $property;?> : <?php echo $val;?></p>
        <?php endforeach;?>
    <?endif;?>
</section>
<!---->
<!--        --><?php //print_r($order);?>

<?php if (isset($order)) : ?>
<table class="table table-hover order-table col-12">
    <thead class="thead-dark">
    <tr>
        <th scope="col">#</th>
        <th scope="col"></th>
        <th scope="col">Title</th>
        <th scope="col">Quantity</th>
        <th scope="col">Price</th>
        <th scope="col">Total</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($order as $item => $product) : ?>
        <tr>
            <td><?php echo $item+1?></td>
            <td>
                <a href="/product/<?php echo $product['id']; ?>">
                    <img src="<?php echo $product['image']; ?>" class="basket-table-img" alt="Car">

                </a>
            </td>
            <td>
                <a href="/product/<?php echo $product['id']; ?>">
                    <?php echo $product['title']; ?>
                </a>
            </td>
            <td>
                <?php echo $product['qty']; ?>
            </td>
            <td>
                <?php echo $product['price']; ?>
                <span class="product-price_currency">USD</span>
            </td>
            <td>
                <?php echo $product['subtotal']; ?>
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
            <?php echo $orderTotalSum; ?>
            <span class="product-price_currency">USD</span>
        </td>
    </tr>

    <tr>

    </tr>
    </tbody>
</table>


</section>
<?php endif;?>
