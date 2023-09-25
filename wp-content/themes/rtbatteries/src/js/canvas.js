const canvas = document.getElementById("banner-canvas");
canvas.width = window.innerWidth;
canvas.height = window.innerHeight;
const context = canvas.getContext("2d");
const frameCount = 250;
const currentFrame = index => (
  `wp-content/themes/rtbatteries/images/frames/PacAnim${index.toString().padStart(4, '0')}.png`
);

const preloadImages = () => {
  const spriteImages = [];
  for (let i = 1; i <= 150; i++) {
    const img = new Image();
    img.src = currentFrame(i);
    spriteImages.push(img);
  }
  return spriteImages;
};

const spriteImages = preloadImages();
let isScrolling = false;
let lastScrollTime = Date.now();
let animationPlayed = false;
let shouldScroll = false;

function drawCenteredImage(image) {
  const canvasAspectRatio = canvas.width / canvas.height;
  const imageAspectRatio = image.width / image.height;

  let newWidth, newHeight, x, y;

  if (canvasAspectRatio > imageAspectRatio) {
    newWidth = canvas.width;
    newHeight = canvas.width / imageAspectRatio;
    x = 0;
    y = (canvas.height - newHeight) / 2;
  } else {
    newWidth = canvas.height * imageAspectRatio;
    newHeight = canvas.height;
    x = (canvas.width - newWidth) / 2;
    y = 0;
  }
  function updateCanvasSize() {
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
  }

  updateCanvasSize();
  window.addEventListener('resize', updateCanvasSize);

  context.clearRect(0, 0, canvas.width, canvas.height);
  context.drawImage(image, x, y, newWidth, newHeight);
}

function animate(currentFrameIndex) {
  const image = spriteImages[currentFrameIndex];
  drawCenteredImage(image);
  currentFrameIndex = (currentFrameIndex + 1) % frameCount;

  requestAnimationFrame(() => {
    if (!isScrolling && !animationPlayed) {
      if (currentFrameIndex < 149 && !shouldScroll) {
        animate(currentFrameIndex);
      } else {
        animationPlayed = true;
        isScrolling = false;

        if (shouldScroll) {
          const nextSection = document.querySelector('.constructor');
          if (nextSection) {
            nextSection.scrollIntoView({ behavior: 'smooth' });
          }
        }
      }
    }
  });
}

let scrollTimeout;

const img = new Image();
img.src = currentFrame(1);
img.onload = function() {
  drawCenteredImage(img);
  setTimeout(() => {
    if (!isScrolling && !animationPlayed) {
      animate(0);
      const scrollTop = document.documentElement.scrollTop;
      const maxScrollTop = document.documentElement.scrollHeight - window.innerHeight;
      const scrollFraction = scrollTop / maxScrollTop;
      const frameIndex = Math.min(
        frameCount - 1,
        Math.ceil(scrollFraction * frameCount)
      );

      const currentTime = Date.now();
      if (currentTime - lastScrollTime >= 1000) {
        animate(frameIndex + 1);
        if(!$('header').hasClass('opened')){
          shouldScroll = true;
        }
      }
    }
  }, 5000);

  window.addEventListener('scroll', () => {
    animationPlayed = true;
    isScrolling = true;
    const scrollTop = document.documentElement.scrollTop;
    const maxScrollTop = document.documentElement.scrollHeight - window.innerHeight;
    const scrollFraction = scrollTop / maxScrollTop;
    const frameIndex = Math.min(
      frameCount - 1,
      Math.ceil(scrollFraction * frameCount)
    );
    updateImage(frameIndex + 1);
    lastScrollTime = Date.now();

    clearTimeout(scrollTimeout);
    shouldScroll = true;

    scrollTimeout = setTimeout(() => {
      const currentTime = Date.now();
      if (currentTime - lastScrollTime >= 1000 && !animationPlayed) {
        if (shouldScroll) {
          const nextSection = document.querySelector('.constructor');
          if (nextSection) {
            nextSection.scrollIntoView({ behavior: 'smooth' });
          }
        }
        shouldScroll = false;
        animate(frameIndex + 1);
      }
    }, 1000);
  });
};

function updateImage(index) {
  const image = spriteImages[index];
  drawCenteredImage(image);
}