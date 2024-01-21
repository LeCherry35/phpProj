<?php $view -> component('start') ?>

<main>
    <h1>Admin panel</h1>
    <button><a href="admin/movies/add">Add film</a></button>
    <div>
        <?php foreach($categories as $category) { 
            $view -> component('admin/category', ['category' => $category]);
         } ?>
    </div>
    <button><a href="admin/categories/add">Add category</a></button>

</main>


<?php $view -> component('end')?>