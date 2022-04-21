
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
        <link rel="stylesheet" href="css/index.css" type="text/css">
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
            $image = $row['img'];
            $id = $row['id'];
            
            echo "
            <div class='col-md-3'>
            <div class='thumbnail' style=\"width:250px; height:200px;margin-left: auto;
            margin-right: auto;\">
              <img src=images/".$image." style=\"

              height: 100%; width: 100%;\">
            </div>
            <div class='caption' style=\"text-align:center\">
              <h4>".$row['name']."</h4>
              <br>
              <form action='indexSubmit.php?id=".$id."' method='post'>
              <select name='foodSize'>
              <ul>
              <option value='' disabled selected>Choose option</option>
              ";
              
            $stmt = $conn->prepare("SELECT * FROM food_size WHERE product_id = ?");
            $stmt->bind_param("i",$id);
            $stmt->execute();
            $response = $stmt->get_result();
            if ($response->num_rows > 0) {
            while($food = $response->fetch_assoc()){
              echo "<option value=".$food['size'].">".$food['size']. " - €".$food['price']."
              </option>";
            }
          }
          session_start();
          $userType = $_SESSION['type'];
             echo " 
            </select>";
            if ($userType == 'normal'){
               echo "
               <br><br>
               <input type='submit' name='submit' class='btn btn-primary' value='To Cart'></button>";
            }
            echo "
           </form>
           </div>
          </div>";
          
            }}
          ?>

      </div>
    </div>
  </body>
</html>

