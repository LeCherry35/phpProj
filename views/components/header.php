<?php $user = $auth -> user() ?>
<header>
    <?php if($auth -> check()) { ?>
        <h3>Email: <?php echo $user -> email() ?></h3>
        <form action="logout" method="post">
            <button>Logout</button>
        </form>
        <hr>
    <?php }?>
</header>