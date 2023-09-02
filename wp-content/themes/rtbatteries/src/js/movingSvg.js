// function movingSvg(){
//     function getRandomPosition(min, max) {
//       return Math.random() * (max - min) + min;
//     }

//     const shapes = document.querySelectorAll('.moving-shape');

//     shapes.forEach((shape) => {
//       const containerWidth = window.innerWidth;
//       const containerHeight = window.innerHeight;
//       const shapeWidth = 300;
//       const shapeHeight = 300;
      
//       const minX = shapeWidth / 3;
//       const maxX = containerWidth - shapeWidth / 3;
//       const minY = shapeHeight / 3;
//       const maxY = containerHeight - shapeHeight / 3;

//       function animateShape() {
//         const startX = getRandomPosition(minX, maxX);
//         const startY = getRandomPosition(minY, maxY);
//         const endX = getRandomPosition(minX, maxX);
//         const endY = getRandomPosition(minY, maxY);
        
//         shape.style.left = `${startX}px`;
//         shape.style.top = `${startY}px`;
        
//         shape.animate(
//           { left: [`${startX}px`, `${endX}px`], top: [`${startY}px`, `${endY}px`] },
//           { duration: 4000, easing: 'ease-in-out', direction: 'alternate', iterations: 'Infinity', fill: 'both' }
//         ).onfinish = animateShape;
//       }
      
//       animateShape();
//     });
//   }

//   movingSvg();