<?php
include('connection.php');


 if(isset($_POST['submit'])){
     $fileName = $_FILES['file']['name'];
     $fileTempName = $_FILES['file']['tmp_name'];
     $path = "../files/account/".$fileName;
     

     $query = "INSERT INTO account_docs(name) VALUES ('$fileName')";
     $run = $conn->exec($query);

     if($run){
         move_uploaded_file($fileTempName, $path);
        header('Location:../account.php');
     }
     else{
         echo "error".mysqli_error($conn);
     }
 }


?>