<?php
include 'connection.php';


if(empty($name) || !isset($name)) {
    $error ['name'] = 'Name is empty';
}
if(empty($price) || !isset($price)){
    $error ['price'] = 'Price is empty';
} 

$name = $_POST['name'];
$folder = "images/";
$filename = basename($_FILES['file']['name']);
$targetFilePath = $folder . $filename;

$img_name = $_FILES['file']['name'];
$img_size = $_FILES['file']['size'];
$tmp_name = $_FILES['file']['tmp_name'];
$error = $_FILES['file']['error'];

$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
$img_ex_lc = strtolower($img_ex);
$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
$img_upload_path = 'images/'.$new_img_name;
move_uploaded_file($tmp_name, $img_upload_path);
$sql = "INSERT INTO product (name, img) VALUES ('$name','$new_img_name')";
$result = $conn->query($sql);

$findSql = 'SELECT id FROM product WHERE img = ?';
$stmt = $conn->prepare($findSql);
$stmt->bind_param("s", $new_img_name);
$stmt->execute();
$result = $stmt->get_result();
$res = mysqli_fetch_array($result);
$id = $res['id'];
echo $id;

session_start();
$_SESSION['itemId'] = $id;
header("Location: addProductInfo.php");



?>