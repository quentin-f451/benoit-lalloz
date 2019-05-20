import 'lazysizes';
import 'lazysizes/plugins/parent-fit/ls.parent-fit';

const Load = {
  init: () => {
    Load.gridRow = document.querySelectorAll('.js-row:not(.grid__row--hidden)');
    Load.gridRowHidden = document.querySelectorAll('.js-row.grid__row--hidden');
    Load.gridRowHidden.forEach(row => { row.classList.remove('grid__row--opacity') });
    Load.gridRow.forEach((item, i) => {
      var h = 200 + i * 300;
      var time = setTimeout(function() {
        item.classList.remove('grid__row--opacity')
      }, h);
      window.addEventListener('scroll', function() {
          clearTimeout(time);
          item.classList.remove('grid__row--opacity');
      })
    });
  }
};

export default Load;
