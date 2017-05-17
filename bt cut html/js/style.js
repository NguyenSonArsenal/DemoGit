$(function(){



    $('.nutmenu').click(function(){
        $('.menuphai').addClass('show');
        return false;
    });
    

    $('.iconx').click(function(){
        $('.menuphai').removeClass('show');
        return false;
    });

    console.log('ok');

    $('.simicart-home').click(function(){
        $('body').animate({
            scrollTop:0
        },2000,'easeInOutExpo');
        $('.menuphai').removeClass('show');
    });


    $('.widthimg20').click(function(){
        $('body').animate({
            scrollTop:0
        },2000,'easeInOutExpo');

    });

    $('.m1').click(function(){
        $('body').animate({
            scrollTop:$('.main1').offset().top
        },2000,'easeInOutExpo');
        $('.menuphai').removeClass('show');
        return false;
    });

    $('.m2').click(function(){
        $('body').animate({
            scrollTop:$('.main2').offset().top
        },2000,'easeInOutExpo');
        $('.menuphai').removeClass('show');
        return false;
    });

    $('.m3').click(function(){
        $('body').animate({
            scrollTop:$('.main3').offset().top
        },2000,'easeInOutExpo');
        $('.menuphai').removeClass('show');
        return false;
    });

    $('.m4').click(function(){
        $('body').animate({
            scrollTop:$('.main4').offset().top
        },2000,'easeInOutExpo');
        $('.menuphai').removeClass('show');
        return false;
    });

    $('.m5').click(function(){
        $('body').animate({
            scrollTop:$('.main5').offset().top
        },2000,'easeInOutExpo');
        $('.menuphai').removeClass('show');
        return false;
    });

    $('.m6').click(function(){
        $('body').animate({
            scrollTop:$('.main6').offset().top
        },2000,'easeInOutExpo');
        $('.menuphai').removeClass('show');
        return false;
    });


    // hide/show form when click login
    $('.a-log').click(function(){
        $("#form").toggle();
        
    });

    $(".a-log").mousedown(function(){
        $(this).css('box-shadow', '-0px -1px 5px  #888');
    });
    $(".a-log").mouseup(function(){
        $(this).css('box-shadow', 'none');
    });


    // input js animate
    $('.ipname').focus(function(){
        $('.lblname').css('top','0');
        $('.lblname').css('color','#fab246');
        $(this).css('border-bottom', '1px solid #FAB246'); 
        $('.ippass').css('border-bottom', '1px solid #DADEE6'); 
        $('.lblpass').css('color','#707785');
        $('.lblpass').css('top','25');

    })

    $('.ippass').focus(function(){
        $('.lblpass').css('top','0');
        $('.lblpass').css('color','#fab246');
        $(this).css('border-bottom', '1px solid #FAB246'); 
        $('.ipname').css('border-bottom', '1px solid #DADEE6'); 
        $('.lblname').css('color','#707785');
        $('.lblname').css('top','25');
    })

    $(".form-control").focus(function(){
        $('.ipname').keydown(function(){
            $(this).css("background-color", "#EDF7FD");
        })
    });
    $(".form-control").focus(function(){
        $('.ippass').keydown(function(){
            $(this).css("background-color", "#EDF7FD");
        })
    });
    $(".form-control").blur(function(){
        $(this).css("background-color", "#fff");
    });


    // Xu li main3

    $('.des-attract').click(function(){

        $('.des-attract-title').show();
        $('.des-close-title').hide();
        $('.des-grow-title').hide();
        $('.des-voice-title').hide();
        $('.des-monitor-title').hide();

        $('.des-attract').hide();
        $('.des-close').show();
        $('.des-grow').show();
        $('.des-voice').show();
        $('.des-monitor').show();
        
        $(".slide3-1").hide();
        $(".slide3-2").hide();
        $(".slide3-3").hide();
        $(".slide3-4").hide();
        $(".slide3-5").show();

        $('.simiclick').hide();
        return false;
    });

    $('.des-close').click(function(){

        $('.des-attract-title').hide();
        $('.des-close-title').show();
        $('.des-grow-title').hide();
        $('.des-voice-title').hide();
        $('.des-monitor-title').hide();

        $('.des-attract').show();
        $('.des-close').hide();
        $('.des-grow').show();
        $('.des-voice').show();
        $('.des-monitor').show();

        $(".slide3-1").show();
        $(".slide3-2").hide();
        $(".slide3-3").hide();
        $(".slide3-4").hide();
        $(".slide3-5").hide();

        $('.simiclick').hide();
        return false;
    });

    $('.des-grow').click(function(){

        

        $('.des-attract-title').hide();
        $('.des-close-title').hide();
        $('.des-grow-title').show();
        $('.des-voice-title').hide();
        $('.des-monitor-title').hide();

        $('.des-attract').show();
        $('.des-close').show();
        $('.des-grow').hide();
        $('.des-voice').show();
        $('.des-monitor').show();

        $(".slide3-1").hide();
        $(".slide3-2").show();
        $('.slide3-3').hide();
        $('.slide3-4').hide();
        $(".slide3-5").hide();

        $('.simiclick').hide();
        return false;
    });

    $('.des-voice').click(function(){
        $('.des-attract-title').hide();
        $('.des-close-title').hide();
        $('.des-grow-title').hide();
        $('.des-voice-title').show();
        $('.des-monitor-title').hide();

        $('.des-attract').show();
        $('.des-close').show();
        $('.des-grow').show();
        $('.des-voice').hide();
        $('.des-monitor').show();

        $(".slide3-1").hide();
        $(".slide3-2").hide();
        $('.slide3-3').show();
        $(".slide3-4").hide();
        $(".slide3-5").hide();

        $('.simiclick').hide();
        return false;
    });

    $('.des-monitor').click(function(){
        $('.des-attract-title').hide();
        $('.des-close-title').hide();
        $('.des-grow-title').hide();
        $('.des-voice-title').hide();
        $('.des-monitor-title').show();

        $('.des-attract').show();
        $('.des-close').show();
        $('.des-grow').show();
        $('.des-voice').show();
        $('.des-monitor').hide();

        $(".slide3-1").hide();
        $(".slide3-2").hide();
        $(".slide3-3").hide();
        $(".slide3-4").show();
        $(".slide3-5").hide();

        $('.simiclick').hide();
        return false;
    })

    // End xu li main 3

    console.log('da den day oy');

}); // end js