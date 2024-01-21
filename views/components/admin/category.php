
<div>
    <?php echo $category->name() ?>
    <form action="admin/categories/edit" method="post">
        <input type="hidden" name="id" value="<?php echo $category->id() ?>">

        <button>Edit</button>
    </form>
    <form action="admin/categories/delete" method="post">
        <input type="hidden" name="id" value="<?php echo $category->id() ?>">
        <button>Delete</button>
    </form>
</div> 