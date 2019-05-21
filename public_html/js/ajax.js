window.addEventListener("load", function() {

    $('.btn-like').css('cursor', 'pointer');
    $('.btn-dislike').css('cursor', 'pointer');
    /**
     * funcion de like
     */
    function like() {
//Boton de like
        $('.btn-like').unbind('click').click(function() {
            console.log('like');
            $(this).addClass('btn-dislike').removeClass('btn-like');
            $(this).attr('src', 'img/dislike.png');
            dislike();
        });
    }
    like();
    /**
     * funcion de dislike
     */
    function dislike() {
        //Boton de dislike
        $('.btn-dislike').unbind('click').click(function() {
            console.log('dislike');
            $(this).addClass('btn-like').removeClass('btn-dislike');
            $(this).attr('src', 'img/like.png');
            like();
        });
    }
    dislike();
});