<?php

Kirby::plugin('quentincrzt/legendeauto', [
    'fields' => [
        'legendeauto' => [
            'props' => [
                'caption' => function () {
                    $field = $this->model()->legendeAuto()->toCaption();
                    return $field;
                }
            ]
        ]
    ]
]);


