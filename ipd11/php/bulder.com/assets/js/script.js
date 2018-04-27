function formSubmissionHandler(form, onSuccess, onError)
{
    var statusMessageContainer = $('#status-message');
    
    $.validate({
        form: '#'+form.attr('id'),
        onSuccess: function($form) {
            var data = $form.serialize();
            jQuery.ajax({
                url: $form.attr('action'),
                type: $form.attr('method'),
                data: data,
                dataType: 'json',
                error: function(jqXHR, textStatus, errorThrown) {
                    if (onError) {
                        onError(jqXHR, textStatus, errorThrown);
                    }
                    else {
                        statusMessageContainer.html(alertBox('danger', 'Error while submitting form: ' + textStatus));
                    }
                },
                success: function(response) {
                    // reset form
                    $form[0].reset();
                    if (onSuccess)
                    {
                        onSuccess(response);
                    }
                    else
                    {
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