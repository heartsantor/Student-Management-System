<html>
<head>
    <?php include "bootstrap/bootstrap.html"; ?>
    </head>
    <body>
    <div class="container">
        <div class="alert alert-danger">You are not allowed to visit this module. <a href='index.php'>Try Again.</a></div>
        <?php
        session_start();
        session_unset();
        session_destroy();
        ?>
        </div>
    </body>


</html>