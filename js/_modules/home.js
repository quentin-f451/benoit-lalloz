import 'dom-slider';
import animateScrollTo from 'animated-scroll-to';

const Home = {
  init: () => {
    Home.main = document.querySelector('.main');
    Home.header = document.querySelector('.js-header');
    Home.logo = document.querySelector('.js-logo');
    Home.menu = document.querySelector('.js-menu');
    Home.top = document.querySelector('.js-top');
    Home.thumbs = document.querySelectorAll('.js-thumb');

    if (window.matchMedia("(min-width: 576px)").matches) {
      if (Home.main) Home.main.addEventListener('scroll', function (e) { Home.scrollMenu(true); })
      if (Home.thumbs) {
        Home.thumbs.forEach(thumb => {
          thumb.addEventListener('mousemove', function(e) { Home.hoverThumb(e, this); })
        });
      }
    };
    if (Home.logo) Home.logo.addEventListener('click', function (e) { Home.menuClick(e); })
    if (Home.top) Home.top.addEventListener('click', function (e) { Home.backToTop(e); })

  },
  scrollMenu: (scroll) => {
    var logoWidth = Home.logo.clientWidth;
    var headerWidth = Home.header.clientWidth;
    if (scroll) {
      var scrollHeight = Home.main.scrollHeight - Home.main.clientHeight;
      var scrollTop = Home.main.scrollTop;
      var scrollPosition = scrollTop / scrollHeight;
      var logoPosition = (headerWidth - logoWidth - 20) * scrollPosition;
      logoPosition + 300 > headerWidth ? Home.header.classList.add('header--after') : Home.header.classList.remove('header--after');
      Home.header.style.paddingLeft = logoPosition + 10 + 'px';
    } else {
      Home.header.style.paddingLeft = headerWidth - 310 + 'px';
    }
  },
  menuClick: (e) => {
    Home.main.classList.toggle('main--blocked');

    if (Home.header.classList.contains('header--open')) {
      Home.menu.slideToggle();
      Home.header.classList.add('header--transition');
      Home.header.classList.remove('header--open');
      if (Home.header.classList.contains('header--after')) Home.scrollMenu(true)
      setTimeout(function() {
        Home.header.classList.remove('header--transition');
      }, 200)
    } else {
      Home.header.classList.add('header--transition');
      Home.header.classList.add('header--open');
      if (Home.header.classList.contains('header--after')) Home.scrollMenu(false)
      setTimeout(function() {
        Home.menu.slideToggle();
        Home.header.classList.remove('header--transition');
      }, 200)
    }
  },
  backToTop: (e) => {
    animateScrollTo(0, {
      speed: 200,
      element: Home.main
    })
  },
  hoverThumb: (e, element) => {
    var width = element.clientWidth;
    var numberOfImages = element.children.length;
    var subdivision = width / numberOfImages;
    var cursorPosition = e.layerX;
    var imageNumber = Math.floor(cursorPosition / subdivision);
    Array.from(element.children).forEach(img => { img.classList.add('thumb--hidden') });
    element.children[imageNumber].classList.remove('thumb--hidden');
  }
};

export default Home;