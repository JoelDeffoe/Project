/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * JS function for handling form submission
 * 
 * @param {type} formElement
 * @returns {undefined}
 */
function studentFormSubmissionHandler(formElement)
{
    var statuMessageContainer = $('#status-message');
    formElement.submit(function(evt)
    {
        var thisForm = $(this);
        var data= thisForm.serializ();
        jQuery.ajax({
            url: thisForm.attr('action'),
            type: thisForm.attr('method'),
            data: data,
            dataType: 'json',
            beforeSend: function(xhr) {
            },
            error: function(a, b, c) {
                console.error('Error while submitting form: ' + b);
            },
            success: function(response) {
                // reset form
                thisForm[0].reset();
                // display output
                if (response.error)
                {
                    statusMessageContainer.html(alertBox('danger', response.error));
                }
                else if (response.success)
                {
                    statusMessageContainer.html(alertBox('danger', response.message));
                    console.log(response.data);
                }
                
                statusMessageContainer.find('.alert').alert();
            }
        });
        evt.preventDefault();
        return false;
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


function GetTheList()
{
    jQuery.ajax({
        url: "/api/",
        dataType: "json",
        error: function (a, b, c) {
             alert(b);
        },
        success: function (resp) {
            console.log(resp.data);
		}
    });
}

/**
 * After HTML Document loaded
 */
$(document).ready(function(){
    
    var contactFormElement = $('#contactus-form');
    
    // If the contact form exists
    if (contactFormElement.length)
    {
        // Triger contact form submission handler
        contactFormSubmissionHandler(contactFormElement);
    }
    GetTheList();
});