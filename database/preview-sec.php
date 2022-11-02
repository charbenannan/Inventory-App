<?php
if(!empty($_GET['file'])){
$fileName = basename($_GET['file']);
$file = "../files/security/".$fileName;
var_dump($file);







if(!empty($fileName) && file_exists($file)){
header("Content-type:application/msword");
header("Content-Description: inline; filename=$file");
header("Content-Transfer-Encoding:binary");
header("Accept-Ranges:bytes");
@readfile($file);
} else{
    echo "does not Exist!";
}
}
?>

