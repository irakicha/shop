<?php
include_once "head.php";
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
            <div class="col-8 menu">
                <nav class="row ">
                    <a href="/" class="menu-item">Home</a>
                    <a href="../../../public/index.php" class="menu-item">Basket</a>
                    <a href="../../../public/index.php" class="menu-item">Product</a>
                    <a href="#" class="menu-item">Contact us</a>
                </nav>
            </div>
            <div class="col-2 service-links">
                <div class="row">
                    <div class="col service-links-container">
                        <div class="service-links-icon">
                            <i class="fa fa-user" aria-hidden="true" onclick="location.href='../auth/login'"></i>
                        </div>
                    </div>
                    <div class="col service-links-container">
                        <div class="service-links-icon">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>
