<?php $view -> component('start') ?>

<h1>Edit category page</h1>

<form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $category->id() ?>">
    <div>
        <label for="catName">Category name</label>
        <input type="text" name="catName" value="<?php echo $category->name(); ?>"/>
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

    <button >Save</button>
</form>

<?php $view -> component('end')?>