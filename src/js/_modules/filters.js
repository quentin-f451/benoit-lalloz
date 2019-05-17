import Home from './home';

const Filters = {
  init: () => {
      Filters.filters = document.querySelectorAll('.js-filter');
      Filters.grid = document.querySelector('.js-grid');
      Filters.gridItem = document.querySelectorAll('.js-item');
      Filters.gridRows = document.querySelectorAll('.js-row');
      Filters.filters.forEach(filter => {
          filter.addEventListener('click', function() {
              var filterName = filter.dataset.filter;
              document.cookie = 'filter=' + filterName;

              document.querySelector('.content').classList.add('content--hidden');

              document.querySelectorAll('.js-more').forEach((more) => {
                if (filter.dataset.filter == 'infos') {
                    more.previousElementSibling.slideDown(600, 'cubic-bezier(0.645, 0.045, 0.355, 1)');
                    more.classList.remove('js-previousHidden');
                } else {
                    more.previousElementSibling.slideUp(600, 'cubic-bezier(0.645, 0.045, 0.355, 1)');
                    more.classList.add('js-previousHidden');
                }
              });

              setTimeout(function() { 
                  Home.backToTop();
              }, 300);

              setTimeout(function() {
                Filters.filters.forEach(f => { f.classList.remove('menu__item--selected'); });
                Filters.grid.classList.remove('grid--hidden');
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
                var mh = document.querySelector('.js-main').getBoundingClientRect().height * 0.8 - document.querySelector('.infos').getBoundingClientRect().height - 48;
                Filters.grid.style.minHeight = mh + 'px';
                document.querySelector('.content').classList.remove('content--hidden');
              }, 500)
              
          })
      });
  }
};

export default Filters;
