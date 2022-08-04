const handleFloatingBtns = () => {
  const floatingBtns = document.querySelectorAll('.js-floating-button');
  const overlay = document.querySelector('.js-floating-buttons-overlay');
  const invisibilityClass = 'ui-invisible';

  if (floatingBtns.length === 0 || overlay === null) return;

  floatingBtns.forEach((btn) => {
    btn.addEventListener('mouseenter', () => {
      overlay.classList.remove(invisibilityClass);
    });

    btn.addEventListener('mouseleave', () => {
      overlay.classList.add(invisibilityClass);
    });
  });
};

export default handleFloatingBtns;
