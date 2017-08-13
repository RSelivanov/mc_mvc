    function checkUserName ( obj )
    {
        var value = obj.value;

        var reg = new RegExp("[0-9a-zA-Z_^.]", 'i');
        if ( !reg.test ( value ))
        {
            $('#warning').html("Вы ввели не корректный E-mail аддрес !");
        }
        else
        {
            $('#warning').html("");
        }
    }

    function checkEmail ( obj )
    {
        var value = obj.value;

        var reg = new RegExp("[0-9a-z_]+@[0-9a-z_^.]+\\.[a-z]", 'i');
        if ( !reg.test ( value ))
        {
            $('#warning').html("Вы ввели не корректный E-mail аддрес !");
        }
        else
        {
            $('#warning').html("");
        }
    }
    
    function checkUrl ( obj )
    {
        var value = obj.value;

        var reg = new RegExp("^((https?|ftp)\:\/\/)?([a-z0-9]{1})((\.[a-z0-9-])|([a-z0-9-]))*\.([a-z]{2,6})(\/?)", 'i');
        if ( !reg.test ( value ))
        {
            $('#warning').html("Вы ввели не корректный Url аддрес !");
        }
        else
        {
            $('#warning').html("");
        }
    }
    

$(function(){
    $('#preview').click(function() {

        var now_date = new Date();
        var Year = now_date.getFullYear();
        var Month = now_date.getMonth();
        var Day = now_date.getDay();
        var Hour = now_date.getHours();
        var Minutes = now_date.getMinutes();
        var Seconds = now_date.getSeconds();
        
        var file_name = '';
        if (($("#guest_file"))[0].files.length > 0) {
            file_name = $('#guest_file')[0].files[0].name;
        }
 
        $('#preview_date').html(Year+"-"+Month+"-"+Day+" "+Hour+":"+Minutes+":"+Seconds);
        $('#preview_username').html($('#username').val());
        $('#preview_email').html($('#email').val());
        $('#preview_message').html(tinyMCE.activeEditor.getContent());
        $('#preview_file').html(file_name);
        
        return false;     
    });
});
