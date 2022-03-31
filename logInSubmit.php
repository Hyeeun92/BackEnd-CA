<?php

include 'connection.php';

if(isset($_SESSION)){
    session_destroy();
}

$error = [];

$inputId = filter_input(INPUT_POST, 'id',  FILTER_SANITIZE_STRING);
$inputPassword = filter_input(INPUT_POST, 'password',  FILTER_SANITIZE_STRING);

if(empty($id) || !isset($id)) {
    $error ['id'] = 'Id is empty';
}
if(empty($password) || !isset($password)){
    $error ['password'] = 'Password is empty';
} 
    
$sql = 'SELECT * FROM user WHERE user_id = ?';

$stmt = $conn->prepare($sql);

$stmt->bind_param("s", $inputId);

$stmt->execute();
$result = $stmt->get_result(); 
$user = $result->fetch_assoc(); 

if(!empty($user)){

    if($inputPassword == $user['user_password']){
        session_start();

        $_SESSION['id'] = $user['user_id'];
        $_SESSION['type'] = $user['user_type'];

        header('Location: index.php');

    } else{
        $error['password'] = 'Wrong Password';
        require_once('LogIn.php');
    }
} else{
    $error['id'] = 'Id doesn\'t exist';
    require_once('LogIn.php');
}


?>
