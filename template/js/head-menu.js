$(function(){
    var link = location.href;
    var domain = location.origin;
    link = link.replace(domain,"");
    $('#intro-dm nav div div ul li a[href="'+link+'"]').parents('li').addClass('active');
});