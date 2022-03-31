<?php 

include 'connection.php';

if(isset($_SESSION)){
    session_destroy();
}

$inputId = $_POST['id'];
$inputPassword = $_POST['password'];
$inputFName = $_POST['firstName'];
$inputLName = $_POST['lastName'];

$sql = 'SELECT * FROM user WHERE user_id = ?';

$stmt = $conn->prepare($sql);

$stmt->bind_param("s", $inputId);

$stmt->execute();
$result = $stmt->get_result(); 

if ($result -> num_rows > 0){
    $user = $result->fetch_assoc(); 
    session_start();
    $_SESSION['warning'] = 'Id already Exists';
    header('Location: signIn.php');
} else {
    session_destroy();
    $prepareSql = "INSERT INTO user (user_id, user_password, user_first_name, user_last_name, user_type) VALUES (?,?,?,?,?)";
    $stmt = $conn->prepare($prepareSql);
    $role = 'normal';
    $stmt->bind_param("sssss", $inputId, $inputPassword, $inputFName, $inputLName, $role);
    $stmt->execute();
    session_start();
    $_SESSION['id'] = $inputId;
    $_SESSION['type'] = $role;
    $conn->close();
    header("Location: index.php");
}
?>