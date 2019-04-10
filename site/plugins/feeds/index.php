<?php

Kirby::plugin('quentincrzt/feeds', [
    'fields' => [
        'feeds' => [
            'props' => [
                'page' => function (string $page) {
                    $filteredPages = $this->model()->site()->children()->template('projet')->filterBy($page, '*=', 'true');
                    $titles = [];
                    foreach ($filteredPages as $filteredPage):
                        $title = $filteredPage->title();
                        array_push($titles, $title);
                    endforeach;
                    return $titles;
                }
            ]
        ]
    ]
]);


