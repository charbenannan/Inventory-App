<?php
session_start();
$table_name = $_SESSION['table'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$password = $_POST['password'];
$user_type = $_POST['is_admin'];
$encrypted = password_hash($password, PASSWORD_DEFAULT);


try{
    $cmd = "INSERT INTO 
                    $table_name(first_name, last_name, email, password, created_at, updated_at, is_admin)
                    VALUES
                    ('".$first_name."', '".$last_name."', '".$email."','".$encrypted."', NOW(), NOW(),'".$user_type."')";
    
include('connection.php');
$conn->exec($cmd);
$response =[
    'success' => true,
    'message' => $first_name . ' '. $last_name . ' has been successfully added.'
];



}catch(PDOException $e){
    $response = [
        'success' => false,
        'message' => $e->getMessage()
    ];
}

$_SESSION['response'] = $response;
 header('location: ../users-add.php');


?>