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
            <h2>SIGN IN</h2>
            <form method="post" action="/mvc_framework/users/login">

                <input type="text" name="username" placeholder="Username *">
                <span class="invalidFeedBack">
                    <?php echo $data['usernameError'];?>
                </span>

                <input type="password" name="password" placeholder="password *">
                <span class="invalidFeedBack">
                    <?php echo $data['passwordError'];?>
                </span>

                <button type="submit" value="submit" class="submit">submit</button>

                <!-- not registered but to create an account -->
                <p class="options">Not registered yet?<a href="/mvc_framework/users/register">Create an account</a></p>

            </form>
        </div>
    </div>

</div>