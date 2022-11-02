<div class="sidebar" id="sidebar">
            <img src="images/plogo-removebg-preview.jpg" alt="" id="userImage">
            <div class="user">
                <img src="images/avatar.png" alt="user image" />
                <span id="username"><?=$user['first_name']. ' '.$user['last_name']?></span>
            </div>
            
            <!-- sidebar -->

         
<div class="menu" id="myMenu">
<ul class="menu-list" id="sideMenu">

    <div class="btns menuActive">
    <li class="" >
        <a href="./dashboard.php" ><i class="fa fa-dashboard" ></i> <span class="menuText">Dashboard</span></a>
   </li>
</div>

    <div class="btns ">
         <li class="">
        <a href="./marpol.php" ><i class="fa fa-ship" ></i> <span class="menuText ">Marpol Documents</span></a>
    </li>
</div>

<div class="btns ">
    <li class="" style="font-size:14px;">
        <a href="./account.php" ><i class="fa fa-money" ></i> <span class="menuText "> Account Documents</span></a>
    </li>
    </div>

    <div class="btns ">
    <li class="">
        <a href="./security.php" ><i class="fa fa-shield" ></i> <span class="menuText">Security Escort</span></a>
    </li>
    </div>
    <?php if($_SESSION['user']['is_admin']==1){  ?>
  <div class="btns ">
    <li class= "">
         <a href="./users-add.php" ><i class="fa fa-user" ></i> <span class="menuText" >Users</span></a>
  </li>
  </div>
  <?php }?>
    <!-- include users for admin -->
  
   

   
</ul>
</div>
</div> 
