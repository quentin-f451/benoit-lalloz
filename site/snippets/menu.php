<div class="menu js-menu">

    <div class="menu__inner">
        <?php 
            foreach($site->bigSections()->split() as $menuItem): 
            $ifChild = $menuItem == 'Collections' || $menuItem == 'Spaces' ? '' : 'menu__item--nochild';
        ?>
            <div class="menu__section">
                <span class="menu__item <?php if($menuItem == 'All projects') echo 'menu__item--selected'; ?> menu__item--main js-filter <?= $ifChild; ?>" data-filter="<?php if($menuItem == 'All projects') { echo 'all'; } else { echo tagslug($menuItem); }; ?>"><span><?= $menuItem ?></span></span>
                <?php if($menuItem == 'Spaces'): ?>
                    <?php foreach ($site->clients()->split() as $category): ?>
                        <span class="menu__item menu__item--sub js-filter" data-filter="<?= tagslug($category); ?>"><span><?= $category; ?></span></span>
                    <?php endforeach; ?>
                <?php elseif($menuItem == 'Collections'): ?>
                    <?php foreach ($site->collections()->split() as $category): ?>
                        <span class="menu__item menu__item--sub js-filter" data-filter="<?= tagslug($category); ?>"><span><?= $category; ?></span></span>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
    
</div>