import lazySizes from 'lazysizes';

import Home from './_modules/home';
import Header from './_modules/header';
import Filters from './_modules/filters';
import Video from './_modules/video';
import Infos from './_modules/infos';
import Load from './_modules/load';

(() => {
  lazySizes.cfg.expand = 1000;
  lazySizes.cfg.expFactor = 2.5;
  var isTouch = (('ontouchstart' in window) || (navigator.msMaxTouchPoints > 0));
  var ua = window.navigator.userAgent;
  var iOS = !!ua.match(/iP(ad|hone)/i);
  var webkit = !!ua.match(/WebKit/i);
  var isiOS = iOS && webkit && !ua.match(/CriOS/i);

  if (isTouch) document.body.classList.add('touch');
  if (isiOS) document.body.classList.add('ios');

  if (document.querySelector('.content').classList.contains('home')) {
    var fil = Home.readCookie('filter');
    document.cookie = 'filter=';
  }

  Home.init();
  Header.init();
  Filters.init();
  Filters.filterCookie(fil);
  Video.init();
  Infos.init();
  Load.init();
})();
