import scroll from './locomotive';

const handleScrollTargets = () => {
  const { hash } = window.location;

  if (!hash) return;

  const hashName = hash.substring(1);

  const target = document.getElementById(hashName);
  if (target !== null) {
    scroll.scrollTo(target);
  }
};

export default handleScrollTargets;
