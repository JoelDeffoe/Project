<?php include __DIR__ . '/defines.php'; ?>
<html>
    <head>
        <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" href="/assets/css/style.css" />
        <title>IPD11 - PHP - Project</title>
    </head>
    <body>
        <script src="/assets/bootstrap/js/jquery-v3.2.1.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
        <script src="/assets/bootstrap/js/popper.min.js"></script>
        <script src="/assets/bootstrap/js/bootstrap-v4.0.0-beta.3.min.js"></script>
        <script src="/assets/js/script.js"></script>
        <div class="container">
            <?php include INCLUDES_DIR . '/header.php'; ?>
            <main role="main">
                <?php include Lib\Request::contentFile(); ?>
            </main>
            <?php include INCLUDES_DIR . '/footer.php';?>
        </div>
    </body>
</html>
