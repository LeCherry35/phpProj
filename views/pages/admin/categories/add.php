<?php $view -> component('start') ?>

<h1>Add Category page</h1>

<form action="" method="post" enctype="multipart/form-data">    
    <div>
        <label for="catName">Category name</label>
        <input type="text" name="catName">
    </div>
    <div>
    <?php if($session->has('catName')){ ?>
        <ul>
            <?php foreach($session->getFlash('catName') as $error) { ?>
                <li style="color: red;"><?= $error ?></li>
            <?php } ?>  
        </ul>
    <?php }?>

    </div>

    <button >Add</button>
</form>

<?php $view -> component('end')?>