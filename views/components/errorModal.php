<?php if ($this ->session->has('global_error')) { ?>
<div class="error-modal" onclick="this.remove()">
    <p>
        <?php echo $this ->session->getFlash('global_error'); ?>
    </p>
    <h3>Click to close</h3>
</div>
<?php } ?>