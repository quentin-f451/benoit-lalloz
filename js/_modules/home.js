import animateScrollTo from 'animated-scroll-to';

const Home = {
  init: () => {
    Home.main = document.querySelector('.main');
    Home.top = document.querySelector('.js-top');
    Home.thumbs = document.querySelectorAll('.js-thumb');

    if (window.matchMedia("(min-width: 576px)").matches) {
      if (Home.thumbs) { Home.thumbs.forEach(thumb => {
        thumb.addEventListener('mousemove', function(e) { Home.hoverThumb(e, this); })
      }); }
    };
    if (Home.top) Home.top.addEventListener('click', function (e) { Home.backToTop(e); })

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