import animateScrollTo from 'animated-scroll-to';

const Home = {
  init: () => {
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
  },
  backToTop: () => {
    animateScrollTo(0, {
      speed: 200,
      maxDuration: 200,
    })
  },
  hoverThumb: (e, element) => {
    var width = element.clientWidth;
    var numberOfImages = element.children.length - 1;
    var subdivision = width / numberOfImages;
    var cursorPosition = e.layerX;
    var imageNumber = Math.floor(cursorPosition / subdivision);
    Array.from(element.children).forEach(img => { img.classList.add('thumb--hidden') });
    element.children[imageNumber].classList.remove('thumb--hidden');
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
  getElementIndex: (node) => {
    var index = 0;
    while ( (node = node.previousElementSibling) ) {
        index++;
    }
    return index;
  },
  readCookie: (name) => {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') c = c.substring(1, c.length);
      if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
  }
};

export default Home;