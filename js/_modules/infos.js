import 'dom-slider';

const Infos = {
  init: () => {
    Infos.more = document.querySelectorAll('.js-more');
    Infos.more.forEach(more => {
      more.addEventListener('click', (e) => {
        more.previousElementSibling.slideToggle(600, 'cubic-bezier(0.645, 0.045, 0.355, 1)');
        more.classList.toggle('js-previousHidden');
      })
    });
  }
};

export default Infos;
