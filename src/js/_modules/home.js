import animateScrollTo from 'animated-scroll-to';

const Home = {
  init: () => {
    Home.main = document.querySelector('.main');
    Home.top = document.querySelector('.js-top');
    Home.thumbs = document.querySelectorAll('.js-thumb');
    Home.items = document.querySelectorAll('.js-item');

    if (window.matchMedia("(min-width: 576px)").matches) {
      if (Home.thumbs) { Home.thumbs.forEach(thumb => {
        thumb.addEventListener('mousemove', function(e) { Home.hoverThumb(e, this); })
      }); }
      if (Home.items) { Home.items.forEach(item => {
        item.addEventListener('mouseenter', function(e) { Home.hoverItem(e, this, true); })
        item.addEventListener('mouseleave', function(e) { Home.hoverItem(e, this, false); })
      })

      }
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
    var numberOfImages = element.children[0].children.length - 1;
    var subdivision = width / numberOfImages;
    var cursorPosition = e.layerX;
    var imageNumber = Math.floor(cursorPosition / subdivision);
    Array.from(element.children[0].children).forEach(img => { img.classList.add('thumb--hidden') });
    element.children[0].children[imageNumber].classList.remove('thumb--hidden');
  },
  hoverItem: (e, element, hover) => {
    var index = Home.getElementIndex(element);
    if (hover) {
      if (element.classList.contains('grid__item--image')) {
        element.parentNode.nextElementSibling.children[index].classList.add('hover');
      } else {
        element.parentNode.previousElementSibling.children[index].classList.add('hover');
      }
    } else {
      if (element.classList.contains('grid__item--image')) {
        element.parentNode.nextElementSibling.children[index].classList.remove('hover');
      } else {
        element.parentNode.previousElementSibling.children[index].classList.remove('hover');
      }
    }
    
  }, 
  getElementIndex(node) {
    var index = 0;
    while ( (node = node.previousElementSibling) ) {
        index++;
    }
    return index;
  }
};

export default Home;