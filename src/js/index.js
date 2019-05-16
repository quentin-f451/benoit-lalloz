import Home from './_modules/home';
import Header from './_modules/header';
import Filters from './_modules/filters';
import Video from './_modules/video';
import Infos from './_modules/infos';
import Load from './_modules/load';

(() => {
  if (document.querySelector('.content').classList.contains('home')) document.cookie = 'filter=';
  Home.init();
  Header.init();
  Filters.init();
  Video.init();
  Infos.init();
  Load.init();
})();
