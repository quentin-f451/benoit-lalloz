import 'dom-slider';

const Header = {
  init: () => {
    Header.header = document.querySelector('.js-header');
    Header.logo = document.querySelector('.js-logo');
    Header.menu = document.querySelector('.js-menu');

    if (window.matchMedia("(min-width: 576px)").matches) {
      window.addEventListener('scroll', function (e) { Header.scrollMenu(true); })
    } 

    if (document.body.classList.contains('touch')) {
      if (Header.logo && Header.menu) Header.logo.addEventListener('click', function (e) { Header.menuClick(e); })
      if (Header.header) document.addEventListener('click', function (e) { Header.outsideClick(e); })
    };
  },
  scrollMenu: (scroll) => {
    var logoWidth = Header.logo.clientWidth;
    var headerWidth = Header.header.clientWidth;
    var body = document.body;
    var html = document.documentElement;
    var height = Math.max( body.scrollHeight, body.offsetHeight, html.clientHeight, html.scrollHeight, html.offsetHeight );
    if (scroll) {
      var scrollHeight = height - window.innerHeight;
      var scrollTop = window.scrollY;
      var scrollPosition = scrollTop / scrollHeight;
      var logoPosition = (headerWidth - logoWidth) * scrollPosition;
      logoPosition + 300 > headerWidth ? Header.header.classList.add('header--after') : Header.header.classList.remove('header--after');
      Header.header.style.paddingLeft = logoPosition + 'px';
      if (Header.menu) Header.menu.style.paddingLeft = logoPosition + 'px';
    } else {
      Header.header.style.paddingLeft = headerWidth - 300 + 'px';
      if (Header.menu) Header.menu.style.paddingLeft = headerWidth - 300 + 'px';
    }
  },
  menuClick: (e) => {
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