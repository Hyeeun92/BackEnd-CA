<?php
    require 'connection.php';
    session_start();
    if(isset($_SESSION['email'])){
        header('location: products.php');
    }
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
                        <h1><b>SIGN UP</b></h1>
                        <?php 
                        if (isset($_SESSION) && isset($_SESSION['warning'])){ ?>
                            <p style="text-align: center; color:red;">Id already exists</p>
                            <?php }?>
                        <form method="post" action="signInSubmit.php">
                            <div class="form-group">
                                <input type="text" class="form-control" name="id" placeholder="Id" required="true">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Password" required="true">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="firstName" placeholder="First name" required="true">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="lastName" placeholder="Last name" required="true">
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Sign Up">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </body>
</html>

