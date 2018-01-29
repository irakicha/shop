<?php
/**
 * Created by PhpStorm.
 * User: ira
 * Date: 23.01.18
 * Time: 23:36
 */
?>

<div class="container account-page">
    <div class="row">
        <div class="column ">
            <h1>Hello! <?php echo $login; ?> </h1>
            <p>Your personal information:</p>
            <p>email: <?php echo $email; ?></p>
            <p>phone: <?php echo $phone; ?></p>
            <p>address: <?php echo "$zip_code, $sity, $address"; ?></p>
        </div>
    </div>
</div>