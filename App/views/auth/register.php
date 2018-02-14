<?php
/**
 *
 */
?>
<div class="container register-page">
    <div class="row">

        <h1>Register page</h1>

        <div class="container">
            <div class="row">
                <?php if (!empty($data)) : ?>
                    <?php foreach ($data as $error) : ?>
                        <div class="alert alert-info" role="alert">
                            <?php echo $error; ?>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <form action="" method="POST">

                    <div class="add-column-item">
                        <input type="text" name="login" placeholder="Login" class="input" required>
                    </div> <!--  add-column-item -->

                    <div class="add-column-item">
                        <input type="email" name="email" placeholder="Email" class="input" required>
                    </div> <!--  add-column-item -->

                    <div class="add-column-item">
                        <input type="tel" name="phone" placeholder="Phone" class="input" required>
                    </div> <!--  add-column-item -->

                    <div class="add-column-item">
                        <input type="text" name="city" placeholder="City" class="input" required>
                    </div> <!--  add-column-item -->

                    <div class="add-column-item">
                        <input type="text" name="address" placeholder="Address" class="input" required>
                    </div> <!--  add-column-item -->

                    <div class="add-column-item">
                        <input type="number" name="zip-code" placeholder="Zip code" class="input" required>
                    </div> <!--  add-column-item -->

                    <div class="add-column-item">
                        <input type="password" name="password" placeholder="Password" class="input" required>
                    </div>

                    <div class="add-column-item btn-container">
                        <button type="submit" class="btn login">Sign up</button>
                    </div>
                </form>
            </div>
        </div>


    </div>
</div>