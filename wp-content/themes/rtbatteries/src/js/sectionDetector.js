// scroll sections 
export function animationScroll(El_list) {
    const gap = 70;
    for (let index = 0; index < El_list.length; index++) {
      const canTargetFillScene =
        window.document.documentElement.getBoundingClientRect().height -
          El_list[index].getBoundingClientRect().height >
        0;
      const isTopTailInScene =
        El_list[index].getBoundingClientRect().top > 0 &&
        window.innerHeight > Math.abs(El_list[index].getBoundingClientRect().top);
      const isBottomTailInScene =
        El_list[index].getBoundingClientRect().bottom > 0 &&
        window.innerHeight >
          Math.abs(El_list[index].getBoundingClientRect().bottom);
      const isTopTailToExit =
        El_list[index].getBoundingClientRect().top - window.innerHeight + gap < 0;
      const isBottomTailToExit =
        El_list[index].getBoundingClientRect().bottom - gap < 0;

      if (isTopTailInScene || isBottomTailInScene)
        El_list[index].classList.add('enter');
      else if (!El_list[index].classList.contains('once'))
        El_list[index].classList.remove('enter');
      if (!El_list[index].classList.contains('once')) {
        if (isTopTailToExit) El_list[index].classList.add('hide-top');
        else El_list[index].classList.remove('hide-top');
        if (isBottomTailToExit) El_list[index].classList.add('hide-bottom');
        else El_list[index].classList.remove('hide-bottom');
      }
      if (!canTargetFillScene) El_list[index].classList.add('tall-item');
      else El_list[index].classList.remove('tall-item');
    }
}
    
export function displayScrollController(El_list) {
    const gap =
      window.document.documentElement.getBoundingClientRect().height * 0.7;
    for (let index = 0; index < El_list.length; index++) {
      const canTargetFillScene =
        window.document.documentElement.getBoundingClientRect().height -
          El_list[index].getBoundingClientRect().height >
        0;
      const canHideTopTail =
        El_list[index].getBoundingClientRect().top -
          gap -
          window.document.documentElement.getBoundingClientRect().height >
        0;
      const canHideBottomTail =
        El_list[index].getBoundingClientRect().bottom + gap < 0;
      if (canTargetFillScene && (canHideTopTail || canHideBottomTail))
        El_list[index].classList.add('hide');
      else El_list[index].classList.remove('hide');
    }
}

window.addEventListener('scroll', (e) => { 
  animationScroll(document.documentElement.querySelectorAll('.scroll-y'));
});