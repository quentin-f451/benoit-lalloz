<?php snippet('header') ?>

<div class="project">
    <div class="project__text">
		<?= $page->legendeAuto()->toCaption('home'); ?>
    </div>

    <div class="project__text">
        <?= $page->projetText()->kt(); ?>
    </div>

    <div class="project__images">
		<?php foreach ($page->files()->template('galerie') as $media):?>
			<div class="project__image">
				<img class="thumb thumb--simple" src="<?= $media->thumb('xlarge')->url(); ?>" srcset="<?= $media->thumb('xsmall')->url() ?> 400w, <?= $media->thumb('small')->url() ?> 750w, <?= $media->thumb('medium')->url() ?> 1000w, <?= $media->thumb('large')->url() ?> 1720w, <?= $media->thumb('xlarge')->url() ?> 2560w" alt="<?= $page->legendeAuto()->toCaption('home'); ?>">
			</div>
		<?php endforeach ?>
    </div>

    <div class="project__text project__text--credits">
        <?= $page->credits()->kt(); ?>
    </div>
</div>

<?php snippet('footer') ?>