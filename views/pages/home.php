<?php $view -> component('start') ?>

<h1>HOme,sweet homeyyy</h1>
<div>
    <h2>New Movies</h2>
    <?php foreach($movies as $movie) {
        $view -> component('movie', ['movie' => $movie]);
    } ?>
</div>
<?php $view -> component('end')?>