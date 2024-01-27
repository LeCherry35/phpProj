<?php $view -> component('start') ?>


<h1>Edit Movie page</h1>
<img src="<?php echo $storage->url($movie->image()) ?>" alt="<?php echo $movie->name() ?>">
<form action="" method="post" enctype="multipart/form-data">    
    <input type="hidden" name="id" value="<?php echo $movie->id() ?>">
    <div>
        <label for="name">Name</label>
        <input type="text" name="name" value=<?php echo $movie->name()?>>
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
    <textarea name="description"><?php echo $movie->description()?></textarea>
    </div>
    <!-- <div>
        <label for="image">Image</label>
        <input type="file" name="image">
    </div> -->
    <div>
        <label for="category">Category</label>
        <select name="category">
            <?php foreach($categories as $category) { ?>
                <option value="<?php echo $category->id() ?>" <?php echo $category->id() === $movie->categoryId() ? 'selected' : ''?>><?php echo $category->name() ?></option>
            <?php } ?>
        </select>
    </div>

    <button >Save</button>
</form>

<?php $view -> component('end')?>