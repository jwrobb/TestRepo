<?php

$showErr = false;

//Check our sooper dooper secure credentials ;-)
if($_POST['u'] && $_POST['p']) {
    if($_POST['u'] == 'admn' && $_POST['p'] == 'r@spb3rry') {
        session_start();
        $_SESSION['admin'] = true;
        header("Location: adminpage.php");
        die();
    } else {
        $showErr = true;
    }
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin login</title>
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/styles.css">

    </head>
    <body>
        <div class="container">
            
          <div class="alert alert-danger" style="display:<?= ($showErr) ? "block" : "none"; ?>;" >
            <strong>Invalid login!</strong> The credentials you entered are incorrect
          </div>

        <form class="form-signin" method="post">
          <h2 class="form-signin-heading">Please sign in</h2>
          <input type="text" class="form-control" placeholder="Username" name='u' autofocus required>
          <input type="password" class="form-control" placeholder="Password" name="p" required>
          <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        </form>

        </div> <!-- /container -->
        
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
        
    </body>
</html>   



