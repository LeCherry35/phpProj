
<div>
    <?php echo $category->name() ?>
    <div>
        <button><a href="admin/categories/edit?id=<?php echo $category->id() ?>">Edit</a></button>
    </div>
    <form action="admin/categories/delete" method="post">
        <input type="hidden" name="id" value="<?php echo $category->id() ?>">
        <button>Delete</button>
    </form>
</div> 