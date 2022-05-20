<nav class="top_nav">
<ul>
    <li>
        <!-- each link is in view folder path -->
        <a href="/mvc_framework/index">Home</a>
    </li>
    <li>
        <a href="<?php echo URLROOT;?>/pages/about">About</a>
    </li>
    <li>
        <a href="<?php echo URLROOT;?>/pages/projects">Projects</a>
    </li>
    <li>
        <a href="<?php echo URLROOT;?>/pages/blog">Blog</a>
    </li>
    <li>
        <a href="<?php echo URLROOT;?>/pages/contact">Contact</a>
    </li>
    <li class="btn_login">
        <?php if(isset($_SESSION['user_id'])) {?>
        <a href="/mvc_framework/users/logout">Log out</a>
        <?php }else{ ?>
            <a href="/mvc_framework/users/login">Log in</a>
        <?php } ?>
    </li>
</ul>
</nav>