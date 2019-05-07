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
      if (Header.menu) {
        Header.header.addEventListener('mouseenter', function (e) { Header.menuEnter(e); })
        Header.header.addEventListener('mouseleave', function (e) { Header.menuLeave(e); })
      }
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
    } else {
      Header.header.style.paddingLeft = headerWidth - 300 + 'px';
    }
  },
  menuEnter: (e) => {
      Header.main.classList.add('main--blocked');
      Header.header.classList.add('header--transition');
      Header.header.classList.add('header--open');
      Header.menu.slideDown(300);
      setTimeout(function() { Header.header.classList.remove('header--transition'); }, 200)
  },
  menuLeave: (e) => {
      Header.main.classList.remove('main--blocked');
      Header.header.classList.add('header--transition');
      Header.header.classList.remove('header--open');
      Header.menu.slideUp(300);
      setTimeout(function() { Header.header.classList.remove('header--transition'); }, 200)
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
  outsideClick: (e) => {
    var isClickInside = Header.header.contains(e.target);
    if (!isClickInside && Header.header.classList.contains('header--open')) {
      Header.menuClick(e);
    }
  }
};

export default Header;