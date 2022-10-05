<?php
if(!empty($_GET['file'])){
$fileName = basename($_GET['file']);
$file = "../files/marpol/".$fileName;
var_dump($file);

if(!empty($fileName) && file_exists($file)){
header("Content-type:application/pdf");
header("Content-Description: inline; filename=$file");
header("Content-Transfer-Encoding:binary");
header("Accept-Ranges:bytes");
@readfile($file);
} else{
    echo "Could Not Preview File. The File Does Not Exist!";
}
}
?>