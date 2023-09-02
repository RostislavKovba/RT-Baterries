var currentIndex = 0;

function clearMenu(){
  document.querySelectorAll('.menu_content li ').forEach(element => {
    element.classList.remove('visible');
  });
}

if(window.innerWidth < 992){
  $('.menu_content .first >li > a, .menu_content .second >li > a, .menu_content .third >li > a').on('click', function(e) {
    e.preventDefault();
  });
  mobile_menu();
}

function mobile_menu(){
  const names = [];
  $('.menu_content li ').on('click', function(e){
    event.stopPropagation();
    names.push(e.target.innerHTML);
    const current = $(this).parent()[0].classList;
    $('.menu_current')[0].innerHTML = names[currentIndex];
    if(currentIndex < 3) currentIndex += 1;
    currentItem();
  })
  $('.menu_current').on('click', function(e) {
    names.pop();
    if(currentIndex >= 1) currentIndex -= 1;
    currentItem();
    $('.menu_current')[0].innerHTML = names[currentIndex - 1];
  });
  currentItem();
}

function currentItem(){
  $('.menu_mobile')[0].style.setProperty('--index', currentIndex);
  if(currentIndex === 0){
    $('.menu_current').addClass('hidden');
  } else{
    $('.menu_current').removeClass('hidden');
  }
}

$('.menu_title, .menu_mobile .close').on('click', function(e){
  e.preventDefault();
  e.stopPropagation();
    $('header').toggleClass('opened');
    $('header').removeClass('hide');
    if( !$('header').hasClass('opened')) {
      clearMenu();
      currentIndex = 0;
      currentItem();
    }
    $(document).one('click', function closeMenu (el){
      if($('header').has(el.target).length === 0){
        $('header').removeClass('opened');
      } else {
          $(document).one('click', closeMenu);
      }
    });
});

$('.burger').on('click', function(){
    $('header').toggleClass('opened-top');
});

$('.contacts_menu .label').on('click', function(){
  $(this).toggleClass('opened');
});

$('.nav_mobile .close').on('click', function(){
  $('header').removeClass('opened-top');
});

$('.menu_content li ').on('mouseenter click', function(e){
  e.stopPropagation();
    const data = e.target.closest('ul').classList;
    if(data.contains('first')){
      $('.menu_content').removeClass('all');
      clearMenu();
    }
    if(data.contains('second')){
      $('.menu_content').addClass('all');
      $('.menu_content .second >li, .menu_content .third >li, .menu_content .fourth >li ').removeClass('visible');
    }
    
    if(data.contains('third')){
      $('.menu_content .third >li, .menu_content .fourth >li ').removeClass('visible');
    }
    if(data.contains('fourth')){
      $('.menu_content .fourth >li ').removeClass('visible');
    }

    $(this)[0].classList.add('visible');
});

$('.account_links .search').on('click', function(e){
  e.preventDefault();
  $('.search-block').toggleClass('opened');
  $(document).one('click', function closeMenu (el){
    if($('.account_links .search').has(el.target).length === 0){
      $('.account_links .search').removeClass('opened');
    } else {
        $(document).one('click', closeMenu);
    }
  });
});
$('.search-block input').on('blur', function(e){
  $('.search-block').removeClass('opened');
});


window.addEventListener('scroll', function(e) {

    // header scrolling
    let $this = $(this),
        $head = $('header');
    if ($this.scrollTop() > 120) {
        $head.addClass('header_bg');
    } else {
        $head.removeClass('header_bg');
    }

    // hidden header
    let doc = document.documentElement;
    let w = window;

    let prevScroll = w.scrollY || doc.scrollTop;
    let curScroll;
    let direction = 0;
    let prevDirection = 0;

    let header = document.querySelector('header');

    let checkScroll = function() {
        curScroll = w.scrollY || doc.scrollTop;
        if (curScroll > prevScroll) { 
            direction = 2;
        }
        else if (curScroll < prevScroll) { 
            direction = 1;
        }
        if (direction !== prevDirection) {
            toggleHeader(direction, curScroll);
        }
        prevScroll = curScroll;
    };

    let toggleHeader = function(direction, curScroll) {
        if (direction === 2 && curScroll > 52) { 
            header.classList.add('hide');
            prevDirection = direction;
        }
        else if (direction === 1) {
            header.classList.remove('hide');
            prevDirection = direction;
        }
    };

    if($('header').hasClass('opened')){
      $('header').removeClass('opened');
      clearMenu();
      currentIndex = 0;
      currentItem();
    }

    $('.search-block').removeClass('opened');

    window.addEventListener('scroll', checkScroll);

})

