<?php
include 'connection.php';
session_start();

if(empty($size) || !isset($size)) {
    $error ['size'] = 'Size is empty';
}
if(empty($price) || !isset($price)){
    $error ['price'] = 'Price is empty';
} 
if(empty($amount) || !isset($amount)){
    $error ['amount'] = 'Amount is empty';
} 

$size = $_POST['size'];
$price = $_POST['price'];
$amount = $_POST['amount'];
$product_id = $_SESSION['itemId'];

$sql = "INSERT INTO food_size (size, amount, price, product_id) VALUES ('$size', '$amount', '$price', '$product_id')";
$result = $conn->query($sql);

if ($result == 1){ 
$_SESSION['saved'] = 'Saved';
header('Location: addProductInfo.php');
}
?>

