
$(function() {
    $(".clockpicker").clockpicker();
    $('#btn-avatar-edit').on('click', ajaxFileUpload);
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
