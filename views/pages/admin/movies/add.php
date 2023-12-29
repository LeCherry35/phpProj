<?php $view -> component('start') ?>

<h1>Add Movie page</h1>

<form action="" method="post">    
    <div>
        <label for="name">Name</label>
        <input type="text" name="name" id="name">
    </div>
    <div>
    <?php if($session->has('name')){ ?>
        <ul>
            <?php foreach($session->getFlash('name') as $error) { ?>
                <li style="color: red;"><?= $error ?></li>
            <?php } ?>  
        </ul>
    <?php }?>

    </div>

    <button >Add</button>
    <!-- <?php dd($session);?> -->
</form>

<?php $view -> component('end')?>