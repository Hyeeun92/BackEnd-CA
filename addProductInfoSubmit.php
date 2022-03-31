<?php

$size = $_POST['size'];
$price = $_POST['price'];
$amount = $_POST['amount'];
$product_id = $_SESSION['itemId'];

if(empty($size) || !isset($size)) {
    $error ['size'] = 'Size is empty';
}
if(empty($price) || !isset($price)){
    $error ['price'] = 'Price is empty';
} 
if(empty($amount) || !isset($amount)){
    $error ['amount'] = 'Amount is empty';
} 

$sql = "INSERT INTO food_size (size, amount, price, product_id) VALUES (?,?,?,?)";

$stmt = $conn->prepare($prepareSql);
$role = 'normal';
$stmt->bind_param("sisi", $size, $amount, $price, $product_id);
$stmt->execute();

$conn->close();




?>