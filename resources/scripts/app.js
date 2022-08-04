/**
 * External Dependencies
 */

import './modules/locomotive';

import scroll from './modules/locomotive';
import hidingHeader from './modules/header';
import hamburgerMenu from './modules/hamburgerMenu';
import accordionInit from './modules/accordion';
import handleVideo from './modules/handleVideo';
import revealText from './modules/revealText';
import handleInsideScroll from './modules/handleInsideScroll';
import handleFloatingBtns from './modules/handleFloatingBtns';
import handleTabs from './modules/handleTabs';
import handleMap from './modules/handleMap';
import handleScrollTargets from './modules/handleScrollTargets';
import handleMenuScrollContainer from './modules/handleMenuScrollContainer';

import './modules/handleContactModal';
import './modules/handleCategories';
import './modules/responsiveVideo';
// import './modules/galleryGlighbox';
import './utils/getContainerOffset';

/**
 * Sliders
 */
import homeHeroSlider from './sliders/homeHeroSlider';
import mediaGallerySlider from './sliders/mediaGallerySlider';

import './sliders/testimonialsSlider';
import './sliders/instagramSlider';
import './sliders/gallerySlider';

hidingHeader();
hamburgerMenu();

document.addEventListener('DOMContentLoaded', () => {
  accordionInit();
  revealText('.js-animated-text');
  handleVideo();
  handleFloatingBtns();
  handleTabs();
  handleMap();
  handleScrollTargets();
  handleMenuScrollContainer();
  handleInsideScroll();

  // Sliders
  homeHeroSlider();
  mediaGallerySlider();

  scroll.update();
});
