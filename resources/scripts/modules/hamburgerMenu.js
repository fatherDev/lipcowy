const hamburgerMenu = () => {
  const hamburger = document.querySelector('.js-hamburger-menu');
  const mobileMenu = document.querySelector('.js-mobile-menu');
  const html = document.querySelector('html');

  hamburger?.addEventListener('click', function () {
    this.classList.toggle('is-active');
    mobileMenu.classList.toggle('is-active');
    html.classList.toggle('ui-block-scroll');
  });
};

export default hamburgerMenu;
