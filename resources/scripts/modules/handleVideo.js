const handleVideo = () => {
  const pausePlayVideo = (video) => {
    video.paused ? video.play() : video.pause();
  };

  const videoWrappers = document.querySelectorAll('.js-video-wrapper');
  const videoPlayClass = 'c-media-gallery__video-wrapper--video-play';

  if (videoWrappers.length === 0) return;

  videoWrappers.forEach((wrapper) => {
    const videoEl = wrapper.querySelector('.js-video');

    if (videoEl === null) return;

    videoEl.addEventListener('play', () => {
      wrapper.classList.toggle(videoPlayClass);
    });
    videoEl.addEventListener('pause', () => {
      wrapper.classList.toggle(videoPlayClass);
    });

    wrapper.addEventListener('click', () => {
      pausePlayVideo(videoEl);
    });
  });
};

export default handleVideo;
