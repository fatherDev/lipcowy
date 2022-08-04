import Splide from '@splidejs/splide';

const splideContainers = document.querySelectorAll('.js-instagram-splide');

if (splideContainers.length !== 0) {
  splideContainers.forEach((splideContainer) => {
    const splide = new Splide(splideContainer, {
      rewind: true,
      arrows: false,
      autoplay: true,
      interval: 10000,
      autoWidth: true,
      pagination: true,
      pauseOnHover: false,
      pauseOnFocus: false,
      classes: {
        pagination: 'splide__pagination c-instagram-section__pagination',
      },
    });

    splide.mount();
  });
}
