<div class="col-12 mb-2">
    <?php foreach(ads() as $ad) { ?>
        <a href="<?php echo $ad['link'] ?>" target="_blank">
            <img src="<?php echo $ad['photo'] ?>" class="w-100" alt="">
        </a>
    <?php } ?>
</div>