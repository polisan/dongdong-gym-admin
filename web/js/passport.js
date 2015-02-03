
$("#link-captcha-change").on('click', function() {
    jQuery('#captcha-img').yiiCaptcha('refresh');
})
$(':submit').click(function(){
    jQuery('#captcha-img').yiiCaptcha('refresh');}
);
