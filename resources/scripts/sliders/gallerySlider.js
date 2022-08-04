import Splide from '@splidejs/splide';

import { ifItemExist } from '../utils/ifItemExist';

const containers = document.querySelectorAll('.js-gallery-container');

if (containers.length !== 0) {
  containers.forEach((container) => {
    const splideContainer = container.querySelector('.js-gallery-splide');
    const splide = new Splide(splideContainer, {
      type: 'loop',
      perMove: 1,
      perPage: 1,
      gap: '1rem',
      rewind: true,
      arrows: false,
      autoplay: true,
      cloneStatus: true,
      interval: 10000,
      pagination: false,
      pauseOnHover: false,
      pauseOnFocus: false,
    });

    const progressElem = container.querySelector(
      '.js-slider-section-progress div'
    );
    ifItemExist(progressElem, () => {
      splide.on('autoplay:playing', (progress) => {
        progressElem.style.transform = `scaleX(${progress})`;
      });
    });

    splide.mount();

    const nextSlide = container.querySelectorAll('.js-slider-section-next');
    const prevSlide = container.querySelectorAll('.js-slider-section-prev');

    nextSlide.forEach((item) => {
      item.addEventListener('click', function () {
        splide.go('>');
      });
    });
    prevSlide.forEach((item) => {
      item.addEventListener('click', function () {
        splide.go('<');
      });
    });

    // const counter = document.querySelector('.js-gallery-counter');

    // splide.on('moved', (newIndex) => {
    //   if (counter !== null) {
    //     counter.textContent = `0${newIndex + 1}`;
    //   }
    // });
  });
}
