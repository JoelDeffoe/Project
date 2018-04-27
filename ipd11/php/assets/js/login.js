$(document).ready(function () {
    
    var form = $('#login-form');
    
    form.submit(function(){
        $.ajax({
            url: form.attr('action'),
            type: form.attr('method'),
            dataType: 'json',
            beforeSend: function(xhr) {
                xhr.setRequestHeader(csrftokenname, window[csrftokenname]);
                xhr.setRequestHeader('Authorization', btoa(form.find('#username').val() + ":" + form.find('#password').val()));
            },
            error: function(a, b, c) {
                console.error(a,b,c);
            },
            success: function(resp) {
                $('#status-message').html(alertBox(resp.error?'danger':'success', resp.message));
                if (resp.success) {
                    setTimeout(function(){
                        window.location.reload();
                    }, 1000);
                }
            }
        });
        return false;
    });
});