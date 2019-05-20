<?php snippet('header') ?>

  <div class="header js-header">
    <div class="header__logo header__logo--back js-logo"><a href="/">back</a></div>
  </div>
  
  <main class="main js-main">
    <div class="content proj js-content">

<div class="project">
    <h1 class="project__text">
		<?= $page->legendeAuto()->toCaption('home'); ?>
    </h1>

    <div class="project__text">
        <?= $page->projetText()->kt(); ?>
    </div>

    <div class="project__images">
        <?php 
            if ($page->projetVimeo()->isNotEmpty() && $page->vimeoPosition() == "first") 
            snippet('vimeoProjet', ['link' => $page->projetVimeo()->html()]); 
        ?>
		<?php foreach ($page->files()->template('galerie')->sortBy('sort','asc') as $media):?>
			<div class="project__image">
				<img class="thumb thumb--simple thumb--contain lazyload blur" 
                data-sizes="auto" 
                src="<?= $media->thumb('blur')->url(); ?>" 
                data-srcset="<?= $media->thumb('xsmall')->url() ?> 400w, <?= $media->thumb('small')->url() ?> 750w, <?= $media->thumb('medium')->url() ?> 1000w, <?= $media->thumb('large')->url() ?> 1720w, <?= $media->thumb('xlarge')->url() ?> 2560w" 
                alt="<?= $page->legendeAuto()->toCaption('home'); ?>">
			</div>
		<?php endforeach ?>
        <?php 
            if ($page->projetVimeo()->isNotEmpty() && $page->vimeoPosition() == "last") 
            snippet('vimeoProjet', ['link' => $page->projetVimeo()->html()]); 
        ?>
    </div>

    <div class="project__text project__text--credits">
        <?= $page->credits()->kt(); ?>
    </div>
</div>

<?php 
    if(isset($_COOKIE['filter'])) $filter = $_COOKIE['filter'];
    if($_COOKIE['filter'] == 'all') $filter = '';
    $projectsFilter = $site->children()->published()->filterProject($filter);
    $projetKey = array_search($page->id(), $projectsFilter);
    if ($projetKey < count($projectsFilter) - 1) {
        $nextProject = $projectsFilter[$projetKey + 1];
    } else {
        $nextProject = $projectsFilter[0];
    }
?>
<div class="jump"><a href="<?= $site->find($nextProject)->url() ?>">Jump to next project</a></div>

<?php snippet('footer') ?>