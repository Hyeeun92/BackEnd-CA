
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
      include 'connection.php';
    ?>
    <br><br>
    <div class="container">
    <table class="table">
    <thead>
        <tr>
            <th scope="col">Product name</th>
            <th scope="col">Product size</th>
            <th scope="col">Amount</th>
            <th scope="col">Price</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $stmt = $conn->prepare("SELECT * FROM purchase WHERE user_id = ?");
    $stmt->bind_param("i",$_SESSION['tableId']);
    $stmt->execute();
    $response = $stmt->get_result();

    if ($response->num_rows > 0) {
        while($row = $response->fetch_assoc()){
            $product_id = $row['product_id'];
            $sql = $conn->prepare("SELECT name FROM product WHERE id = ?");
            $sql->bind_param("i",$product_id);
            $sql->execute();
            $result = $sql->get_result();
            $name = $result->fetch_assoc();
            echo "<tr>";
            echo "<td >".$name['name']."</td>";
            echo "<td>".$row['food_size']."</td>";
            echo "<td>".$row['amount']."</td>";
            echo "<td>".$row['price']."</td></tr>";
        }   
    }
    
    echo "</tbody>
    </table>
    <form action='checkOut.php?id=".$_SESSION['tableId']."' method='post'>";
    ?>
    <input type='submit'  name='submit' class='btn btn-primary' value='Check out'></button>
    </form>
    </div>
  </body>
</html>

