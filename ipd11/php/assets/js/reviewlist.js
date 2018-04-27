function populateDataFromListUsingHandlebars(data, templateId, destId)
{
    var destElement = $('#' + destId);
    var tmplElement = $('#' + templateId);
    if (data && destElement.length && tmplElement.length)
    {
        var template = Handlebars.compile(tmplElement.html());
        destElement.html(template({list: data}));
    }
}

$(document).ready(function () {
    
    $.ajax({
        url: '/api/review/reviewlist',
        type: 'GET',
        beforeSend: function(xhr) {
            xhr.setRequestHeader(csrftokenname, window[csrftokenname]);
        },
        error: function(a, b, c) {
            console.error(a,b,c);
        },
        success: function(resp) {
            populateDataFromListUsingHandlebars(resp.data, 'subscribers-list-hbtmpl', 'output');
        }
    });
});