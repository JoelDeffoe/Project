<div class="loginform">
    <h1>Sign-in</h1>
    <div id="status-message"></div>
    <form action="/api/authentication/login" method="post" id="login-form">
        <div class="form-group">
            <label for="username">User name</label>
            <input type="text" name="username" id="username" class="form-control" />
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" />
        </div>
        <button class="btn btn-primary" type="submit">Login</button>
    </form>
</div>
<script src="/assets/js/login.js"></script>