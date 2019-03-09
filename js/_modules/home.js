import 'dom-slider';

const Home = {
  init: () => {
    Home.main = document.querySelector('.main');
    Home.header = document.querySelector('.header');
    Home.logo = document.querySelector('.header__logo');
    Home.menu = document.querySelector('.menu');
    Home.main.addEventListener('scroll', function (e) {
      Home.scrollMenu(true);
    })
    Home.logo.addEventListener('click', function (e) {
      Home.menuClick(e);
    })
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
    Home.menu.slideToggle();
    Home.main.classList.toggle('main--blocked');

    if (Home.header.classList.contains('header--open')) {
      Home.header.classList.remove('header--open');
      if (Home.header.classList.contains('header--after')) Home.scrollMenu(true)
    } else {
      Home.header.classList.add('header--open');
      if (Home.header.classList.contains('header--after')) Home.scrollMenu(false)
    }
  }
};

export default Home;