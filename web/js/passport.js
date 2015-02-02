/**
 * Created by dove on 1/27/15.
 */

$("#link-captcha-change").on('click', function() {
    jQuery('#captcha-img').yiiCaptcha('refresh');
})
$(':submit').click(function(){
    jQuery('#captcha-img').yiiCaptcha('refresh');}
);
