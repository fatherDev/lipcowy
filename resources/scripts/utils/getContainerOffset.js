const containerOffset = document.querySelector('.js-check-offset');

const getOffsets = () => {
  if (!containerOffset) return;
  const containerStyles =
    containerOffset.currentStyle || window.getComputedStyle(containerOffset);
  let containerPadding = parseFloat(containerStyles.paddingRight);
  document.documentElement.style.setProperty(
    '--containerOffset',
    containerOffset.offsetLeft + containerPadding + 'px'
  );
};

window.addEventListener('resize', getOffsets);
window.addEventListener('load', getOffsets);
