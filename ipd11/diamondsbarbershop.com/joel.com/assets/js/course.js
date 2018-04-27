function getCouseList()
{
    // pull the list
    $.ajax({
        url: '/api/course/courseList',
        dataType: 'json',
        success: function(resp) {
            var content = [];
            if (resp.data && resp.data.length) {
                for(var i in resp.data) {
                    content.push('<tr>');
                    content.push('<td>'+resp.data[i].code+'</td>');
                    content.push('<td>'+resp.data[i].name+'</td>');
                    content.push('<td>'+resp.data[i].description+'</td>');
                    content.push('</tr>');
                }
            }
            else {
                content.push('<tr><td colspan="4">No data</td></tr>');
            }
            
            $('#list').html(content.join(''));
        }
    });
}

$(document).ready(function(){
    getCouseList();
    // submit the form
    formSubmissionHandler($('#course-form'), getCouseList);
});