<h1>List of Courses</h1>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Code</th>
            <th>Name</th>
            <th>Description</th>
            <th># of students</th>
        </tr>
    </thead>
    <tbody id="list"></tbody>
</table>

<form action="/api/course/add" method="post" id="course-form" onsubmit="return false">
    <h1>Add Course</h1>
    <div class="form-group">
        <label for="code">Code</label>
        <input type="text" class="form-control" name="code" id="code" aria-describedby="codeHelp" placeholder="Course code">
        <small id="codeHelp" class="form-text text-muted">Course code.</small>
    </div>
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" id="name" aria-describedby="nameHelp" placeholder="Course name">
        <small id="nameHelp" class="form-text text-muted">Course name.</small>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" name="description" id="description" aria-describedby="descriptionHelp" placeholder="Course description"></textarea>
        <small id="descriptionHelp" class="form-text text-muted">Course description.</small>
    </div>
    <button type="submit" class="btn btn-primary">Add</button>
</form>

<script src="/assets/js/course.js"></script>
