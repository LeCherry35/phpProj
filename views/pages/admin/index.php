<?php $view -> component('start') ?>

<main>
    <h1>Admin panel</h1>
    <div>
        <h2>Movies</h2>
        <?php foreach($movies as $movie) { 
                $view -> component('admin/movie', ['movie' => $movie]);
            } ?>
        <button><a href="admin/movies/add">Add film</a></button>
    </div>
    <div>
        <h2>Categories</h2>
        <?php foreach($categories as $category) { 
            $view -> component('admin/category', ['category' => $category]);
         } ?>
        <button><a href="admin/categories/add">Add category</a></button>
    </div>

</main>


<?php $view -> component('end')?>