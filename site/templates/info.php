<?php snippet('header') ?>

<article class="infos">
    <div class="infos__text">
			<p><a href="mailto:<?= $site->email()->html() ?>"><?= $site->email()->html() ?></a></p>
			<p><a href="http://instagram.com/<?= $site->instagram()->html() ?>"><?= $site->instagram()->html() ?></a></p>
		</div>
	<?php foreach ($site->files()->template('cover') as $media):?>
		<div class="infos__image">
				<img class="thumb thumb--simple" src="<?= $media->thumb('xlarge')->url(); ?>" srcset="<?= $media->thumb('xsmall')->url() ?> 400w, <?= $media->thumb('small')->url() ?> 750w, <?= $media->thumb('medium')->url() ?> 1000w, <?= $media->thumb('large')->url() ?> 1720w, <?= $media->thumb('xlarge')->url() ?> 2560w" alt="<?= $site->title() ?>">
		</div>
	<?php endforeach ?>
	<div class="infos__text">
		<?= $site->presentation()->kt() ?>
	</div>
</article>

<?php snippet('footer') ?>