
/*****************************
 * 初始化
 ***************************/
$(function() {
    $('a.js_ajax').each(htmlAjax);
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
    $('#js_batchedit').each(function() {
        var status = 1;
        $(this).attr('status', '');
        $(this).on('click', function() {
            $('.bat-opr').toggle();
            $('.checkitem').toggle();
            if (status) {
                $(this).text('退出管理');
                status = 0;
            }
            else {
                $(this).text('批量管理');
                status = 1;
            }
        });
    });
    $('#checkall').on('click', function() {
        $('.checkitem').each(function() {
            var status = $(this).prop('checked');
            $(this).prop('checked', !status);
        });
    });
    $('#btn-nickname-edit').on('click', function(){
        $('#nickname').toggle();
        $('#nickname-edit').toggle();
        $('#btn-nickname-edit').hide();
        $('#btn-nickname-change').show();
    });
    $('#editor').each(function() {
        var ue = UE.getEditor('editor');
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
/*!************************************************************************
 * the following functions used for different behavior
 *************************************************************************/

function editField() {
    var fdid = $(this).parents('.fd-item').children('.fdid').val();
    $.ajax({
        url: '/dongdong/gym-admin/gym/fields/edit',
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

/*!************************************************************************
 * the following functions are general function that are used in most scene
 *************************************************************************/
/**
 * 通过post进行ajax提交
 * @param
 */
function submitAjax(parms) {
    $.ajax({
        url: parms.url,
        async: false,
        type: "post",
        data: parms.query,
        success: function(result) {
            var msg = null;
            try {
                msg = $.parseJSON(result);
                if (msg) {
                    if (parseInt(msg.statusCode) == 200) {
                        var html = '<div>' + msg.message + '</div>';
                        $(html).dialog({
                            modal: true
                        });
                    }
                    else if (parseInt(msg.statusCode) == 300) {
                        var html = '<div>' + msg.message + '</div>';
                        $(html).dialog({
                            modal: true
                        });                    }
                }
                return msg.statusCode;
            }
            catch(e) {}
            finally{}
            return 300;
        }
    });
}
function htmlAjax() {
    var _this = this;
    var target = $(_this).attr('target');
    $(_this).attr('target','_self');
    var href = $(_this).attr('href');
    $(_this).attr('href','javascript:;');
    var query = $(_this).attr('query');
    $(_this).attr('query', '');
    $(_this).on('click', function() {
        var confirm = $(_this).attr('confirm');
        if (confirm) {
            var confirmDialog = $('#confirmDialog');
            $(confirmDialog).html(confirm);
            $(confirmDialog).dialog('option', {
                buttons: {
                    '确定': function() {
                        submitAjax({'url':href, 'query':query, 'target':target});
                        $('#confirmDialog').dialog('close');
                    },
                    '取消': function() {
                        $('#confirmDialog').dialog('close');
                    }
                }
            });
            $(confirmDialog).dialog('open');
        }
        else {
            submitAjax({'url':href, 'query':query, 'target':target});
        }
        return false;
    });
}