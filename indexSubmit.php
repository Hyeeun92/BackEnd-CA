<?php
require 'connection.php';
session_start();
if (isset($_POST['submit'])){
    if(!empty($_POST['foodSize'])){
      $option = $_POST['foodSize'];
      
    }
}
basename($_SERVER['PHP_SELF']);
$productId = $_GET['id'];
$userId = $_SESSION['tableId'];
$amount = 1;
$stmt = $conn->prepare("SELECT price FROM food_size WHERE product_id = ? and size = ?");
$stmt->bind_param("is",$productId, $option);
$stmt->execute();
$response = $stmt->get_result();
$price = $response->fetch_assoc();
$p = $price['price'];


$sql = "INSERT INTO purchase (user_id, product_id, food_size, amount, price) VALUES ('$userId', '$productId', '$option', '$amount','$p')";
$result = $conn->query($sql);
$conn->close();
header("Location: index.php");

?>