
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
      session_start();
      if (isset($_SESSION['itemId'])){
        unset($_SESSION['itemId']);
      }
    ?>
    <br><br>
    <div class="container">
      <div class="row">

    <?php
      include 'connection.php';
      $sql = "SELECT * FROM product";
      $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
        ?>
        <div class="col-md-3">
          <div class="thumbnail">
          <img src="
          <?php 
          echo $row['img']
          ?>
          ">
            <div class="caption">
              <h3>
                <?php 
                echo $row['name']
                ?>
              </h3>
              <p><a href="productInfo.php?id=
              <?php 
                echo $row['id']
                ?>
              " class="btn btn-primary" role="button">Check item</a> </p>
            </div>
          </div>
          </div>
          <?php 
            }}
          ?>

      </div>
    </div>
  </body>
</html>

