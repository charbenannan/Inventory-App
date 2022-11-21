<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
include('connection.php');

 if(isset($_POST['submit'])){
     $fileName = $_FILES['file']['name'];
     $fileTempName = $_FILES['file']['tmp_name'];
     $path = "../files/marpol/".$fileName;
     

     $query = "INSERT INTO marpol_docs( user_id, name, created_at) VALUES ('".$_SESSION['user']['id']."','$fileName',  NOW())";
     $run = $conn->exec($query);

     if($run){
         move_uploaded_file($fileTempName, $path);
        header('Location:../marpol.php');
     }
     else{
         echo "error".mysqli_error($conn);
     }
 }


?>