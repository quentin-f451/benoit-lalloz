<article class="infos col-120">

    <div class="infos__col col-120">
        <div class="infos__text">
            <?= $site->presentation()->kt()->extractText()[0] ?>
        </div>

        <div class="infos__text">
            <?= $site->contactField()->kt() ?>
        </div>
    </div>

    <div class="infos__col col-120">
        <div>
            <div class="infos__text infos__text--hidden">
                <?= $site->presentation()->kt()->extractText()[1] ?>
            </div>
            <div class="toggle__more js-more js-previousHidden" data-plus="Read more" data-moins="Read less"></div>
        </div>
        <div>
            <div class="infos__text infos__text--hidden infos__text--small">
                <p><em>Design</em><br>Alice Gavin with Quentin Creuzet and Julie Laalaj at <a href="http://groupeccc.com" target="_blank">Groupe CCC</a></p>
                <?= $site->mentions()->kt() ?>
            </div>
            <div class="toggle__more js-more js-previousHidden" data-plus="Show legals" data-moins="Hide legals"></div>
        </div>
    </div>
	
</article>

<article class="infos infos--mobile col-120">

    <div class="infos__col col-120">
        <div class="infos__text">
            <?= $site->presentation()->kt()->extractText()[0] ?>
        </div>
    </div>

    <div class="infos__col col-120">
        <div>
            <div class="infos__text infos__text--hidden">
                <?= $site->presentation()->kt()->extractText()[1] ?>
            </div>
            <div class="toggle__more js-more js-previousHidden" data-plus="Read more" data-moins="Read less"></div>
        </div>
    </div>

    <div class="infos__col col-120">
        <div class="infos__text">
            <?= $site->contactField()->kt() ?>
        </div>
    </div>    

    <div class="infos__col col-120">
        <div>
            <div class="infos__text infos__text--hidden infos__text--small">
                <p><em>Design</em><br>Alice Gavin with Quentin Creuzet and Julie Laalaj at <a href="http://www.groupeccc.com/" target="_blank">Groupe CCC</a></p>
                <?= $site->mentions()->kt() ?>
            </div>
            <div class="toggle__more js-more js-previousHidden" data-plus="Show legals" data-moins="Hide legals"></div>
        </div>
    </div>
	
</article>