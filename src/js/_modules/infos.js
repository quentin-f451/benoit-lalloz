import 'dom-slider';

const Infos = {
  init: () => {
    Infos.more = document.querySelectorAll('.js-more');
    Infos.more.forEach((more) => {
      more.addEventListener('click', (e) => {
          if(more.classList.contains('js-previousHidden')) {
            more.previousElementSibling.slideDown(600, 'cubic-bezier(0.645, 0.045, 0.355, 1)');
            more.classList.remove('js-previousHidden');
          } else {
            more.previousElementSibling.slideUp(600, 'cubic-bezier(0.645, 0.045, 0.355, 1)');
            more.classList.add('js-previousHidden');
          }
      })
    });
  }
};

export default Infos;
