<div>
    <img src="<?php echo $storage->url($movie->image()) ?>" alt="<?php echo $movie->name() ?>">
    <h4><?php echo $movie->name() ?></h4>
    <p><?php echo $movie->description() ?></p>
    <div>
        <button><a href="admin/movies/edit?id=<?php echo $movie->id() ?>">Edit</a></button>
    </div>
    <form action="admin/movies/delete" method="post">
        <input type="hidden" name="id" value="<?php echo $movie->id() ?>">
        <button>Delete</button>
    </form>
</div>