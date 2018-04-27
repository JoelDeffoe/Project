<h1>List of Students</h1>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>First name</th>
            <th>Last name</th>
            <th>Date of birth</th>
        </tr>
    </thead>
    <tbody id="list"></tbody>
</table>

<form action="/api/student/add" method="post" id="student-form" onsubmit="return false" >
    <h1>Add Student</h1>
    <div class="form-group">
        <label for="first_name">First name</label>
        <input type="text" class="form-control" name="first_name" id="first_name" aria-describedby="first_nameHelp" placeholder="First name" data-validation="required">
        <small id="first_nameHelp" class="form-text text-muted">First name.</small>
    </div>
    <div class="form-group">
        <label for="last_name">Last name</label>
        <input type="text" class="form-control" name="last_name" id="last_name" aria-describedby="last_nameHelp" placeholder="Last name" data-validation="required">
        <small id="last_nameHelp" class="form-text text-muted">Last name.</small>
    </div>
    <div class="form-group">
        <label for="dob">DoB</label>
        <input type="text" class="form-control" name="dob" id="dob" aria-describedby="dobHelp" placeholder="1991-12-30" data-validation="date" data-validation-format="yyyy-mm-dd">
        <small id="dobHelp" class="form-text text-muted">Date of birth.</small>
        
    </div>
    <button type="submit" class="btn btn-primary" >Add</button>
</form>

<script src="/assets/js/student.js"></script>
