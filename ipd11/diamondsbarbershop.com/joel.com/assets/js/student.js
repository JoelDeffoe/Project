function getStudentList()
{
    // pull the list
    $.ajax({
        url: '/api/student/studentList',
        dataType: 'json',
        success: function(resp) {
            var content = [];
            if (resp.data && resp.data.length) {
                for(var i in resp.data) {
                    content.push('<tr>');
                    content.push('<td>'+resp.data[i].first_name+'</td>');
                    content.push('<td>'+resp.data[i].last_name+'</td>');
                    content.push('<td>'+resp.data[i].dob+'</td>');
                    content.push('</tr>');
                }
            }
            else {
                content.push('<tr><td colspan="3">No data</td></tr>');
            }
            
            $('#list').html(content.join(''));
        }
    });
}

$(document).ready(function(){
    getStudentList();
    // submit the form
    formSubmissionHandler($('#student-form'), getStudentList);
});