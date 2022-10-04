<?php
    session_start();
    if(!isset($_SESSION['user'])) header('location: login.php');
    $_SESSION['table'] = 'users';
    $user = ($_SESSION['user']);
    $users = include('database/show-users.php');
    
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
        <?php include('partials/add-sidebar.php') ?>
        <div class="dash" id="dash">
        <?php include('partials/app-topnav.php') ?>
            <div class="content">          

                <div class="main-content">

                <div class="row">
        <div class="col-md-4">
            <div class="card mb-5">
                <div class="card-body">
                    <h3>Log-in as another user</h3>
					<form class="form" method="POST" action="/admin/login-as/">
						<div class="input-group">
							<input class="form-control" type="email" name="user_email" placeholder="Registered E-mail" autocomplete="0">
							<div class="input-group-btn">
								<input class="btn btn-primary" type="submit" value="Log-in">
							</div>
						</div>
					</form>
                </div>
            </div>
        </div>
    </div>




                <div class="row">
                    <div class="column column-5">
                        <h1 class="section-header"><i class="fa fa-users"></i> USERS</h1>
                        
                    </div>
                    
                </div>
                    <button class="add-btn" id="addBtn"> <i class="fa fa-plus" ></i> Create Users</button>

                   <div id="userAddFormContainer" class="userForm">
                   <form action="database/add.php" method="POST" class="appForm">
                    <img src="images/close.jpg" alt="close" class="close">
                        <div class="appFormInputContainer">
                            <label for="first_name">First Name:</label>
                            <input type="text" id="first_name" name="first_name" class="appFormInput" />
                        </div>
                        <div class="appFormInputContainer">
                            <label for="last_name">Last Name:</label>
                            <input type="text" id="last_name" name="last_name" class="appFormInput" />
                        </div>
                        <div class="appFormInputContainer">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" class="appFormInput" />
                        </div>
                        <div class="appFormInputContainer">
                            <label for="password">Password:</label>
                            <input type="password" id="password" name="password" class="appFormInput" />
                        </div>
                       <button class="appBtn" type="submit"><i class="fa fa-plus"></i> Add User</button>
                    </form>
                    <?php if(isset($_SESSION['response'])) { 
                            $response_message =$_SESSION['response']['message'];
                            $response_status =$_SESSION['response']['success'];
                        ?>
                                <div class="responseMessage">
                                    <p class=" responseMessage<?= $response_status ? 'responseMessage_success' : 'responseMessage_error'?>">
                                    <?=$response_message?>
                                </p>
                                </div>
                    <?php unset($_SESSION['response']); } ?>
                   </div>
                   <div class="column column-7">
                            <h1 class="section-header"><i class="fa fa-list"></i> List of Users</h1>
                        <div class="section-content">
                        <div class = "users">    
                        <table>
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Actions</th>
                                </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($users as $index => $user) { ?>
                        
                        <tr>
                            <td><?=$index + 1?></td>
                            <td><?=$user['first_name']?></td>
                            <td><?=$user['last_name']?></td>
                            <td><?=$user['email']?></td>
                            <td><?= date('d M,Y @12:i:s A', strtotime($user['created_at']))?></td>
                            <td><?=date('d M,Y @12:i:s A', strtotime($user['updated_at']))?></td>
                            <td>
                                <p><a href="" ><i class="fa fa-pencil"></i> Edit</a></p>
                                <p> <a href="" class="deleteUser" data-userid="<?=$user['id']?>" data-fname="<?=$user['first_name']?>" data-lname="<?=$user['last_name']?>"><i class="fa fa-trash"></i> Delete</a></p>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                            </table>
                    </div>
                        </div>
                        
                        </div>
                </div>

                
        </div>
    
    </div>
</div>
                    </div>
 
<script type="text/javascript" src="js/script.js"></script>
<script src="js/jquery/jquery-3.6.1.js"></script>
<script>
    document.getElementById("addBtn").addEventListener('click', function(){
    document.querySelector(".userForm").style.display = "block";
   });

   document.querySelector(".close").addEventListener('click', function(){
    document.querySelector(".userForm").style.display = "none"
   });
    function addDel(){

        this.initialize = function(){
            this.registerEvents();
        },

        this.registerEvents = function (){
            document.addEventListener('click', function (e){
                targetElement = e.target;
                classList = targetElement.classList;
                
                classList = e.target.classList;

                if(classList.contains('deleteUser')){
                    e.preventDefault();
                    userId = targetElement.dataset.userid;
                    fname = targetElement.dataset.fname;
                    lname = targetElement.dataset.lname;
                    
                    if(window.confirm('Are you sure you want to delete '+ fname + ' '+ lname +' from the system?')){
                        $.ajax({
                            method: 'POST',
                            data: {
                                user_id: userId,
                                f_name: fname,
                                l_name: lname
                            },
                            url: 'database/delete-user.php',
                            dataType: 'json',
                            success: function(data){
                                if(data.success){
                                    if(window.confirm(data.message)){
                                        location.reload();
                                    }
                                }else window.alert(data.message);
                                
                            }
                        })
                    }else{
                        console.log('Sorry could not delete');
                    }                     
                }
                
                
            });
        }
    }
    var newFun = new addDel;
    newFun.initialize();
</script>
</body>
</html>