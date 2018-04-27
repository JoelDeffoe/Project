<h1>Course Registration</h1>
<form action="/api/CourseRegistration/add" method="post" id="course-reg-form" onsubmit="return false">
    <div class="form-group">
        <label for="studentid">Student</label>
        <div id="studentlist"></div>
        <small id="studentidHelp" class="form-text text-muted">List of students.</small>
    </div>
    <div class="form-group">
        <label for="courseid">Course</label>
        <div id="courslist"></div>
        <small id="courseidHelp" class="form-text text-muted">List of courses.</small>
    </div>
    <button type="submit" class="btn btn-primary">Register</button>
</form>

<script src="/assets/js/courseRegistration.js"></script>
