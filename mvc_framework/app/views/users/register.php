<?php


//----> requiring head & nav

require APPROOT . '/views/includes/head.php';

?>
<div class="navbar">


    <?php
    //----> requiring head & nav
    require APPROOT . '/views/includes/nav.php';
    ?>

    <div class="container_login">
        <div class="wrapper_login">
            <h2>Register</h2>
            <form method="post" action="/mvc_framework/users/register">

                <input type="text" name="username" placeholder="Username *">
                <span class="invalidFeedBack">
                    <?php echo $data['usernameError'];?>
                </span>

                <input type="email" name="email" placeholder="Email *">
                <span class="invalidFeedBack">
                    <?php echo $data['emailError'];?>
                </span>

                <input type="password" name="password" placeholder="password *">
                <span class="invalidFeedBack">
                    <?php echo $data['passwordError'];?>
                </span>

                <input type="password" name="confirmPassword" placeholder="confirmPassword *">
                <span class="invalidFeedBack">
                    <?php echo $data['confirmPasswordError'];?>
                </span>

                <button type="submit" value="submit" class="submit">Register Now</button>

                <!-- not registered but to create an account -->
                <!-- <p class="options">Not registered yet?<a href="<?php echo URLROOT;?>/users/register">Create an account</a></p> -->

            </form>
        </div>
    </div>

</div>