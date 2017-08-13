var loginAjaxUrl = '/ajax/login';

$(function(){
    $('.container').on('click','#login', function(e) {
        e.preventDefault();

        $.ajax({
            url: loginAjaxUrl,
            type: 'POST',
            dataType: 'json',
            data: { name : $('#name').val(), password : $('#password').val() },

            success: function (data) {
                if(data.status == 'success'){
                    $(location).attr('href','/');
                }
                else
                {
                    if(data.err){
                        $('#info').html(data.err);
                    }
                }
            },
            error: function(req, text, error) {
                console.log('Ошибка AJAX: ' + text + ' | ' + error);
            },
        });
    });
});