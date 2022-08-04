import { ifItemExist } from '../utils/ifItemExist';
import scroll from './locomotive';

const btn = document.querySelector('.js-cat-btn');
const categories = document.querySelector('.js-cats');

ifItemExist(btn, () => {
  const activeClass = 'c-gallery-categories--active';
  const html = document.querySelector('html');
  const header = document.querySelector('.l-header');
  const burger = document.querySelector('.c-hamburger-menu');
  const close = document.querySelector('.js-close-cats');

  btn.addEventListener('click', () => {
    if (!html.classList.contains('has-scroll-scrolling')) {
      categories?.classList.add(activeClass);

      html.classList.add('ui-block-scroll');
      header?.classList.add('hide');
      burger?.classList.add('hide');

      scroll.stop();
    }
  });

  close?.addEventListener('click', () => {
    categories?.classList.remove(activeClass);

    html.classList.remove('ui-block-scroll');
    header?.classList.remove('hide');
    burger?.classList.remove('hide');

    scroll.start();
  });
});
