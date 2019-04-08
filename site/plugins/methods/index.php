<?php 

Kirby::plugin('quentincrzt/methods', [
    'fieldMethods' => [
        'toCategory' => function($field) {
          $value = $field->value;
          return '<span class="category-label" data-category="'. $value .'">' . $value . '</span>';
        },
        'toClient' => function($field) {
          $value = $field->value;
          return '<span class="category-label" data-client="'. $value .'">' . $value . '</span>';
        },
        'toCollection' => function($field) {
          $value = $field->value;
          return '<span class="category-label" data-collection="'. $value .'">' . $value . '</span>';
        },
    ]
]);