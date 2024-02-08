<?php $currentUsers = $review->userId() === $this->session->get('user_id')?>
<div>
    <h3><?php echo $currentUsers ? 'Your' : $review->userName()?></h3>
    <h4><?php echo $review->rating()/10?></h4>
    <p><?php echo $review->review()?></p>
    <?php if($currentUsers){ ?>
        <form action="">
            <button>edit</button>
        </form>
    <?php } ?>
    <?php if($currentUsers && $this->session->get('is_admin')){ ?>
        <form action="/review/delete">
            <input type="hidden" name="id" value="<?php echo $review->id()?>">
            <button>delete</button>
        </form>
    <?php } ?>
</div>