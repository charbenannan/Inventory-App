<?php
include('connection.php');

$statement = $conn->prepare("SELECT * FROM users ORDER BY created_at DESC");
$statement->execute();
$statement->setFetchMode(PDO::FETCH_ASSOC);

return $statement->fetchAll();

?>