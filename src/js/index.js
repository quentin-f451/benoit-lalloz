import { disableBodyScroll, enableBodyScroll, clearAllBodyScrollLocks } from 'body-scroll-lock';

import Home from './_modules/home';
import Header from './_modules/header';
import Filters from './_modules/filters';
import Video from './_modules/video';
import Infos from './_modules/infos';
import Load from './_modules/load';

(() => {
    disableBodyScroll(document.querySelector('.js-main'));
  var isTouch = (('ontouchstart' in window) || (navigator.msMaxTouchPoints > 0));
  var userAgent = navigator.userAgent || navigator.vendor || window.opera;
  var isiOS = /iPad|iPhone|iPod/.test(userAgent) && !window.MSStream;
  if (isTouch) document.body.classList.add('touch');
  if (isiOS) document.body.classList.add('ios');
  if (document.querySelector('.content').classList.contains('home')) document.cookie = 'filter=';
  Home.init();
  Header.init();
  Filters.init();
  Video.init();
  Infos.init();
  Load.init();
})();
