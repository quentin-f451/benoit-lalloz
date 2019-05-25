<div class="project__video">
    <?php $vimeo = str_replace("https://vimeo.com/", "https://player.vimeo.com/video/", $link); ?>
    <iframe src="<?php echo $vimeo ?>" class="js-videoPlayer" width="640" height="360"
        frameborder="0" allowfullscreen></iframe>
</div>