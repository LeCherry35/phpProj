<?php $view -> component('start') ?>

<h1>Login page</h1>

<form action="" method="post">
        <div>
    <?php if($session->has('error')){ ?>
        <p style="color: red;">
            <?php echo $session-> has('error') ?> 
        </p>
    <?php }?>

    </div>
    <div>
        <label for="email">Login</label>
        <input type="text" name="email" id="email">
    </div>

    <div>
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
    </div>

    <button>Login</button>
</form>

<?php $view -> component('end')?>