import Splide from '@splidejs/splide';

const splideContainers = document.querySelectorAll('.js-testimonials-splide');

if (splideContainers.length !== 0) {
  splideContainers.forEach((splideContainer) => {
    const progressBar = splideContainer.querySelector('.js-testimonials-bar');

    const splide = new Splide(splideContainer, {
      perMove: 1,
      type: 'fade',
      updateOnMove: true,
      rewind: true,
      arrows: false,
      autoplay: true,
      interval: 10000,
      drag: true,
      pagination: true,
      pauseOnHover: false,
      pauseOnFocus: false,
      classes: {
        pagination: 'splide__pagination c-testimonials__pagination',
      },
    });

    splide.on('autoplay:playing', (progress) => {
      progressBar.style.setProperty('--x', `${progress * 100}%`);
    });

    splide.mount();
  });
}
