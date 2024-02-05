<?php $user = $auth -> user() ?>
<?php $baseUrl = $this -> config -> get('app.baseUrl')?>
<header>
    <button><a href="<?php echo $baseUrl ?>/home">Home</a></button>
    <button><a href="<?php echo $baseUrl ?>/movies">Movies</a></button>
    <?php if($auth -> checkIfAdmin()) { ?>
        <button><a href="<?php echo $baseUrl ?>/admin">Admin page</a></button>
    <?php } ?>
    <?php if($auth -> check()) { ?>
        <h3>Hello, <?php echo $user -> login() ?></h3>
        <form action="<?php echo $baseUrl ?>/logout" method="post">
            <button>Logout</button>
        </form>
    <?php }else{?>
        <button><a href="<?php echo $baseUrl ?>/login">Login</a></button>
        <button><a href="<?php echo $baseUrl ?>/reg">Register</a></button>
    <?php }?>
    <hr>
</header>