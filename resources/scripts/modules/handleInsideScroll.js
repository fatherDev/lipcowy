import scroll from './locomotive';
import { breakpoints } from '../utils/breakpoints';

const stopLocomotiveScroll = () => {
  scroll?.stop();
};

const startLocomotiveScroll = () => {
  scroll?.start();
};

const handleInsideScroll = () => {
  if (window.innerWidth < breakpoints['tablet-lg']) return;

  const wrapperSelector = '.js-inside-scroll-outer';
  const contentSelector = '.js-inside-scroll-inner';

  const wrappers = document.querySelectorAll(wrapperSelector);

  if (wrappers.length === 0) return;

  wrappers.forEach((wrapper) => {
    const list = wrapper.querySelector(contentSelector);

    if (list === null) return;

    const wrapperHeight = wrapper.clientHeight;
    const listHeight = list.clientHeight;

    if (wrapperHeight >= listHeight) return;

    wrapper.removeEventListener('mouseenter', stopLocomotiveScroll);
    wrapper.addEventListener('mouseenter', stopLocomotiveScroll);

    wrapper.removeEventListener('mouseleave', startLocomotiveScroll);
    wrapper.addEventListener('mouseleave', startLocomotiveScroll);
  });
};

export default handleInsideScroll;
