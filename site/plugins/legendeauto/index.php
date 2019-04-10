<?php

Kirby::plugin('quentin-f451/legendeauto', [
    'fields' => [
        'legendeauto' => [
            'props' => [
                'caption' => function () {
                    $field = $this->model()->legendeAuto()->toCaption('home');
                    return $field;
                }
            ]
        ]
    ]
]);


