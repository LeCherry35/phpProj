<div>
    <h3><?php echo $review->user()->login()?></h3>
    <h4><?php echo $review->rating()/10?></h4>
    <p><?php echo $review->review()?></p>
</div>