import scroll from '../modules/locomotive';
import Splide from '@splidejs/splide';

const mediaGallerySlider = () => {
  const splideContainers = document.querySelectorAll(
    '.js-media-gallery-splide'
  );

  if (splideContainers.length === 0) return;

  splideContainers.forEach((splideContainer) => {
    const progressBar = splideContainer.querySelector(
      '.js-home-media-gallery-bar'
    );

    const splide = new Splide(splideContainer, {
      perMove: 1,
      type: 'fade',
      updateOnMove: true,
      rewind: true,
      arrows: false,
      autoplay: true,
      interval: 7000,
      drag: true,
      pagination: true,
      pauseOnHover: false,
      pauseOnFocus: false,
      classes: {
        pagination: 'splide__pagination c-media-gallery__pagination',
      },
    });

    splide.on('autoplay:playing', (progress) => {
      progressBar.style.setProperty('--x', `${progress * 100}%`);
    });

    splide.mount();
  });
};

export default mediaGallerySlider;
