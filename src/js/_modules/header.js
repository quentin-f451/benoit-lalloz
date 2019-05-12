import 'dom-slider';
import animateScrollTo from 'animated-scroll-to';

const Header = {
  init: () => {
    Header.main = document.querySelector('.main');
    Header.header = document.querySelector('.js-header');
    Header.logo = document.querySelector('.js-logo');
    Header.menu = document.querySelector('.js-menu');

    if (window.matchMedia("(min-width: 576px)").matches) {
      Header.main.addEventListener('scroll', function (e) { Header.scrollMenu(true); })
    } else {
      if (Header.logo && Header.menu) Header.logo.addEventListener('click', function (e) { Header.menuClick(e); })
      if (Header.header) document.addEventListener('click', function (e) { Header.outsideClick(e); })
    };
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
      Header.menu.style.paddingLeft = logoPosition + 'px';
    } else {
      Header.header.style.paddingLeft = headerWidth - 300 + 'px';
      Header.menu.style.paddingLeft = headerWidth - 300 + 'px';
    }
  },
  menuClick: (e) => {
    Header.main.classList.toggle('main--blocked');

    if (Header.header.classList.contains('header--open')) {
        Header.header.classList.remove('header--open');
        Header.menu.classList.remove('menu--in');
        if (Header.header.classList.contains('header--after')) Header.scrollMenu(true)
    } else {
      Header.header.classList.add('header--open');
      Header.menu.classList.add('menu--in');
      if (Header.header.classList.contains('header--after')) Header.scrollMenu(false)
    }
  },
  outsideClick: (e) => {
    var isClickInside = Header.header.contains(e.target);
    if (!isClickInside && Header.header.classList.contains('header--open')) {
      Header.menuClick(e);
    }
  }
};

export default Header;