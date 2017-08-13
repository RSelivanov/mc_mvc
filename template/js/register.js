var nameerr = true;
var passerr = true;
var emailerr = true;

var registerAjaxUrl = '/ajax/register';

function check_str ( value )
{
    var regxp  = new RegExp("[А-Яа-я||!@#$%^.&*+();><`]");
    if ( value.match(regxp) )
    {
        return true;
    }
    else
    {
        var reg = new RegExp("[0-9a-zA-ZА-Я_^.]", 'i');
        return !reg.test( value );
    }
}

function check_login ( obj )
{
    $('#name').removeClass("field-success");
    $('#name').removeClass("field-error");
    nameerr = true;

    var value = obj.value;
    if ( value == '' )
    {
        $('#name').addClass("field-error");
        $('#info').html("Ник не может быть меньше 3х символов!");
    }
    else if ( value.length < 3 )
    {
        $('#name').addClass("field-error");
        $('#info').html("Ник не может быть меньше 3х символов!");
    }
    else if ( value.length > 15 )
    {
        $('#name').addClass("field-error");
        $('#info').html("Ник не может быть больше 15и символов!");
    }
    else if ( check_str( value ))
    {
        $('#name').addClass("field-error");
        $('#info').html("В нике запрещено использовать русские буквы и знаки припинания!");
    }
    else
    {
        $.ajax({
            url: registerAjaxUrl,
            type: 'POST',
            dataType: 'json',
            data: {change_name : $('#name').val()},
            success: function (data) {
                if(data.exist == 'true') {
                    $('#name').addClass("field-error");
                    $('#info').html("Такой ник уже используется!");
                }
                else
                {
                    $('#name').addClass("field-success");
                    $('#info').html("");
                    nameerr = false;
                }
            },
            error: function(req, text, error) {
                console.log('Ошибка AJAX: ' + text + ' | ' + error);
            },
        });
    }
}

function check_password ( obj )
{
    $('#password').removeClass("field-success");
    $('#password').removeClass("field-error");
    passerr = true;

    var value = obj.value;
    if ( value.length < 6 )
    {
        $('#password').addClass("field-error");
        $('#info').html("Указан слишком короткий пароль!");
    }
    else
    {
        $('#password').addClass("field-success");
        $('#info').html("");
        passerr = false;
    }
}

function check_mail ( obj )
{
    $('#email').removeClass("field-success");
    $('#email').removeClass("field-error");
    emailerr = true;

    var value = obj.value;
    var reg = new  RegExp("[0-9a-z_]+@[0-9a-z_^.]+\\.[a-z]", 'i');
    if ( !reg.test ( value ))
    {
        $('#email').addClass("field-error");
        $('#info').html("Указан неверный емейл!");
    }
    else
    {
        $.ajax({
            url: registerAjaxUrl,
            type: 'POST',
            dataType: 'json',
            data: {change_email : $('#email').val()},
            success: function (data) {
                if(data.exist == 'true') {
                    $('#email').addClass("field-error");
                    $('#info').html("Такой емейл уже используется!");
                }
                else
                {
                    $('#email').addClass("field-success");
                    $('#info').html("");
                    emailerr = false;
                }
            },
            error: function(req, text, error) {
                console.log('Ошибка AJAX: ' + text + ' | ' + error);
            },
        });
    }
}

$(function(){

    $('.container').on('click','#register', function(e) {
        e.preventDefault();
        if(nameerr == true){
            $('#info').html('Ошибка! Ник введен неверно!');
        }
        else if(passerr == true){
            $('#info').html('Ошибка! Пароль введен неверно!');
        }
        else if(emailerr == true){
            $('#info').html('Ошибка! Емеел введен неверно!');
        }
        else{
            $.ajax({
                url: registerAjaxUrl,
                type: 'POST',
                dataType: 'json',
                data: {name : $('#name').val(), password : $('#password').val(), email : $('#email').val()},

                success: function (data) {
                    if(data.status == 'success'){
                        $(location).attr('href','/pages/loadpage?name=registerwin');
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
        }
    });
});