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
                <?php if (!empty($data)) : ?>
                    <ul>
                        <?php foreach ($data as $error) : ?>
                            <p class="error">
                                <?php echo $error;?>
                            </p>
                        <?php endforeach; ?>
                    </ul>


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

