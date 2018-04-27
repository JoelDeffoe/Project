<h1>Students by course</h1>
<form action="/api/StudentsPerCourse/cherche" method="POST" class="form-inline" id="studentbycourse-form">
    <div class="row">
        <div class="form-group mx-sm-3 mb-2">
            <label for="code" class="sr-only">Course code</label>
            <input type="text" class="form-control" name="code" id="code" placeholder="Course code">
        </div>
    </div>
    <button type="submit" class="btn btn-primary mb-2">Go</button>
</form>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Code & # of students</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Date of birth</th>
        </tr>
    </thead>
    <tbody id="list"></tbody>
</table>
<script src="/assets/js/coursesPerStudent.js"></script>
