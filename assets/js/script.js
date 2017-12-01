jQuery(document).ready(function($){
    var $counter = $('.counter .amount');
    if ( $counter.length ) {
        $counter.each(function(i){
            var amount = String($(this).data('amount'));
            (function($self,amount,expiration, count){
                var interv = setInterval(function(){
                    $self.text(getRandomString(count));
                }, 25 );
                setTimeout(function(){
                    clearInterval( interv );
                    $self.text(amount);
                }, expiration);
            })($(this), amount, (i + 1) * 200, amount.length);
        });
    }

    $('.newsletter-form form').on('submit',function(e){
        e.preventDefault();
        $.ajax({
            url:wpt2018.newsletter,
            dataType:'json',
            method:'post',
            data:{
                email: $('#email-newsletter').val(),
            },
            success:function(data){
                if(data.success) {
                    $('.newsletter-error').remove();
                    $n = $('.newsletter-form');
                    $n.find('form').remove();
                    $n.append($('<p><strong>Votre demande d’abonnement à bien été prise en compte ! Merci 🙌🏻</strong></p>'));
                } else {
                    $('<p class="newsletter-error">Il semble y avoir un soucis avec votre adresse email.</p>').insertAfter('.newsletter-form p:eq(0)');
                }
            },
        });
    });

    $('.myset input[type="text"], \
    .myset textarea, \
    .frm_forms input[type="text"], \
    .frm_forms textarea, \
    [class^="comment-form-"] input[type="text"], \
    [class^="comment-form-"] textarea').each(function () {
        $el = $(this);
        $el.wrap('<div class="input-wrap"/>');
        $el.after('<span class="caret"/>');
        $el.on('keypress keydown click keyup', setcaret);
    });   
    
    function setcaret(e) {
        var caret = getCaretCoordinates(this, this.selectionEnd);
        $label = $(this).parents('.input-wrap').next('label');
        if ( $(this).val() != '') {
            $label.hide();
        } else {
            $label.show();
        }
        $(this).parent().find('.caret').css({ 'left': caret.left - this.scrollLeft,'top':caret.top - this.scrollTop - 13});
    }
    glitch();

    $('.share button').on('click', function () {
        var url = $(this).attr('data-url');
        window.open(url, '_blank');
    });


});

/**
 * Usefull
 */
function getRandomString( count ) {
    count = typeof count !== 'undefined' ? count : 1;
    var str = '';
    for ( var i=0;i<count;i++) {
        str += String.fromCharCode(48 + ~~(Math.random() * 42));
    }
    return str;
}


// https://codepen.io/NyX/pen/mJezOE

var k = [38, 38, 40, 40, 37, 39, 37, 39, 66, 65],
    n = 0,
    audio = false;
$(document).keydown(function (e) {
    if (e.keyCode === k[n++]) {
        if (n === k.length) {
            if (!audio) {
                audio = new Audio('/wp-content/themes/2018/assets/sounds/ericskiff-wereallunderthestars.mp3');
                audio.play();
            } else {
                audio.pause();
                audio.currentTime = 0;
            }
            n = 0;
            return false;
        }
    }
    else {
        n = 0;
    }
});