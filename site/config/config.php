<?php 

return [
  'community.markdown-field.buttons'    => ['italic', 'link', 'horizontal-rule'],
  'community.markdown-field.font'       => [
    'family'  => 'sans-serif',
    'scaling' => false,
    'size'    => 'regular',
  ],

  'thumbs' => [
    'presets' => [
        'blur'  => ['width' => 200, 'height' => 200, 'quality' => 40],
        'xsmall'  => ['width' => 400, 'height' => 400, 'quality' => 80],
        'small'   => ['width' => 750, 'height' => 750, 'quality' => 80],
        'medium'  => ['width' => 1000, 'height' => 1000, 'quality' => 80],
        'large'   => ['width' => 1720, 'height' => 1440, 'quality' => 80],
        'xlarge'  => ['width' => 2560, 'height' => 1440, 'quality' => 80],
    ]
  ],

  'panel' => array('css' => 'assets/css/panel.css'),

  'cache' => [
    'pages' => [
      'active' => true,
    ]
  ],

  'smartypants' => true,

  'sylvainjule.matomo.url'        => 'http://matomo.quentincreuzet.fr/',
  'sylvainjule.matomo.id'         => '1',
  'sylvainjule.matomo.token'      => 'c56530eed14b1d574a05017526de6cad',

];