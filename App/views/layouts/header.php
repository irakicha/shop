<?php
include_once "head.php";

use App\Models\Storage;
use Core\Session;
?>

<body>
<header class="header">
    <div class="container header-container">
        <div class="row align-items-center">
            <div class="col-2 logo">
                <a href="/">
                    <img src="/images/logo.svg" width="60" height="60" alt="logo">
                </a>
            </div>
            <div class="col-7 menu">
                <nav class="row ">
                    <a href="/" class="menu-item">Home</a>
                    <a href="/categories" class="menu-item">Categories</a>
                    <a href="#" class="menu-item">Contact us</a>
                </nav>
            </div>
            <div class="col-3 service-links">
                <div class="row">
                    <div class="col service-links-container">
                        <div class="service-links-icon login">
                            <a href="/auth/login/">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                    <?php if (!Session::sessionExist()) : ?>
                        <div class="col service-links-container">
                        <div class="service-links-icon register">
                            <a href="/auth/register/">
                                <i class="fa fa-user-plus" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                    <?php else : ?>
                    <div class="col service-links-container">
                        <div class="service-links-icon logout">
                            <a href="/auth/logout/">
                                <i class="fa fa-user-times" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="col service-links-container">
                        <div class="service-links-icon">
                            <a href="/cart/">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                <span id="cart-count" class="cart-count"><?php echo Storage::productsInCartQty()?></span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>
