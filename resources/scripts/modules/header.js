import scroll from './locomotive';
import { breakpoints } from '../utils/breakpoints';

let shouldMoveStickyElement = true;
const stickyProviderSelector = '.js-sticky-variable-provider';
const stickyPostiionVariableProperty = '--top-sticky-position';

const defaultStickyPosition = 0;
const headerHeight = 86;
const smallTabsOffset = 64;

const stickyProviderElement = document.querySelector(stickyProviderSelector);
const areOuterTabs = stickyProviderElement?.dataset.outerTabs;

if (window.innerWidth >= breakpoints['tablet-lg']) {
  shouldMoveStickyElement = false;
}

const hidingHeader = () => {
  scroll.on('scroll', (args) => {
    var prevScroll = 0;
    var curScroll;
    var direction = '';
    var prevDirection = '';

    var header = document.querySelector('.l-header');
    var hamburgerMenu = document.getElementById('c-hamburger-menu');

    var checkScroll = function () {
      curScroll = args.scroll.y;

      if (curScroll < 40) return;
      if (curScroll > prevScroll) {
        //scrolled up
        direction = args.direction;
      } else if (curScroll < prevScroll) {
        //scrolled down
        direction = args.direction;
      }

      if (direction !== prevDirection) {
        toggleHeader(direction, curScroll);
      }

      prevScroll = curScroll;
    };

    // Toggling visibilty
    var toggleHeader = function (direction, curScroll) {
      if (direction === 'down' && curScroll > 40) {
        header?.classList.add('hide');
        hamburgerMenu?.classList.add('hide');
        prevDirection = direction;

        if (!shouldMoveStickyElement || stickyProviderElement === null) return;

        stickyProviderElement.style.setProperty(
          stickyPostiionVariableProperty,
          `${
            areOuterTabs === 'false'
              ? defaultStickyPosition - smallTabsOffset
              : defaultStickyPosition
          }px`
        );
      } else if (direction === 'up') {
        header?.classList.remove('hide');
        hamburgerMenu?.classList.remove('hide');
        prevDirection = direction;

        if (!shouldMoveStickyElement || stickyProviderElement === null) return;

        stickyProviderElement.style.setProperty(
          stickyPostiionVariableProperty,
          `${
            areOuterTabs === 'false'
              ? headerHeight - smallTabsOffset
              : headerHeight
          }px`
        );
      }
    };

    checkScroll();

    // Changing color
    if (args.scroll.y > 100) {
      header?.classList.add('show');
      hamburgerMenu?.classList.add('show');
    } else {
      header?.classList.remove('show');
      hamburgerMenu?.classList.remove('show');
    }
  });
};

export default hidingHeader;
