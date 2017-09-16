 
    
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
 var fn;   
    function getFileName(elm) {
        //fn = $(elm.files);
        
        fn = elm.files[0];
        console.log(fn);
    }
    
    
var el;
var arr = [];
$(function(){
    
    tinymce.init({selector: '#message'});
    
    $('body').on('click','.preview', function(e) {
        e.preventDefault();

        function checkTime(i)
        {
            if (i<10) 
            {
                i="0" + i;
            }
        return i;
        }
        
        var that = $(this);
        
        var now_date = new Date();
        var Year = now_date.getFullYear();
        var Month = checkTime(now_date.getMonth() + 1);
        var Day = checkTime(now_date.getDate());
        var Hour = checkTime(now_date.getHours());
        var Minutes = checkTime(now_date.getMinutes());
        var Seconds = checkTime(now_date.getSeconds());
        
        var file_name = '';
        if (($("#guest_file"))[0].files.length > 0) {
            file_name = $('#guest_file')[0].files[0].name;
        }
	var username = that.parent('.post-form').children('.box-username').children('.horizontal-box-input').children('.username').val();
        var email = that.parent('.post-form').children('.box-email').children('.horizontal-box-input').children('.email').val();
        var homepage = that.parent('.post-form').children('.box-homepage').children('.horizontal-box-input').children('.homepage').val();
        
        var username = username ? username : 'Username';
        var email = email ? email : 'example@email.com';
        var homepage = homepage ? ' ( <span><a class="post-author" href="' + homepage + '" >' + homepage +'</a><span> ) ' : 
        ' ( <span><a class="post-author" href="http://example.com">http://example.com</a></span> ) ';
        var message = tinyMCE.activeEditor.getContent() ? tinyMCE.activeEditor.getContent() : 'Ваше сообщение.';
        
        var preview = that.parent('.post-form').parent('.content-wrapper').parent('.content-box').parent('.transparent-box').children('.preview_area');

        
	preview.html( 
            '<div class="content-box mt-15 p-15" style="background: #fff9db;">'+
                '<div class="post-wrapper">'+
                    '<a href="/user/'+username+'"><img class="post-image shadow" src="/skin/'+username+'/head64" alt="avatar"></a>'+
                    '<div class="post-header-info">'+
                        '<a href="#" class="preview_close"><i class="fa fa-times c-r" style="float: right;"></i></a>'+
                        '<a href="/user/'+username+'" class="post-author">'+username+'</a><span class="post-author ml-5">[ '+email+' ]</span>'+homepage+
                        '<p class="post-date">'+Year+"-"+Month+"-"+Day+" "+Hour+":"+Minutes+":"+Seconds+'</p>'+
                    '</div>'+
                '</div>'+
            '<div class="post-text">'+
                message+
            '</div>'+
            '<hr>'+
            '</div>');
        return false;     
    });
    
    $('body').on('click','.preview_close', function(e) {
        e.preventDefault();
        
        var that = $(this);
        that.parent('.post-header-info').parent('.post-wrapper').parent('.content-box').parent('.preview_area').html('');
        
        return false;     
    });
    
    $('body').on('click','#message_delete', function(e) {
        e.preventDefault();

        var that = $(this);
        
        $.ajax({
            url: '/guestbook',
            type: 'POST',
            dataType: 'json',
            data: { delete_message_id : that.data('id') },
            
            success: function (data) {
                if(data.status == 'success'){
                    that.parent('.post-header-info').parent('.post-wrapper').parent('#message_box').remove();
                }
                else
                {
                    if(data.err){
                         console.log(data.err);
                    }
                }
            },
            error: function(req, text, error) {
                console.log('Ошибка AJAX: ' + text + ' | ' + error);
            },
        });
    });
    
    $('body').on('click','#get_edit_area', function(e) {
        e.preventDefault();
        
        var that = $(this);
        var id = that.data('id');
        
        arr[id] = that.parent('.post-header-info').parent('.post-wrapper').parent('.content-box').parent('.transparent-box').html();
        console.log(arr[id]);
        
        var content = that.parent('.post-header-info').parent('.post-wrapper').parent('#message_box').children('.post-text').html();
        var username = that.parent('.post-header-info').children('.username').html();
        var email = that.parent('.post-header-info').children('.email').html();
        var homepage = that.parent('.post-header-info').children('.homepage').children('.post-author').html();
        if(homepage === undefined){ homepage = ''; }
        
        that.parent('.post-header-info').parent('.post-wrapper').parent('#message_box').parent('.transparent-box').html(
            
        '<div class="content-box mt-15 p-15">'+

            '<a href="" id="close_edit_area" data-id = "'+id+'"><i class="fa fa-times c-r ml-5" style="float: right;"></i></a>'+
            '<div class="content-wrapper">'+
                                
                '<div id="warning" class="c-r"></div>'+
                                
                '<form class="post-form"  id="form_'+id+'" enctype="multipart/form-data" action="" method="post">'+
                    '<hr class="hr-small mt-0">'+
                    '<div class="horizontal-box box-username">'+
                        '<label class="horizontal-box-name">User Name<span class="c-r">*</span></label>'+
                        '<div class="horizontal-box-input"><input type="text" name="username" id="username" class="username form-control" value="'+username+'" onblur="checkUserName(this); return false;"/></div>'+
                    '</div>'+
                    '<hr class="hr-small">'+
                    '<div class="horizontal-box box-email">'+
                        '<label class="horizontal-box-name">E-mail<span class="c-r">*</span></label>'+
                        '<div class="horizontal-box-input"><input type="email" name="email" id="email" class="email form-control" value="'+email+'" onblur="checkEmail(this); return false;"/></div>'+
                    '</div>'+
                    '<hr class="hr-small">'+
                    '<div class="horizontal-box box-homepage">'+
                        '<label class="horizontal-box-name">Homepage</label>'+
                        '<div class="horizontal-box-input"><input type="url" name="homepage" id="homepage" class="homepage form-control" value="'+homepage+'" onblur="checkUrl(this); return false;"/></div>'+
                    '</div>'+
                    '<hr class="hr-small">'+
                    '<div class="form-group">'+
                        '<textarea name="message_'+id+'" id="message_'+id+'" class="form-control" rows="4" onblur="checkTextArea(this); return false;">'+content+'</textarea>'+
                    '</div>'+
                    '<hr class="hr-small">'+
                    '<input type="file" name="guest_file" class="guest_file" id="guest_file'+id+'" style="display: inline; height: 30px;" onchange="getFileName(this)">'+
                    '<input type="submit" id="update_message" name="new_message" data-id="'+id+'" value="Сохранить" class="ml-3 btn very-little-btn bc-b mr-3">'+
                    '<a href="#" id="preview" class="preview ml-3 btn very-little-btn bc-r mr-3">Предпросмотр</a>'+
                '</form>'+
            '</div>'+
        '</div>'+ 
        '<div class="preview_area"></div>'
        );

        tinymce.init({selector: '#message_'+id});
                    
    });
    
    $('body').on('click','#close_edit_area', function(e) {
        e.preventDefault();
        
        var that = $(this);
        var id = that.data('id');
        
        console.log(arr[id]);
       that.parent('.content-box').parent('.transparent-box').html(arr[id]);
       
    });
    
    $('body').on('click','#update_message', function(e) {
        e.preventDefault();

        var that = $(this);
        var id = that.data('id');
        //var file = that.parent('.post-form').children('#guest_file');
        //file = $(file)[0].files[0];
        //console.log(that.parent('.post-form').children('#guest_file').files);
        //console.log($('#guest_file'+id)[0].files[0]);
	var username = that.parent('.post-form').children('.box-username').children('.horizontal-box-input').children('.username').val();
        var email = that.parent('.post-form').children('.box-email').children('.horizontal-box-input').children('.email').val();
        var homepage = that.parent('.post-form').children('.box-homepage').children('.horizontal-box-input').children('.homepage').val();
        var message = tinyMCE.get('message_'+id).getContent();
        
        var formData = new FormData();
        formData.append('new_message', id);
        formData.append('update_row_id', id);
        formData.append('username', username);
        formData.append('email', email);
        formData.append('homepage', homepage);
        formData.append('message', message);
        formData.append('guest_file', fn);
        formData.append("upload_file", true);
        console.log(fn);

        //var box = that.parent('.post-form').parent('.content-wrapper').parent('.content-box').html('');
        
        $.ajax({
            url: '/guestbook',
            type: 'POST',
            data: formData,
            dataType: 'json',
            processData: false, // Не обрабатываем файлы (Don't process the files)
            contentType: false, // Так jQuery скажет серверу что это строковой запрос
            //data: { new_message : id, update_row_id : id, username : username, email : email, homepage : homepage, message : message},
            
            success: function (data) {
 
                if(data.status == 'success'){
                    console.log(data);
                    
                    var file = ''
                    if(data.file_name != ''){
                        file = '<a href="/kubatura/files/'+data.file_name+'">'+data.file_name+'</a>';
                    }
                    
                    that.parent('.post-form').parent('.content-wrapper').parent('.content-box').parent('.transparent-box').html( 
                    '<div class="content-box mt-15 p-15">'+
                        '<div class="post-wrapper">'+
                            '<a href="/user/'+data.username+'"><img class="post-image shadow" src="/skin/'+data.username+'/head64" alt="avatar"></a>'+
                            '<div class="post-header-info">'+
                                '<a href="" id="message_delete" data-id = "'+id+'"><i class="fa fa-times c-r ml-5" style="float: right;"></i></a>'+
                                '<a href="" id="get_edit_area"  data-id = "'+id+'"><i class="fa fa-pencil c-g" style="float: right;"></i></a>'+
                                '<a href="/user/'+data.username+'" class="post-author">'+data.username+'</a><span class="post-author ml-5">[ '+data.email+' ]</span>'+data.homepage+
                                '<p class="post-date">'+data.date+'</p>'+
                            '</div>'+
                        '</div>'+
                    '<div class="post-text">'+
                        message+
                    '</div>'+
                    '<hr>'+
                    file+
                    '</div>');

                }
                else
                {
                    console.log(data);
                    if(data.err){
                        
                        console.log(data.err);
                    }
                }
            },
            error: function(data, req, text, error) {
                console.log('Ошибка AJAX: ' + text + ' | ' + error);
            },
        });
    });
});
