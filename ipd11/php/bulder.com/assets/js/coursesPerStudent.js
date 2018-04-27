function getCousePerStudentList(resp)
{
    var content = [];
    
    // pull the list
    if (resp.data && resp.data.length) {
        for (var i in resp.data) {
            content.push('<tr>');
            content.push('<td>' + resp.data[i].code + " " + resp.data[i].id + '</td>');
            content.push('<td>' + resp.data[i].first_name + '</td>');
            content.push('<td>' + resp.data[i].last_name + '</td>');
            content.push('<td>' + resp.data[i].dob + '</td>');
            content.push('</tr>');
        }
    } else {
        content.push('<tr><td colspan="5">No data</td></tr>');
    }

    $('#list').html(content.join(''));
}
$(document).ready(function(){
    // submit the form
    formSubmissionHandler($('#studentbycourse-form'), getCousePerStudentList);
});