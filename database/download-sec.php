<?php

    if(!empty($_GET['file'])){
    $fileName = basename($_GET['file']);
    $filePath = "../files/security/".$fileName;

    if(!empty($fileName) && file_exists($filePath)){
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$fileName");
        header("Content-Type: application/word");
        header("Content-Transfer-Encoding: binary");

        readfile($filePath);
        exit;
    }
    else{
        echo "Sorry, This File Does Not Exist!";
    }

}

?>
