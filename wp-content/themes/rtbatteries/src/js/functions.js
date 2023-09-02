
const html = document.documentElement;
  
  $(document).ready(function() {

    $('select').niceSelect();

    $.getScript("https://cdnjs.cloudflare.com/ajax/libs/smoothscroll/1.4.9/SmoothScroll.js", function(){
        SmoothScroll({
            keyboardSupport: true,
            animationTime: 1000,
            stepSize: 60, // [px]
        });
    });
    
    if($(".animated_title").length > 0){
        $('.animated_title p').html(function (i, html) {
            var chars = $.trim(html).split("");
            return '<span>' + chars.join('</span><span>') + '</span>';
        });
    }

    if($(".rating").length > 0){
        document.querySelectorAll('.rating').forEach(element => {
            const rating = element.querySelector('.group');
            const totalCost = rating.querySelectorAll('span')[1].innerHTML.replace(/[^0-9]/g,'');
            const currentCost = rating.querySelectorAll('span')[0].innerHTML.replace(/[^0-9]/g,'');
            const percent = currentCost / totalCost * 100;
            element.querySelector('.line span').style = `width: ${percent}%`
        });
    }

    if($("input, textarea").length > 0){
        document.querySelectorAll('input, textarea').forEach(element => {
            element.addEventListener('focus', (event) => {
            event.target.closest('.row').classList.add('focused');
            });
            element.addEventListener('blur', (event) => {
                if( event.target.value.length === 0){
                    event.target.closest('.row').classList.remove('focused');
                }
                if( event.target.getAttribute('type') === "radio"){
                    event.target.closest('.row').classList.remove('focused');
                }
            });
        });
    }

    /*---------------------------------   mask tel   -------------------------------*/

    function setCursorPosition(pos, elem) {
        elem.focus();
        if (elem.setSelectionRange) elem.setSelectionRange(pos, pos);
        else if (elem.createTextRange) {
            var range = elem.createTextRange();
            range.collapse(true);
            range.moveEnd("character", pos);
            range.moveStart("character", pos);
            range.select();
        }
    }

    function funMask(event) {
        var that = event.target;
        var matrix = "___-___-____",
            i = 0,
            def = matrix.replace(/\D/g, ""),
            val = that.value.replace(/\D/g, "");
        if (def.length >= val.length) {
            val = def;
        }
        that.value = matrix.replace(/./g, function(a) {
            return /[_\d]/.test(a) && i < val.length ? val.charAt(i++) : i >= val.length ? "" : a;
        });
        if (event.type === "blur") {
            if (that.value.length === 2) {
                that.value = "";
            }
        } else {
            setCursorPosition(that.value.length, that);
        }
    }

    var $telForm = $("input[type='tel']");
    $telForm.on("focus click blur input", funMask);

    //FAQ

    $('.faq .faq_item').on('click', function(){
        $(this).toggleClass('opened');
    });

    if($(".faq_item").length > 0){
        document.querySelectorAll('.faq_item').forEach(element => {
            element.querySelector('.faq_content_cover').style.setProperty('--el-height', element.querySelector('.faq_content').getBoundingClientRect().height + 'px');
        });
    }
    if($(".goBack").length > 0){
        document.querySelector('.goBack').addEventListener("click", (event) => {
            window.history.back();
        });
    }
    if($(".blog-inner-page").length > 0){
        console.log( document.querySelector('.overlay'), 'pppp')
        $('.overlay').toggleClass('opened');
    }
    $('.about-wrapper .item-general').on('click', function(){
        const target = $(this).attr('data-target');
        $('.'+target).toggleClass('opened');
    });
    $('.closePopup').on('click', function(){
        $('.overlay').removeClass('opened');
    });

});
