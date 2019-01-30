$('#fond-home').css('height', $(window).height() * 1);
$('.vertival-center').css('margin-top', $(window).height() /4);

$(window).scroll(function() {
    console.log($(document).scrollTop());
    if($(document).scrollTop() > 130){
        $('.navbar').css('background-color', "#90bedf");
        $('.navbar').css('box-shadow', "0 10px 8px 0 rgba(0, 0, 0, 0.2), 0 12px 25px 0 rgba(0, 0, 0, 0.19)");
    }
    else{
        $('.navbar').css('background-color', "#90bedf00");
        $('.navbar').css('box-shadow', "none");
    }
});