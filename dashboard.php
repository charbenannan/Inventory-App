<?php
    session_start();
    $user = ($_SESSION['user']);
    

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
                <div class="main-content">
            </div>
        </div>
    </div>
</div>
 
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/active.js"></script>
<script type="text/javascript">
    function checkIsAdmin(){
        var x = document.getElementById("hide");
       
       const isAdmin = fetch('js/json.php') .then(res => res.json());
       if(isAdmin('is_admin' !=1)){
        x.classList.add("hide");
       }
    }
</script>
</body>
</html>