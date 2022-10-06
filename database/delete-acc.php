<?php
$data = $_GET;
$id = (int) $data['id'];
$name =  $data['name'];



try{
    $cmd = "DELETE FROM account_docs WHERE id={$id}";
    
include('connection.php');
$conn->exec($cmd);

echo json_encode([
    'success' => true,
    'messages' => $name. ' '. 'successfully deleted' 
]);


}catch(PDOException $e){
     echo json_encode ([
        'success' => false,
        'message' => 'Error processing your request!'
    ]) ;
}

?>