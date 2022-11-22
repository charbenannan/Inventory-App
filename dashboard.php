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
    <link rel="icon" href="images/favicon.png" type="image/x-icon" sizes="32x32">
    <script src="https://use.fontawesome.com/0c7a3095b5.js"></script>
    </head>
<body>
    
    <div id="container">
        <?php include('partials/add-sidebar.php')?>
        <div class="dash" id="dash">
            <?php include('partials/app-topnav.php') ?>
            
            <div class="content">
                <div class="main-content">
                    <?php

                     $connection = mysqli_connect('localhost', 'root', '', 'pe_solutions');
                    //  Display Total Users
                    $queryUsers = 'SELECT COUNT(1) FROM users';
                    $resultUsers = mysqli_query($connection, $queryUsers);
                    $rowUsers = mysqli_fetch_array($resultUsers);
                    $totalUsers = $rowUsers[0];

                    // Display Total  Marpol Docs
                    $queryMarpol = "SELECT COUNT(1) FROM marpol_docs where user_id='".$_SESSION['user']['id']."'";
                    $resultMarpol = mysqli_query($connection, $queryMarpol);
                    $rowMarpol = mysqli_fetch_array($resultMarpol);
                    $totalMarpol = $rowMarpol[0];

                    //Display Total Account Documents
                    $queryAccount = "SELECT COUNT(1) FROM account_docs where user_id='".$_SESSION['user']['id']."'";
                    $resultAccount = mysqli_query($connection, $queryAccount);
                    $rowAccount = mysqli_fetch_array($resultAccount);
                    $totalAccount = $rowAccount[0];

                    //Display Total Security Escor Documents
                    $querySec = "SELECT COUNT(1) FROM security_docs where user_id='".$_SESSION['user']['id']."'";
                    $resultSec= mysqli_query($connection, $querySec);
                    $rowSec = mysqli_fetch_array($resultSec);
                    $totalSec = $rowSec[0];
                    mysqli_close($connection);
                    ?>
                
                
                
                
                <div class="card-holder">
                     <?php if($_SESSION['user']['is_admin']==1){  ?>
                    <div class="card">
                        <div class="user-card"><p><?php echo $totalUsers?> <span>Users</span> <i class="fa fa-users"></i></p></div>
                    </div>
                    <?php }?>
                    
                    <div class="card">
                        <div class="user-card"><p><?php echo $totalMarpol?> <span>Marpol Documents</span> <i class="fa fa-ship"></i></p></div>
                    </div>
                    
                    <div class="card">
                        <div class="user-card"><p><?php echo $totalSec?> <span>Security Documents</span> <i class="fa fa-shield"></i></p></div>
                    </div>
                    
                    <div class="card">
                        <div class="user-card"><p><?php echo $totalAccount?> <span>Account Documents</span> <i class="fa fa-money"></i></p></div>
                    </div>
                </div>   

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