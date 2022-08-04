import scroll from './locomotive';

const accordionInit = () => {
  const accordionItems = [
    ...document.querySelectorAll('.js-accordion li.menu-item-has-children'),
  ];

  if (accordionItems.length) {
    accordionItems.forEach((item) =>
      item.addEventListener('click', () => toggleAccordionAlt(item))
    );
  }

  function toggleAccordionAlt(el) {
    const accordionBody = el.querySelector('.accordion__body');
    const accordionInner = el.querySelector('.sub-menu');
    hideAllAccordions();

    el.classList.remove('is-collapsed');
    el.classList.add('is-active');
    accordionBody.style.maxHeight = accordionInner.offsetHeight + 'px';
    accordionBody.addEventListener('transitionend', () => {
      scroll.update();
    });
  }

  const hideAllAccordions = () => {
    accordionItems.forEach((acc) => {
      acc.classList.add('is-collapsed');
      acc.classList.remove('is-active');
    });
  };
};

export default accordionInit;
