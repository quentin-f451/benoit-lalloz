<div class="grid__image grid__image--<?= $mediaArray['orientation'] ?> js-thumb">
	<?php if($mediaArray['status'] == 'listed') echo '<a href="' . $mediaArray["url"] . '">'; ?>
		<?php $first = reset($mediaArray['medias']); foreach($mediaArray['medias'] as $media): ?>
		<img class="thumb thumb--video lazyload <?php if($media != $first) echo 'thumb--hidden' ?>" 
            data-sizes="auto" 
            src="<?= $media['srcXSmall'] ?>"
			data-srcset="<?= $media['srcXSmall'] ?> 400w, <?= $media['srcSmall'] ?> 750w, <?= $media['srcMedium'] ?> 1000w, <?= $media['srcLarge'] ?> 1720w, <?= $media['srcXLarge'] ?> 2560w"
			alt="<?= $mediaArray['caption'] ?>">
		<?php endforeach; ?>
		<div class="thumb__caption"><?= $mediaArray['caption'] ?></div>
	<?php if($mediaArray['status'] == 'listed') echo '</a>'; ?>
</div>
<div class="grid__video">
	<div class="video">
		<?php $vimeo = str_replace("https://vimeo.com/", "https://player.vimeo.com/video/", $mediaArray['vimeo']); ?>
		<iframe src="<?php echo $vimeo ?>?&background=1&loop=0" class="js-videoPlayer" width="640" height="360"
			frameborder="0" allowfullscreen allow="autoplay"></iframe>
	</div>
	<div class="thumb__caption"><?= $mediaArray['caption'] ?></div>
</div>
<?php snippet('player') ?>