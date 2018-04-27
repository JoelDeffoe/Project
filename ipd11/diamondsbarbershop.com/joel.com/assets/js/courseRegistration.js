function getStudentList()
{
    // pull the list
    $.ajax({
        url: '/api/student/studentList',
        dataType: 'json',
        success: function(resp) {
            var content = [];
            content.push('<select class="form-control" name="studentid" id="studentid" aria-describedby="studentidHelp">');
            content.push('<option value="">Select student</option>');
            if (resp.data && resp.data.length) {
                for(var i in resp.data) {
                    content.push('<option value="'+resp.data[i].id+'">'+
                            resp.data[i].first_name+ ' ' +
                            resp.data[i].last_name+
                            '</option>');
                }
            }
            content.push('</select>');
            
            $('#studentlist').html(content.join(''));
        }
    });
}

function getCoursList()
{
    // pull the list
    $.ajax({
        url: '/api/course/courseList',
        dataType: 'json',
        success: function(resp) {
            var content = [];
            content.push('<select class="form-control" name="courseid" id="courseid" aria-describedby="courseidHelp">');
            content.push('<option value="">Select cours</option>');
            if (resp.data && resp.data.length) {
                for(var i in resp.data) {
                    content.push('<option value="'+resp.data[i].id+'">'+
                            resp.data[i].code+ ' ' +
                            resp.data[i].name+
                            '</option>');
                }
            }
            content.push('</select>');
            
            $('#courslist').html(content.join(''));
        }
    });
}

$(document).ready(function(){
    
    getStudentList();
    getCoursList();
    
    // submit the form
    formSubmissionHandler($('#course-reg-form'));
    
    
});