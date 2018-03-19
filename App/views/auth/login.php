<?php
/**
 *
 */

?>
<div class="container login-page">
    <div class="row">
        <h1>Login page</h1>

        <div class="container">
            <div class="row">
                <?php if (!empty($errors)) : ?>
                        <?php foreach ($errors as $error) : ?>
                            <div class="alert alert-info" role="alert">
                                <?php echo $error;?>
                            </div>
                        <?php endforeach; ?>

                <?php endif; ?>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <form action="" method="POST">

                    <div class="add-column-item">
                        <input type="text" name="login" placeholder="Login" class="input">
                    </div> <!--  add-column-item -->

                    <div class="add-column-item">
                        <input type="password" name="password" placeholder="password" class="input">
                    </div>

                    <div class="add-column-item btn-container">
                        <button type="submit" class="btn login">Sign up</button>
                    </div>
                </form>
            </div>
        </div>


    </div>
</div>

