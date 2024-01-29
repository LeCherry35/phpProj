<a href="movie?id=<?php echo $movie->id() ?>">
    <img src="<?php echo $storage->url($movie->image()) ?>" alt="<?php echo $movie->name() ?>">
    <h4><?php echo $movie->name() ?></h4>
    <p><?php echo $movie->description() ?></p>
</a>