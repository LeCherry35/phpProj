<?php $view -> component('start')?>
<div>
    <h1><?php echo $movie->name() ?></h1>
    <img src="<?php echo $storage->url($movie->image()) ?>" alt="<?php echo $movie->name() ?>">
    <h2><?php echo $movie->rating() ?></h2>
    <p>Description:<?php echo $movie->description() ?></p>
    <p>Added <?php echo $movie->createdAt() ?></p>
    <hr>
    <?php if($auth -> check()) { 
        if(!$movie->hasUsersReview()){?>
        <h4>Your review</h4>
        <form action="review/add" method="post">
            <input type="hidden" name="movieId" value="<?php echo $movie->id() ?>">
            <label for="rating">Rating</label>
            <input type="range" name="rating" id="rating">
            <span id="ratingValue">5</span>
            <script>
                document.getElementById('rating').addEventListener('input', function() {
                    document.getElementById('ratingValue').innerHTML = this.value / 10;
                });
            </script>
            <br>
            <label for="review">Review</label>
            <textarea name="review" id="" cols="30" rows="10"></textarea>
            <br>
            <?php if($session->has('review')){ ?>
                <?php foreach($session->getFlash('review') as $error) { ?>
                    <li style="color: red;"><?= $error ?></li>
                <?php }} ?>  
            </ul>
            <button>Submit</button>
        </form>
    <?php }} else {?>
        <a href="login">Login to add a review</a>
    <?php } ?>
    <?php foreach($movie->reviews() as $review) { 
        $view -> component('review', ['review' => $review]);
    } ?>
</div>
<?php $view -> component('end')?>