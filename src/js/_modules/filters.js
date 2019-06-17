import Home from './home';

const Filters = {
  init: (fil) => {
    Filters.filters = document.querySelectorAll('.js-filter');
    Filters.grid = document.querySelector('.js-grid');
    Filters.gridItem = document.querySelectorAll('.js-item');
    Filters.gridRows = document.querySelectorAll('.js-row');
    Filters.filters.forEach(filter => {
      filter.addEventListener('click', function () {
        var filterName = filter.dataset.filter;
        document.cookie = 'filter=' + filterName + '; max-age=1200';

        document.querySelector('.content').classList.add('content--hidden');

        document.querySelectorAll('.js-moreInfos').forEach((more) => {
          if (filter.dataset.filter == 'infos') {
            more.previousElementSibling.slideDown(600, 'cubic-bezier(0.645, 0.045, 0.355, 1)');
            more.classList.remove('js-previousHidden');
          } else {
            more.previousElementSibling.slideUp(600, 'cubic-bezier(0.645, 0.045, 0.355, 1)');
            more.classList.add('js-previousHidden');
          }
        });

        setTimeout(function () {
          Home.backToTop();
        }, 300);

        setTimeout(function () {
          Filters.filtering(filterName);
          filter.classList.add('menu__item--selected');
          document.querySelector('.content').classList.remove('content--hidden');
        }, 500)

      })
    });
  },
  filtering: (filterName) => {
    Filters.filters.forEach(f => {
      f.classList.remove('menu__item--selected');
    });
    if (Filters.grid) Filters.grid.classList.remove('grid--hidden');
    Filters.gridItem.forEach(el => {
      el.classList.add('grid__item--hidden');
      if (filterName == 'all') {
        el.classList.remove('grid__item--hidden')
      } else if (filterName == 'infos') {
        Filters.grid.classList.add('grid--hidden');
      } else {
        if (el.classList.contains(filterName)) el.classList.remove('grid__item--hidden');
      }
    })

    Filters.gridRows.forEach(el => {
      el.classList.add('grid__row--hidden');
      if (filterName == 'all') {
        el.classList.remove('grid__row--hidden')
      } else {
        if (el.getElementsByClassName(filterName).length > 0) el.classList.remove('grid__row--hidden');
      }
    })

    if (document.querySelector('.infos')) {
      var mh = window.innerHeight * 0.8 - document.querySelector('.infos').getBoundingClientRect().height - 48;
      Filters.grid.style.minHeight = mh + 'px';
    }
  },
  filterCookie: (filter) => {
    if (filter != '' && filter != null && filter != 'infos') {
      Filters.filtering(filter);
      Filters.filters.forEach(item => {
        if (item.dataset.filter == filter) item.classList.add('menu__item--selected');
      })
    }
  }
};

export default Filters;
