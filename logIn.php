<?php
    require 'connection.php';
    session_start();
    
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="img/lifestyleStore.png" />
        <title>Pet Store</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- latest compiled and minified CSS -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <!-- jquery library -->
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
        <!-- Latest compiled and minified javascript -->
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <!-- External CSS -->
        <link rel="stylesheet" href="css/style.css" type="text/css">
    </head>
    <body>
        <div>
            <?php
                require 'nav.php';
            ?>
            <br><br>
             <div class="container">
                <div class="row">
                    <div class="col-xs-4 col-xs-offset-4">
                        <h1><b>LOGIN</b></h1>
                        <form method="post" action="logInSubmit.php" autocomplete="off">
                            <div class="form-group">
                                <input type="text" class="form-control" name="id" id="id" 
                                placeholder="Id" required="true" value="<?= isset($id)? $id: NULL ?>">
                                <span class="text-danger"><?= isset($error['id']) ? $error['id'] : '' ?> </span>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" id="password" 
                                placeholder="Password" required="true">
                                <span class="text-danger"><?= isset($error['password']) ? $error['password'] : '' ?> </span>
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Sign Up">
                            </div>
                        </form>
                        <div class="form-group">Not a member yet?<a href="signIn.php"> Register</a></div>
                    </div>
                </div>
            </div>
        </div>  
    </body>
</html>


