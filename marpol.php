<?php
    session_start();
    $user = ($_SESSION['user']);
    include('database/upload.php');

   

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | PE Solutions</title>
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="shortcut icon" href="images/favicon.jpeg" type="image/x-icon" sizes="32x32">
    <script src="https://use.fontawesome.com/0c7a3095b5.js"></script>
    </head>
<body>
    <div id="container">
        <?php include('partials/add-sidebar.php')?>
        <div class="dash" id="dash">
            <?php include('partials/app-topnav.php') ?>
            
         <div class="content">
            <form action="database/upload.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="file" accept=".pdf" value="Upload">
            <button type="submit" class="btn-upload" name="submit"><i class="fa fa-upload">Upload</i></button>
        </form>
               
                <div class="main-content">
                <form action="database/upload.php" method="POST" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td>
                            <?php
                            $connection = mysqli_connect('localhost', 'root', '', 'pe_solutions');
                            $queryThis = "SELECT * FROM marpol_docs";
                            $runThis = mysqli_query($connection,$queryThis);                   
                            while($rows = mysqli_fetch_assoc($runThis)){
                                     ?>

                            <a href="database/download.php?file=<?php echo $rows ['name']?>">Download <i class="fa fa-download"></i></a>
                            <?php
                            }
                            ?>
                        </td>
                    </tr>
                </table>
</form>
            </div>
        </div>
    </div>
</div>
 
<script type="text/javascript" src="js/script.js"></script>
</body>
</html>