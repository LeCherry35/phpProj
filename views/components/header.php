<?php $user = $auth -> user() ?>
<header>
    <?php if($auth -> check()) { ?>
        <h3>Hello, <?php echo $user -> login() ?></h3>
        <form action="logout" method="post">
            <button>Logout</button>
        </form>
    <?php }else{?>
        <button><a href="login">Login</a></button>
        <button><a href="reg">Register</a></button>
    <?php }?>
    <hr>
</header>