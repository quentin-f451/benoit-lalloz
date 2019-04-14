<div class="grid__image grid__image--<?= $mediaArray['orientation'] ?>">
	<?php if($mediaArray['status'] == 'listed') echo '<a href="' . $mediaArray["url"] . '">'; ?>
		<img class="thumb thumb--simple" src="<?= $mediaArray['srcXLarge'] ?>"
			srcset="<?= $mediaArray['srcXSmall'] ?> 400w, <?= $mediaArray['srcSmall'] ?> 750w, <?= $mediaArray['srcMedium'] ?> 1000w, <?= $mediaArray['srcLarge'] ?> 1720w, <?= $mediaArray['srcXLarge'] ?> 2560w"
			alt="<?= $mediaArray['caption'] ?>">
		<div class="thumb__caption"><?= $mediaArray['caption'] ?></div>
	<?php if($mediaArray['status'] == 'listed') echo '</a>'; ?>
</div>