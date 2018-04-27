<?php
if (Ezpz\Common\Authentication::isAuthed())
{
?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Comments</th>
            </tr>
        </thead>
        <tbody id="output"></tbody>
    </table>
    <script type="text/x-handlebars-template" id="subscribers-list-hbtmpl">
        {{#if list}}
        {{#each list}}
        <tr>
        <td>{{name}}</td>
        <td>{{email}}</td>
        <td>{{comments}}</td>
        </tr>
        {{/each}}
        {{else}}
        <tr>
        <td colspan="3"><div class="alert alert-info">No data</div></td>
        </tr>
        {{/if}}
    </script>
    <script src="/assets/js/reviewlist.js"></script>
<?php
}
else
{
    include __DIR__ . '/login.php';
}