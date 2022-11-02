<?php
session_start();
$error_message = '';

    if($_POST){
        include('database/connection.php');
        

        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $query = 'SELECT * FROM users WHERE users.email="'. $username.'" AND users.password="'.$password . '"';  
        $stmt = $conn->prepare($query);
        $stmt->execute();

        
        if($stmt->rowCount() > 0){
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $user = $stmt->fetchAll()[0];
            $_SESSION['user'] = $user;

            header('Location:dashboard.php');

        }else $error_message = 'Username or Password incorrect.';



    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | PE Solutions</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="shortcut icon" href="images/favicon.jpeg" type="image/x-icon" sizes="32x32">
</head>
<body>
    <?php if(!empty($error_message)) { ?>

    <div class="errorMessage">
        <p><strong>ERROR:</strong> <?= $error_message ?></p>
    </div>
    <?php } ?>

    <div class="login-container">
        <div class="login-header">
            <h1>PE Solutions GH</h1>
            <h3>Inventory Application</h3>
        </div>
        <div class="login-form">
            <form action="index.php" method="POST">
                <div class="login-input">
                    <label for="">Username</label>
                    <input type="email" placeholder="username" name="username" required />
                </div>

                <div class="login-input">
                    <label for="">Password</label>
                    <input type="password" placeholder="password" name="password" required />
                </div>

                <div class="login-button">
                    <button>Login</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>