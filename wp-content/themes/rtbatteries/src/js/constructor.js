function item_conscructor(){
    $('.constructor_slider li').on('click', function(){
      const conatiner = $(this).parent()[0];
      const dataToClear = $(conatiner).children();
      dataToClear.each(element => {
        console.log(dataToClear, element, 'element')
        dataToClear[element].classList.remove('active_i');
      })
      $(this).addClass('active_i');
    });
}

item_conscructor();

function steps(){
    let currentStep = 1;
    $('.steps_nav .btn-secondary').on('click', function(){

      if($(this)[0].classList.contains('next')){
        if(currentStep <= 4) {
          currentStep +=1;
        }
        $('.constructor_slider')[0].classList.add('s_next');
        $('.constructor_slider')[0].classList.remove('step-' + (currentStep - 1));
      }
      if($(this)[0].classList.contains('prev')){
        if(currentStep >= 2) {
          currentStep -=1;
        }
        $('.constructor_slider')[0].classList.remove('s_next');
        $('.constructor_slider')[0].classList.remove('step-' + (currentStep + 1));
      }

      const stepsSlider = $('.constructor_slider .counter ul');
      const stepsSliderwrapper = $('.constructor_slider .slider .wrapper');
      const steps = $('.constructor_slider .counter li');

      $(steps).each(element => {
        $(steps)[element].classList.remove('current');
      });
      $(stepsSliderwrapper).each(element => {
        $(stepsSliderwrapper)[element].classList.remove('active');
      });
      $(stepsSliderwrapper)[currentStep - 1].classList.add('active');
      $(steps)[currentStep - 1].classList.add('current');

      $('.constructor_slider')[0].classList.add('step-' + (currentStep));
      $(stepsSlider)[0].style.setProperty('--shift', currentStep - 1);
      $('.constructor_slider .counter ul li.active')[0].innerHTML = currentStep;

      if(currentStep !== 1){
        $('.constructor')[0].classList.add('full-width');
      } else{
        $('.constructor')[0].classList.remove('full-width');
      }

    });
  }

  steps();