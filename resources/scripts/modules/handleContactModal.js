import { ifItemExist } from '../utils/ifItemExist';
import scroll from './locomotive';

const btn = document.querySelector('.js-open-contact-modal');
const modal = document.querySelector('.js-contact-modal');

ifItemExist(btn, () => {
  const activeClass = 'c-contact-modal--active';
  const html = document.querySelector('html');
  const header = document.querySelector('.l-header');
  const burger = document.querySelector('.c-hamburger-menu');
  const close = document.querySelector('.js-close-modal');

  btn.addEventListener('click', () => {
    if (!html.classList.contains('has-scroll-scrolling')) {
      modal?.classList.add(activeClass);

      html.classList.add('ui-block-scroll');
      header?.classList.add('hide');
      burger?.classList.add('hide');

      scroll.stop();
    }
  });

  close?.addEventListener('click', () => {
    modal?.classList.remove(activeClass);

    html.classList.remove('ui-block-scroll');
    header?.classList.remove('hide');
    burger?.classList.remove('hide');

    scroll.start();
  });
});
