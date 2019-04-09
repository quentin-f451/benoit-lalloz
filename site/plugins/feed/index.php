<?php

Kirby::plugin('quentincrzt/feed', [
    'fields' => array(
        'feed' => require_once __DIR__ . '/lib/feed.php',
    )
]);


