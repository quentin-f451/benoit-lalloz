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
    },
    'page.update:after' => function ($newPage, $oldPage) {
      if (!$newPage->isDraft() && $newPage->template() == 'projet') {
        $pageId = $newPage->id();
        $feeds = ['feedhome', 'feedspaces', 'feedcollections', 'feedlaboratory'];
        $feedsTrue = [];
        foreach ($feeds as $feed) {
          if (strpos($newPage->$feed(), 'true') !== false) {
            $feed_a = str_replace('feed', '', $feed);
            $feed_b = str_replace('home', 'all', $feed_a);
            array_push($feedsTrue, $feed_b);
          }
        }

        foreach ($feedsTrue as $f) {
          $p = $this->site()->find($f);
          $content = $p->feeds();
          if (strpos($content, $pageId) == false) {
            $newContent = $content . "\r\n- " . $pageId;
            $p->update([
              'feeds' => $newContent
            ]);
          }
        }       
      }
    },
    'page.changeStatus:after' => function ($newPage, $oldPage) {
      if (!$newPage->isDraft() && $newPage->template() == 'projet') {
        $pageId = $newPage->id();
        $feeds = ['feedhome', 'feedspaces', 'feedcollections', 'feedlaboratory'];
        $feedsTrue = [];
        foreach ($feeds as $feed) {
          if (strpos($newPage->$feed(), 'true') !== false) {
            $feed_a = str_replace('feed', '', $feed);
            $feed_b = str_replace('home', 'all', $feed_a);
            array_push($feedsTrue, $feed_b);
          }
        }

        foreach ($feedsTrue as $f) {
          $p = $this->site()->find($f);
          $content = $p->feeds();
          if (strpos($content, $pageId) == false) {
            $newContent = $content . "\r\n- " . $pageId;
            $p->update([
              'feeds' => $newContent
            ]);
          }
        }       
      }
    }
  ],

  'panel' => array('css' => 'assets/css/panel.css'),

  'debug'  => true,

  'routes' => [
    [
      'pattern' => '/',
      'action'  => function () {
        return go('all');
      }
    ]
  ]

];