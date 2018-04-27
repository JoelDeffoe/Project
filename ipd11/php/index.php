<?php
include __DIR__. '/defines.php';
include __DIR__ . '/vendor/autoload.php';
include __DIR__. '/sessionInit.php';
?>
<html>
    <head>
        <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" href="/assets/css/style.css" />
        <title>Contact Us</title>
    </head>
    <body>
        <?php echo '<script> var csrftokenname= "'.CSRF_TOKEN_NAME.'", '.CSRF_TOKEN_NAME.' = "'. getCSRFToken().'";</script>';?>
        <script src="/assets/bootstrap/js/jquery-v3.2.1.min.js"></script>
        <script src="/assets/bootstrap/js/popper.min.js"></script>
        <script src="/assets/bootstrap/js/bootstrap-v4.0.0-beta.3.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
        <script src="/assets/js/handlebars.js"></script>
        <script src="/assets/js/script.js"></script>
        <?php
        $uri = $_SERVER['REQUEST_URI'];
        if (!$uri || $uri === '/index.php' || $uri === '/') {
            $page = 'home';
        }
        else {
            $page = str_replace('.php', '', trim($_SERVER['REQUEST_URI'], '/'));
        }
        $file = __DIR__ . '/includes/content/' . $page . '.php';
        
        if (file_exists($file)) {
            include $file;
        }
        else {
            echo 'Error page not found.';
        }
        ?>
    </body>
</html>