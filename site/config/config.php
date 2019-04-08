<?php 

return [
  'community.markdown-field.buttons'    => ['italic', 'link'],
  'community.markdown-field.font'       => [
    'family'  => 'sans-serif',
    'scaling' => false,
    'size'    => 'regular',
  ],

  'thumbs' => [
    'presets' => [
        'xsmall'  => ['width' => 400, 'height' => 400, 'quality' => 80],
        'small'   => ['width' => 750, 'height' => 750, 'quality' => 80],
        'medium'  => ['width' => 1000, 'height' => 1000, 'quality' => 80],
        'large'   => ['width' => 1720, 'height' => 1440, 'quality' => 80],
        'xlarge'  => ['width' => 2560, 'height' => 1440, 'quality' => 80],
    ]
  ],

  'hooks' => [
    'file.create:after' => function ($file) {
      $file->changeName('benoit-lalloz-' . F::name($file->filename()));
    }
  ],

  'panel' => array('css' => 'assets/css/panel.css')

];