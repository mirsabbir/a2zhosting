$(function() {
    // countUp
    $('.numbers .counter').countUp({
        delay: 10,
        time: 1500
    });
});




$('.couponcopy').bind('click', function(){
    
    $('.couponcopy').preventDefault();
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val($("#cc").text()).select();
    document.execCommand("copy");
    $temp.remove();
});


