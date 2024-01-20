<?php $view -> component('start') ?>

<h1>Register page</h1>

<form action="reg" method="post">
    <div>
        <label for="login">Login</label>
        <input type="text" name="login" id="email">
    </div>
    <?php if($session->has('login')){ ?>
        <ul>
            <?php foreach($session->getFlash('login') as $error) { ?>
                <li style="color: red;"><?= $error ?></li>
            <?php } ?>  
        </ul>
    <?php }?>
    <div>
        <label for="email">Email</label>
        <input type="text" name="email" id="email">
    </div>
    <div>
    <?php if($session->has('email')){ ?>
        <ul>
            <?php foreach($session->getFlash('email') as $error) { ?>
                <li style="color: red;"><?= $error ?></li>
            <?php } ?>  
        </ul>
    <?php }?>

    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
    </div>

    <div>
    <?php if($session->has('password')){ ?>
        <ul>
            <?php foreach($session->getFlash('password') as $error) { ?>
                <li style="color: red;"><?= $error ?></li>
            <?php } ?>  
        </ul>
    <?php }?>

    </div>
    <button>Register</button>
</form>

<?php $view -> component('end')?>