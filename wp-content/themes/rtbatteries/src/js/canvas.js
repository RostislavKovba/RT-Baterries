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
    // Ширина канваса більша, масштабуємо по ширині
    newWidth = canvas.width;
    newHeight = canvas.width / imageAspectRatio;
    x = 0;
    y = (canvas.height - newHeight) / 2;
  } else {
    // Висота канваса більша або рівна, масштабуємо по висоті
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

  // Анімація з 30 кадрами в секунду (1000 мс / 30 кадрів)
  requestAnimationFrame(() => {
    if (!isScrolling && !animationPlayed) {
      if (currentFrameIndex < 149 && !shouldScroll) {
        // Продовжуємо анімацію, якщо не досягнуто останнього кадру
        animate(currentFrameIndex);
      } else {
        // Якщо досягнуто останнього кадру, встановлюємо флаг, що анімація програлась
        animationPlayed = true;
        // Зупиняємо анімацію, якщо вона програлась один раз
        isScrolling = false;

        // Якщо маємо доскролити до наступної секції
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
  // Запускаємо анімацію через 1 хвилину без скролінгу
  setTimeout(() => {
    if (!isScrolling && !animationPlayed) {
      // Отримуємо поточну позицію скролу
      const scrollTop = document.documentElement.scrollTop;
      const maxScrollTop = document.documentElement.scrollHeight - window.innerHeight;
      const scrollFraction = scrollTop / maxScrollTop;
      const frameIndex = Math.min(
        frameCount - 1,
        Math.ceil(scrollFraction * frameCount)
      );

      // Перевіряємо, чи пройшло вже 1 хвилину від останнього скролу
      const currentTime = Date.now();
      if (currentTime - lastScrollTime >= 5000) {
        animate(frameIndex + 1);
        if(!$('header').hasClass('opened')){
          shouldScroll = true;
        } // Встановлюємо прапор, що маємо доскролити після анімації
      }
    }
  }, 5000);

  // Запускаємо анімацію при скролінгу
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
    lastScrollTime = Date.now(); // Оновлюємо час останнього скролу

    clearTimeout(scrollTimeout); // Очистимо попередній таймер, якщо він є
    shouldScroll = true; // Встановлюємо прапор, що маємо доскролити після анімації

    // Встановлюємо новий таймер для запуску анімації через 1 секунду
    scrollTimeout = setTimeout(() => {
      const currentTime = Date.now();
      // Перевіряємо, чи відбувався скрол і не викликалась анімація
      if (currentTime - lastScrollTime >= 1000 && !animationPlayed) {
        // Перевіряємо, чи маємо доскролити до наступної секції після закінчення анімації
        if (shouldScroll) {
          const nextSection = document.querySelector('.constructor');
          if (nextSection) {
            nextSection.scrollIntoView({ behavior: 'smooth' });
          }
        }
        shouldScroll = false; // Збираємо прапор після доскролу
        animate(frameIndex + 1);
      }
    }, 1000);
  });
};

function updateImage(index) {
  const image = spriteImages[index];
  drawCenteredImage(image);
}