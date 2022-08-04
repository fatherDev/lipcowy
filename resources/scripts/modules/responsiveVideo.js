import { ifItemExist } from '../utils/ifItemExist';
import { breakpoints } from '../utils/breakpoints';

const videos = document.querySelectorAll('.c-home-hero__slide video');

const checkWindowWidth = () => {
  return window.innerWidth < breakpoints.mobile ? 'sm' : 'xl';
};

const initVideosSrc = () => {
  videos?.forEach((video) => {
    const deviceSize = checkWindowWidth();
    const videoSrc = {
      sm: video.dataset.mobileVid,
      xl: video.dataset.desktopVid,
    };

    video.setAttribute('src', videoSrc[deviceSize] || videoSrc['xl']);
  });
};

ifItemExist(videos, () => {
  initVideosSrc();
  window.addEventListener('resize', initVideosSrc);
});
