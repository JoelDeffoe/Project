function contactFormSubmissionHandler(formElement, successCallback, errorCallback, beforeSendCallback)
{
    $.validate({
        form: '#'+formElement.attr('id'),
        onSuccess: function(form) {
            var data = form.serialize();
            jQuery.ajax({
                url: form.attr('action'),
                type: form.attr('method'),
                data: data,
                dataType: 'json',
                beforeSend: function(xhr) {
                    if (beforeSendCallback) {
                        beforeSendCallback(xhr, form);
                    }
                },
                error: function(a, b, c) {
                    if (errorCallback) {
                        errorCallback(a,b,c,form);
                    }
                },
                success: function(response) {
                    // reset form
                    form[0].reset();
                    if (successCallback) {
                        successCallback(response, form);
                    }
                    else {
                        var statusMessageContainer = $('#status-message');
                        // display output
                        if (response.error)
                        {
                            statusMessageContainer.html(alertBox('danger', response.error));
                        }
                        else if (response.success)
                        {
                            statusMessageContainer.html(alertBox('danger', response.message));
                        }

                        statusMessageContainer.find('.alert').alert();
                    }
                }
            });
            return false;
        }
    });
}

/**
 * 
 * JS function for wrapping alert message
 * 
 * @param {String} type
 * @param {String} message
 * @returns {String}
 */
function alertBox(type, message)
{
    var html = [];
    html.push('<div class="alert alert-'+(type||'info')+' alert-dismissible fade show" role="alert">');
    html.push('<button type="button" class="close" data-dismiss="alert" aria-label="Close">');
    html.push('<span aria-hidden="true">&times;</span>');
    html.push('</button>');
    html.push('<div class="message">'+message+'</div>');
    html.push('</div>');
    return html.join('');
}