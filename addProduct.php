<!DOCTYPE html>
<html>
    <head>
    <link rel="shortcut icon" href="img/lifestyleStore.png" />
        <title>Pet Store</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/style.css" type="text/css">

    </head>
    <body>
    <?php require 'nav.php' ?>
    
    <br><br>
             <div class="container">
                <div class="row">
                    <div class="col-xs-4 col-xs-offset-4">
                        <h1><b>ADD PRODUCT</b></h1>
                        <form method="post" action="addProductSubmit.php" autocomplete="off" enctype="multipart/form-data">

                        <div class="form-group">
                        <input type="file" class="form-control" id="file" name="file" accept="image/*"/>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="name" id="name" 
                            placeholder="Product name" required="true">
                        </div>
                       
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Save">
                        </div>
                        </form>
                    </div>
                </div>
            </div>
    </body>
</html>
