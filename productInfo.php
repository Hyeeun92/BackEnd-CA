<?php 

include 'connection.php';

$query = $_SERVER['QUERY_STRING'];
$string = str_replace("%20","", $query);
$idString = str_replace("id=","",$string);
$id = (int)$idString;



?>


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
    <?php
      require 'nav.php';
    ?>
    <br><br>
    <div class="container" style="margin-top: 100px;">
    <?php 
    $productSql = "SELECT * FROM product WHERE id ='".$id."'";
    $result = mysqli_query($conn,$productSql);
    $row = $result->fetch_assoc();

    $infoSql = "SELECT * FROM food_size WHERE product_id ='".$id."'";
    $infoResult = mysqli_query($conn,$infoSql);
    $infoRow = $infoResult->fetch_assoc();

    ?>
    <img src="
    <?php
    echo $row['img'];
    ?>   
    ">
    <h3>
    <?php
    echo $infoSql;
    print_r($infoRow);
    echo $infoRow['price'];
    ?>    
    
    </h3>
    <?php

    ?>    
    </div>
  </body>
</html>




