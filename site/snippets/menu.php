<div class="menu js-menu">

    <?php 
        foreach($site->children()->published()->filterBy('template', '!*=', 'projet')->limit(5) as $menuItem): 
        $ifChild = $menuItem->id() == 'collections' || $menuItem->id() == 'spaces' ? '' : 'menu__item--nochild';
    ?>
        <div class="menu__section">
            <a href="<?= $menuItem->url(); ?>">
                <span class="menu__item menu__item--main <?= $ifChild; ?>"><?= $menuItem->title(); ?></span>
                <?php if($menuItem->id() == 'spaces'): ?>
                    <?php foreach ($site->clients()->split() as $category): ?>
						<span class="menu__item menu__item--sub"><?= $category; ?></span>
					<?php endforeach ?>
                <?php elseif($menuItem->id() == 'collections'): ?>
                    <?php foreach ($site->collections()->split() as $category): ?>
						<span class="menu__item menu__item--sub"><?= $category; ?></span>
					<?php endforeach ?>
                <? endif; ?>
            </a>
        </div>
    <?php endforeach; ?>

</div>