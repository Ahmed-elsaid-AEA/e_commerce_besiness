//to make placholder fucntion to input username
$(function () {
    'use strict';
    // Calls the selectBoxIt method on your HTML select box and uses the default theme
    $("select").selectBoxIt({
        autoWidth: false
    });
    //hide placholder on form focus
    $('[placeholder]').focus(function () {
        $(this).attr('data-text', $(this).attr('placeholder'));
        $(this).attr('placeholder', '');
    })./*if you moved mouse a way will return to normal */blur(function () {
        $(this).attr('placeholder', $(this).attr('data-text'));
    });

    //add Asterisk alert on required fileld
    //first select all input filed

    $('input').each(function () {
        //after that if has required attr
        if ($(this).attr('required') === 'required') {
            $(this).after('<span class="asterisk">*</span>');

        }
    });
    //convert password field to text field on hover
    var passField = $('.password');
    var $clicked = true;
    $('.show-pass').click(function () {
        if ($clicked) {
            passField.attr('type', 'text');
            $clicked = false;
        } else {
            /** on cancel hover mouse  */
            passField.attr('type', 'password');
            $clicked = true;
        }

    });
    //if yoou want hover not click
    /*  $('.show-pass').hover(function () {
          passField.attr('type', 'text');
      }, function () {// on cancel hover mouse  
          passField.attr('type', 'password');
      });*/
    //confirmation message on button
    $('.confirm').click(function () {
        return confirm('Are your sure ?')
    });
    //catogery view option
    $('.cat h3').click(function () {
        $(this).next('.full-view').fadeToggle(200);
    });
    //catogery view option
    $('.option span').click(function () {
        $(this).addClass('active').siblings('span').removeClass('active');
        if ($(this).data('view') === 'full') {
            $('.cat .full-view').fadeIn(200);
        }
        else {
            $('.cat .full-view').fadeOut(200);
        }
    });
});


