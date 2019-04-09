<?php snippet('header') ?>
<h1>
  <?php echo $page->title()->html() ?>
  <?php echo $site->children()->template('projet')->filterBy('feedspaces', '*=', 'true'); ?>
  <?php foreach ($site->children() as $p) echo $p->feedspaces(); ?>
</h1>
<?php snippet('footer') ?>