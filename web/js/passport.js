$("#link-captcha-change").on('click', function() {
    jQuery('#captcha-img').trigger('click');
});
var img = new Image;
img.src = $('#captcha-img').attr('src');
img.onload = function() {
    $('#captcha-img').trigger('click');
};

