$(document).ready(function(){
    $(".btn").click(function(event){
        event.preventDefault();
        $('html, body').animate({scrollTop: 0}, 'slow');
    });
});
