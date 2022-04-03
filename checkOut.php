<?php

require 'connection.php';

basename($_SERVER['PHP_SELF']);
$userId = $_GET['id'];

$sql = $conn->prepare("SELECT * FROM purchase WHERE user_id = ?");
$sql->bind_param("i",$userId);
$sql->execute();
$response = $sql->get_result();
if ($response->num_rows > 0) {
while($row = $response->fetch_assoc()){
    $productId = $row['product_id'];
    $foodSize = $row['food_size'];
    $amount = $row['amount'];
    $id = $row['id'];

    $product = $conn->prepare("SELECT amount FROM food_size WHERE product_id = ? and size = ?");
    $product->bind_param("is",$productId, $foodSize);
    $product->execute();
    $result = $product->get_result();
    $food = $result->fetch_assoc();
    $hasAmount = $food['amount'];
    $newAmount = $hasAmount - $amount;
    
    $update = "UPDATE food_size SET amount = ? WHERE product_id = ? and size = ?";
    $stmt = $conn->prepare($update);
    $stmt->bind_param("iis", $newAmount, $productId, $foodSize);
     
    if ($stmt->execute() === TRUE) {
    echo "Record updated successfully";
    $delete = "DELETE FROM purchase WHERE id=?";
    $deleteStmt = $conn->prepare($delete);
    $deleteStmt->bind_param("i", $id);
    $deleteStmt->execute();
    header('Location: index.php');
    } else {
    echo "here";
    }


}
}
?>