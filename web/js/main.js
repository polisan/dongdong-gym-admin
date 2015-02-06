
$(function() {
    $('.clockpicker').clockpicker();
    $('#btn-avatar-edit').on('click', ajaxFileUpload);
    $('.js_addfield').on('click', addField);           // add new field
    $('.js_editfield').on('click', editField);         // edite the specified field
    $('.js_delfield').on('click', delField);           // select field to delete
    $('.js_delsubmit').on('click', function() {
        var r = confirm('确定要删除所选的场地，预约功能将不能使用');
        if (r) {
            var container = $(this).parents('ul');
            $(container.find('input:checkbox')).each(function() {
                if($(this).is(':checked'))
                    $(this).parent().remove();
                else $(this).hide();
            });
            $(container.children('.opr-regulation')).show();
            $(container.children('.opr-confirm')).hide();
        }
    });
    $('.js_delcancel').on('click', function() {
        var container = $(this).parents('ul')
        $(container.find('input:checkbox')).hide();
        $(container.children('.opr-regulation')).show();
        $(container.children('.opr-confirm')).hide();
    });
    $('.js_addtime').on('click', function() {
        var gentimeStyle = '';
        if ($(this).parents('.fd-gen-timetable').length > 0) {
        gentimeStyle = '<li class="time-item">' +
            '<h5 class="title">时间段: </h5>' +
            '<select class="time-sel" name="">' +
            '<option value="Mon">星期一</option>' +
            '<option value="Tues">星期二</option>' +
            '<option value="Wed">星期三</option>' +
            '<option value="Thur">星期四</option>' +
            '<option value="Fri">星期五</option>' +
            '<option value="Sat">星期六</option>' +
            '<option value="Sum">星期日</option>' +
            '</select>' +
            '<span class="clockpicker">' +
            '<input type="text" name="" value="09:30">' +
            '</span>' +
            '<strong> 到 </strong>' +
            '<span class="clockpicker">' +
            '<input type="text" name="" value="21:30">' +
            '</span>' +
            '<div class="charge col-md-offset-2">' +
            '<label class="charge-type col-md-2">收费方式</label>' +
            '<select name="">' +
            '<option value="1">按小时收费</option>' +
            '<option value="2">按次收费</option>' +
            '</select>' +
            '<input type="text" name="" placeholder="0" /> 元' +
            '</div>' +
            '</li>';
        }
        else if ($(this).parents('.fd-special-timetable').length > 0) {
            gentimeStyle = '<li class="time-item">' +
                '<h5 class="title">时间段: </h5>' +
                '<input type="text" name="from_date" value="2015-02-06" showanim="fold" showon="both" maxdate="new Date()" buttonimageonly="" dateformat="yy-mm-dd" class="datepicker hasDatepicker">' +
                '<span class="clockpicker">' +
                '<input type="text" name="" value="09:30">' +
                '</span>' +
                '<strong> 到 </strong>' +
                '<span class="clockpicker">' +
                '<input type="text" name="" value="21:30">' +
                '</span>' +
                '<div class="charge col-md-offset-2">' +
                '<label class="charge-type col-md-2">收费方式</label>' +
                '<select name="">' +
                '<option value="1">按小时收费</option>' +
                '<option value="2">按次收费</option>' +
                '</select>' +
                '<input type="text" name="" placeholder="0" /> 元' +
                '</div>' +
                '</li>';
                }
        $(this).before(gentimeStyle);
        $(this).prev().find('.clockpicker').each(function(){
            $(this).clockpicker();
        });
        $(this).prev().find('.datepicker').each(function(){
            $(this).datepicker();
        })
    });
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

function editField() {
    var fdid = $(this).parents('.fd-item').children('.fdid').val();
    $.ajax({
        url: '/dongdong/gym/fields/updatefield',
        type: 'post',
        data: {fd:fdid},
        success: function(result) {
            $('.modal-body').html(result);
            $('#showModal').click();
        }

    });
}

function addField() {
    var ul = $(this).parents('ul');
    var name = ul.children().length - 3;
    name = name + '号场';
    var fdStyle = '<li class="fd-item self"> <input type="checkbox"> <h5 class="fd-name">1号场</h5> <h5 class="fd-status orange">营业中</h5> <input type="hidden" value="1" class="fdid"> <span class="fd-name-edit"><a class="js_editfield" href="javascript:void(0);">修改</a></span> </li>';
    $(this).parent('li').before(fdStyle);
    $(this).parent('li').prev().find('.fd-name-edit').on('click', editField);
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
