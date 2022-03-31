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
                    <h1><b>ADD PRODUCT INFORMATION</b></h1>
                    <?php 
                        if (isset($_SESSION) && isset($_SESSION['saved'])){ ?>
                            <p style="text-align: center; color:red;">Saved item</p>
                            <?php }?>

                    <form method="post" action="addProductInfoSubmit.php" autocomplete="off">
                    <div class="form-group">
                        <input type="text" class="form-control" name="size" id="size" 
                        placeholder="Product size" required="true">
                    </div>

                    <div class="form-group">
                    <input type="text" class="form-control" name="price" id="price" 
                        placeholder="Product price" required="true">
                    </div>

                    <div class="form-group">
                        <input type="number" class="form-control" name="amount" id="amount" 
                        placeholder="Number of product" required="true">
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

