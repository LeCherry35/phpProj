<?php $view -> component('start') ?>

<h1>Add Movie page</h1>

<form action="" method="post" enctype="multipart/form-data">    
    <div>
        <label for="name">Name</label>
        <input type="text" name="name">
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
    <div>
    <label for="description">Description</label>
    <textarea name="description"></textarea>
    </div>
    <div>
        <label for="image">Image</label>
        <input type="file" name="image">
    </div>
    <div>
        <label for="category">Category</label>
        <select name="category">
            <?php foreach($categories as $category) { ?>
                <option value="<?php echo $category->id() ?>"><?php echo $category->name() ?></option>
            <?php } ?>
        </select>
    </div>

    <button >Add</button>
</form>

<?php $view -> component('end')?>