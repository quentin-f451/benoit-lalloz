import Home from './home';
import Header from './header';

const Filters = {
  init: () => {
      Filters.filters = document.querySelectorAll('.js-filter');
      Filters.grid = document.querySelector('.js-grid');
      Filters.gridItem = document.querySelectorAll('.js-item');
      Filters.gridRows = document.querySelectorAll('.js-row');
      Filters.filters.forEach(filter => {
          filter.addEventListener('click', function() {
              document.querySelector('.content').classList.add('content--hidden');
              Header.menuLeave();
              setTimeout(function() { 
                  Home.backToTop();
              }, 300);

              setTimeout(function() {
                Filters.filters.forEach(f => { f.classList.remove('menu__item--selected'); });
                Filters.grid.classList.remove('grid--hidden');
                var filterName = filter.dataset.filter;
                Filters.gridItem.forEach(el => {
                    el.classList.add('grid__item--hidden');
                    if (filterName == 'all') {
                        el.classList.remove('grid__item--hidden')
                    } else if (filterName == 'infos') {
                        Filters.grid.classList.add('grid--hidden');
                    } else {
                        if(el.classList.contains(filterName)) el.classList.remove('grid__item--hidden');
                    }
                })

                Filters.gridRows.forEach(el => {
                    el.classList.add('grid__row--hidden');
                    if (filterName == 'all') {
                        el.classList.remove('grid__row--hidden')
                    } else {
                        if(el.getElementsByClassName(filterName).length > 0) el.classList.remove('grid__row--hidden');
                    }
                })

                filter.classList.add('menu__item--selected');
                document.querySelector('.content').classList.remove('content--hidden');
              }, 500)
              
          })
      });
  }
};

export default Filters;
