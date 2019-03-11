import 'dom-slider';
import animateScrollTo from 'animated-scroll-to';

const Header = {
  init: () => {
    Header.main = document.querySelector('.main');
    Header.header = document.querySelector('.js-header');
    Header.logo = document.querySelector('.js-logo');
    Header.menu = document.querySelector('.js-menu');

    if (window.matchMedia("(min-width: 576px)").matches) {
      if (Header.main) Header.main.addEventListener('scroll', function (e) { Header.scrollMenu(true); })
      if (Header.header) Header.header.addEventListener('click', function (e) { Header.headerClick(e, this); })
    };
    if (Header.logo) Header.logo.addEventListener('click', function (e) { Header.menuClick(e); })

  },
  scrollMenu: (scroll) => {
    var logoWidth = Header.logo.clientWidth;
    var headerWidth = Header.header.clientWidth;
    if (scroll) {
      var scrollHeight = Header.main.scrollHeight - Header.main.clientHeight;
      var scrollTop = Header.main.scrollTop;
      var scrollPosition = scrollTop / scrollHeight;
      var logoPosition = (headerWidth - logoWidth) * scrollPosition;
      logoPosition + 300 > headerWidth ? Header.header.classList.add('header--after') : Header.header.classList.remove('header--after');
      Header.header.style.paddingLeft = logoPosition + 'px';
    } else {
      Header.header.style.paddingLeft = headerWidth - 300 + 'px';
    }
  },
  menuClick: (e) => {
    Header.main.classList.toggle('main--blocked');
    Header.header.classList.add('header--transition');

    if (Header.header.classList.contains('header--open')) {
      Header.header.classList.remove('header--open');
      if (Header.header.classList.contains('header--after')) Header.scrollMenu(true)
    } else {
      Header.header.classList.add('header--open');
      if (Header.header.classList.contains('header--after')) Header.scrollMenu(false)
    }

    Header.menu.slideToggle(300);
    setTimeout(function() { Header.header.classList.remove('header--transition'); }, 200) 
  },
  headerClick: (e, element) => {
    if (e.target == element && !element.classList.contains('header--open')) {
        var headerWidth = element.clientWidth;
        var logoWidth = Header.logo.clientWidth / 2;
        var paddingL = e.layerX - logoWidth;
        var scrollPosition = paddingL / (headerWidth - Header.logo.clientWidth);
        var scrollTop = Math.round((Header.main.scrollHeight - Header.main.clientHeight) * scrollPosition);
        animateScrollTo(scrollTop, {
            speed: 400,
            element: Header.main
        })
    }
  }
};

export default Header;