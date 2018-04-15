$(document).ready(function(){
     var nextBtn  = $('button.next'),
         prevBtn  = $('button.prev'),
         Forms = {
                obj: $('#product-form fieldset'),
                showNext : function(){
                    $('.showing').velocity('transition.slideLeftOut', {
                        duration: 200,
                        complete: function(){
                            $('.showing')
                                .next('fieldset')
                                .addClass('showing')
                                .velocity('transition.slideRightIn')
                                .siblings('fieldset')
                                .removeClass('showing');

                            $('.progressbar').find('.active').removeClass('active').addClass('done').next('li').addClass('active');
                        }
                    });
                },
                showPrevious: function(){
                    $('.showing').velocity('transition.slideRightOut', {
                        duration: 200,
                        complete: function(){
                            $('.showing')
                                .prev('fieldset')
                                .addClass('showing')
                                .velocity('transition.slideRightIn')
                                .siblings('fieldset')
                                .removeClass('showing')

                            $('.progressbar').find('.active').removeClass('active').removeClass('done').prev('li').addClass('active');
                        }
                    });
                }
    };

    prevBtn.click(function(){
        Forms.showPrevious();
    });
    nextBtn.click(function(){
        Forms.showNext();
    });

});