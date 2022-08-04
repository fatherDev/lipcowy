import Splide from '@splidejs/splide';

const homeHeroSlider = () => {
  const splideContainer = document.querySelector('.js-home-hero-splide');
  const progressBar = document.querySelector('.js-home-hero-progress-bar');

  if (splideContainer === null) return;

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
      pagination: 'splide__pagination c-home-hero__pagination',
    },
  });

  splide.on('autoplay:playing', (progress) => {
    progressBar.style.setProperty('--x', `${progress * 100}%`);
  });

  splide.mount();

  return splide;
};

export default homeHeroSlider;
