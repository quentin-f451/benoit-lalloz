<!doctype html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
  <?php if($page->template() == 'default'): ?>
    <title><?= $site->title() ?> | Light Studio</title>
    <meta name="description" content="<?= $site->descriptionSeo()->html() ?>">
  <?php else: ?>
    <title><?= $site->title() ?> | <?= $page->title() ?></title>
    <?php if($page->projetText()->isNotEmpty()): ?>
        <meta name="description" content="<?= $page->projetText()->html(); ?>">
    <?php else: ?>
        <meta name="description" content="<?= $page->legendeAuto()->toCaption('home'); ?>">
    <?php endif; ?>
  <?php endif; ?>

  <meta name="author" content="">

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

  <link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?php snippet('favicon', ['size' => 57]); ?>" />
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php snippet('favicon', ['size' => 114]); ?>" />
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php snippet('favicon', ['size' => 72]); ?>" />
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php snippet('favicon', ['size' => 144]); ?>" />
  <link rel="apple-touch-icon-precomposed" sizes="60x60" href="<?php snippet('favicon', ['size' => 60]); ?>" />
  <link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?php snippet('favicon', ['size' => 120]); ?>" />
  <link rel="apple-touch-icon-precomposed" sizes="76x76" href="<?php snippet('favicon', ['size' => 76]); ?>" />
  <link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?php snippet('favicon', ['size' => 152]); ?>" />
  <link rel="icon" type="image/png" href="<?php snippet('favicon', ['size' => 196]); ?>" sizes="196x196" />
  <link rel="icon" type="image/png" href="<?php snippet('favicon', ['size' => 96]); ?>" sizes="96x96" />
  <link rel="icon" type="image/png" href="<?php snippet('favicon', ['size' => 32]); ?>" sizes="32x32" />
  <link rel="icon" type="image/png" href="<?php snippet('favicon', ['size' => 16]); ?>" sizes="16x16" />
  <link rel="icon" type="image/png" href="<?php snippet('favicon', ['size' => 128]); ?>" sizes="128x128" />
  <meta name="application-name" content="&nbsp;" />
  <meta name="msapplication-TileColor" content="#FFFFFF" />
  <meta name="msapplication-TileImage" content="<?php snippet('favicon', ['size' => 144]); ?>" />
  <meta name="msapplication-square70x70logo" content="<?php snippet('favicon', ['size' => 70]); ?>" />
  <meta name="msapplication-square150x150logo" content="<?php snippet('favicon', ['size' => 150]); ?>" />
  <meta name="msapplication-wide310x150logo" content="<?php snippet('favicon', ['size' => 310]); ?>" />
  <meta name="msapplication-square310x310logo" content="<?php snippet('favicon', ['size' => 310]); ?>" />

  <meta property="og:url" content="<?= $site->url() ?>">
  <meta property="og:type" content="website">
  <meta property="og:title" content="<?= $site->title() ?> | <?= $page->title() ?>">

  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?= $site->title() ?> | <?= $page->title() ?>">


  <?php if($page->template() == 'default'): ?>
    <meta property="og:description" content="<?= $site->descriptionSeo()->html() ?>">
    <meta name="twitter:description" content="<?= $site->descriptionSeo()->html() ?>">
    <meta name="twitter:image" content="<?php foreach($site->images()->template('imageseo') as $imageseo){echo $imageseo->url();} ?>">
    <meta property="og:image" content="<?php foreach($site->images()->template('imageseo') as $imageseo){echo $imageseo->url();} ?>">
    <?php 
        else: 
        $fileUrl = $page->files()->template('galerie')->first() ? $page->files()->template('galerie')->first() : $page->files()->template('vimeo')->first();
    ?>
    <meta property="og:description" content="<?= $page->legendeAuto()->toCaption('home'); ?>">
    <meta name="twitter:description" content="<?= $page->legendeAuto()->toCaption('home'); ?>">
    <meta name="twitter:image" content="<?php echo $fileUrl->url() ?>">
    <meta property="og:image" content="<?php echo $fileUrl->url() ?>">
  <?php endif; ?>

  <?= css('assets/css/bundle.css') ?>

    <script type="text/javascript">
        var _paq = window._paq || [];
        /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
        _paq.push(['trackPageView']);
        _paq.push(['enableLinkTracking']);
        (function() {
            var u="//matomo.quentincreuzet.fr/";
            _paq.push(['setTrackerUrl', u+'matomo.php']);
            _paq.push(['setSiteId', '1']);
            var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
            g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s);
        })();
    </script>

    <meta name="google-site-verification" content="r1Qcx084AekDB36affLBgZnfjTr_DvAZDe9VCAeL52U" />

</head>

<body>