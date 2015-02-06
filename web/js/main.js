
$(function() {
    $('.clockpicker').clockpicker();
    $('#btn-avatar-edit').on('click', ajaxFileUpload);
    $('#btn-nickname-edit').on('click', function(){
        $('#nickname').toggle();
        $('#nickname-edit').toggle();
        $('#btn-nickname-edit').hide();
        $('#btn-nickname-change').show();

    });
    $('#btn-nickname-change').on('click', function(){
        var n = $('#nickname');
        var ne = $('#nickname-edit');
        $.ajax({
            type: 'POST',
            url: '/dongdong/gym-admin/my/ajax/edit-profile',
            async: false,
            data: {username: ne.val()},
            success: function(result) {
                if (result == '') {
                    location.href = '/dongdong/gym-admin';
                } else if (result == 0) {
                    $('#btn-nickname-edit').show();
                    $('#btn-nickname-change').hide();
                    n.toggle().text(ne.toggle().val());
                    $('.nick-name').text(ne.val());
                } else {
                    alert(result == 204 ? '用户名已被占用' : '位置错误');
                    $('#btn-nickname-edit').show();
                    $('#btn-nickname-change').hide();
                    ne.toggle().val(n.toggle().text());
                }
            }
        });
    });

    $('select[name="province"]').change(function() {
        var t = this;
        $.ajax({
            type: 'POST',
            url:'/dongdong/gym-admin/address/ajax/cities',
            async: false,
            data: {province: $(t).val()},
            success: function(result) {
                $(t).nextAll('select[name="city"]').first().html(
                    '<option value="0">请选择城市</option>'+
                    result
                );
                $(t).nextAll('select[name="county"]').first().html(
                    '<option value="0">请选择区域</option>'
                );
            }
        });
    });
    $('select[name="city"]').change(function() {
        var t = this;
        $.ajax({
            url: '/dongdong/gym-admin/address/ajax/counties',
            async: false,
            type: 'POST',
            data: {city:$(t).val()},
            success: function(result) {
                $(t).nextAll('select[name="county"]').html(
                    '<option value="0">请选择区域</option>'+
                    result
                );
            }
        });
    });
});

function ajaxFileUpload()
{
    //starting setting some animation when the ajax starts and completes
    $("#avatar-edit")
        .ajaxStart(function(){
            $(this).show();
        })
        .ajaxComplete(function(){
            $(this).hide();
        });

    /**
     *  prepareing ajax file upload
     *  @url: the url of script file handling the uploaded files
     *  @fileElementId: the file type of input element id and it will be the index of  $_FILES Array()
     *  @dataType: it support json, xml
     *  @secureuri:use secure protocol
     *  @success: call back function when the ajax complete
     *  @error: callback function when the ajax failed

     */
    $.ajaxFileUpload
    (
        {
            url:'/dongdong/plugins/ajaxFileUploader/doajaxfileupload.php',
            secureuri:false,
            fileElementId:'fileToUpload',
            dataType: 'json',
            success: function (data, status)
            {
                if(typeof(data.error) != 'undefined')
                {
                    if(data.error != '')
                    {
                        alert(data.error);
                    }else
                    {
                        alert(data.msg);
                    }
                }
            },
            error: function (data, status, e)
            {
                alert(e);
            }
        }
    )
    return false;
}
