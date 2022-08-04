import handleInsideScroll from './handleInsideScroll';
import { debounce } from '../utils/debounce';
import { breakpoints } from '../utils/breakpoints';
import scroll from './locomotive';

const handleTabs = () => {
  const tabs = [...document.querySelectorAll('.js-category-tab')];
  const tabsContent = [
    ...document.querySelectorAll('.js-category-tab-content'),
  ];
  const tabContentWrapper = document.querySelector('.js-tab-content-wrapper');
  const tabBtn = document.querySelector('.js-tab-btn');

  const activeTabClass = 'c-tabs-with-content__tab--active';
  const activeTabContentClasses = [
    'c-tabs-with-content__tab-content--active',
    'js-category-tab-content--active',
  ];

  if (tabsContent.length === 0) return;

  const activeTabOnInit = tabs.find((tab) =>
    tab.classList.contains(activeTabClass)
  );

  let prevWidth = window.innerWidth;

  const handlePopState = (e) => {
    const { state } = e;

    if (state === null) return activeTabOnInit.click();

    const { query } = e.state;

    tabs.forEach((tab) => {
      if (tab.dataset.tabQuery !== query) return;

      tab.click();
    });
  };

  const setContainerHeight = () => {
    if (window.innerWidth < breakpoints['tablet-lg']) return;
    let activeTabContent = tabsContent.find((tabContent) =>
      tabContent.classList.contains('js-category-tab-content--active')
    );

    if (activeTabContent === undefined) {
      activeTabContent = tabsContent[0];
    }

    const { y: offsetTop } = activeTabContent.getBoundingClientRect();
    const tabBtnHeight = tabBtn?.clientHeight;

    const btnHeightValue =
      tabBtnHeight !== undefined ? `${tabBtnHeight + 2}px` : '5.8333vh';

    tabContentWrapper.style.setProperty(
      '--contentHeight',
      `calc(100vh - ${offsetTop}px - ${btnHeightValue})`
    );

    prevWidth = window.innerWidth;
  };

  const handleResize = (e) => {
    if (Math.abs(prevWidth - window.innerWidth) < 100) return;

    scroll.scrollTo('top', { duration: 0, disableLerp: true });
    if (window.innerWidth < breakpoints['tablet-lg']) return;
    debouncedHandler(e);
  };

  const debouncedHandler = debounce(setContainerHeight, 300);

  if (activeTabOnInit === undefined) {
    tabs[0].click();
  }

  tabs.forEach((tab) => {
    tab.addEventListener('click', (e) => {
      const { currentTarget, isTrusted } = e;
      const { tabId: clickedTabID, tabQuery } = currentTarget.dataset;

      if (currentTarget.classList.contains(activeTabClass)) return;

      let activeTabIndex = tabs.findIndex((tab) =>
        tab.classList.contains(activeTabClass)
      );

      if (activeTabIndex === -1) {
        activeTabIndex = 0;
      }

      tabs[activeTabIndex].classList.remove(activeTabClass);
      tabs[clickedTabID].classList.add(activeTabClass);

      activeTabContentClasses.forEach((className) => {
        tabsContent[activeTabIndex].classList.remove(className);
        tabsContent[clickedTabID].classList.add(className);
      });

      if (isTrusted) {
        window.history.pushState({ query: tabQuery }, '', `?type=${tabQuery}`);
      }

      handleInsideScroll();
    });
  });

  setContainerHeight();

  window.addEventListener('resize', () => {
    handleResize();
  });

  window.addEventListener('popstate', handlePopState);
};

export default handleTabs;
