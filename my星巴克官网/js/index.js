$(function(){
    $('#starbuck-menu').on('click',function(){
        //console.log(123);
        $('.mask').css({
            display:'block'
        });
        $('#menu').css({
            display:'block'
        });
    });
    $('.mask').on('click',function(){
        $('.mask').css({
            display:'none'
        });
        $('#menu').css({
            display:'none'
        });
    });

    var bFalg = true;
    $(window).on('scroll',function(){
        if(bFalg && $(this).scrollTop()>200){
        $('#starbuck-header').css({
            position:'static'
        });
            bFalg = false;
        }
        if(!bFalg && $(this).scrollTop()<=200){
            $('#starbuck-header').css({
                position:'fixed'
            });
            bFalg = true;
        }
    });

});
