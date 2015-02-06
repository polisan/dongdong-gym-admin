
$(function() {
    $('.clockpicker').clockpicker();
    $('#btn-avatar-edit').on('click', ajaxFileUpload);
    $('.js_addfield').on('click', addField);
    $('.js_editfield').on('click', editField);
    $('.js_delfield').on('click', delField);
    $('.js_delsubmit').on('click', function() {
        var container = $(this).parents('ul');
        $(container.find('input:checkbox')).each(function() {
            if($(this).is(':checked'))
                $(this).parent().remove();
            else $(this).hide();
        });
        $(container.children('.opr-regulation')).show();
        $(container.children('.opr-confirm')).hide();
    });
    $('.js_delcancel').on('click', function() {
        var container = $(this).parents('ul')
        $(container.find('input:checkbox')).hide();
        $(container.children('.opr-regulation')).show();
        $(container.children('.opr-confirm')).hide();
    });
    $('#btn-nickname-edit').on('click', function(){
        $('#nickname').toggle();
        $('#nickname-edit').toggle();
        $('#btn-nickname-edit').hide();
        $('#btn-nickname-change').show();

    });
    $('#btn-nickname-change').on('click', function(){
        $('#nickname').toggle();
        $('#nickname-edit').toggle();
        $('#btn-nickname-edit').show();
        $('#btn-nickname-change').hide();
        $('#nickname').text($('#nickname-edit').val());
    });

    $('select[name="province"]').change(function() {
        var t = this;
        $.ajax({
            url: '/dongdong/gym-admin/address/ajax/cities',
            async: false,
            type: 'POST',
            data: {province:$(t).val()},
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

function editField() {
    var fdid = $(this).parents('.fd-item').children('.fdid').val();
    $.ajax({
        url: '/dongdong/gym/fields/updatefield',
        type: 'post',
        data: {fd:fdid},
        success: function(result) {
            $('.modal-body').html(result);
        }

    });
}

function addField() {
    var ul = $(this).parents('ul');
    var name = ul.children().length - 1;
    name = name + '号场';
    $(this).parent('li').before('<li class="fd-name self"><h5>'+ name + '</h5><span class="fd-name-edit"><a href="">修改</a></span></li>');
}

function delField() {
    var container = $(this).parents('ul')
    $(container.children('.fd-item')).each(function() {
        $(this).children('input').show();
        $(this).show();
    });
    $(container.children('.opr-regulation')).hide();
    $(container.children('.opr-confirm')).show();
}

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
