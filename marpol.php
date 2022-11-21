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
    <script src="js/search.js" defer></script>
    </head>
<body>
    <div id="container">
        <?php include('partials/add-sidebar.php')?>
        <div class="dash" id="dash">
            <?php include('partials/app-topnav.php') ?>
            
         <div class="content">



            <form action="database/upload.php" method="POST" enctype="multipart/form-data">
              
            <input type="file" name="file" accept=".pdf" value="Upload">
            <button type="submit" class="btn-upload" name="submit"><i class="fa fa-upload"> Upload</i></button>
        </form>
               
        <div class="main-content">
<div class="column column-8">
                <form action="database/upload.php" method="POST" enctype="multipart/form-data">
                
                    
              
                <table class="this-table">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        
                     </tr>
                    </thead>
                    <tbody>
                    <?php
                        
                            $connection = mysqli_connect('localhost', 'root', '', 'pe_solutions');
                            $queryThis = "SELECT * FROM marpol_docs WHERE user_id='".$_SESSION['user']['id']."'";
                            $runThis = mysqli_query($connection,$queryThis);    
                            $i = 1;               
                                
                            while($rows = mysqli_fetch_assoc($runThis)){
                                
                               
                                     ?>

                    <tr>
                        
                        <td><?=$i++;?></td>
                        <td><?=$rows['name']?></td>
                        <td>
                              
                            <a href="database/download.php?file=<?php echo $rows ['name']?>">Download <i class="fa fa-download"></i></a>
                            
                        </td>
                        <td>
                            <a href="database/preview.php?file=<?php echo $rows ['name']?>" target="_blank"><i class="fa fa-eye"></i> Preview</a>
                        </td>
                        <td>
                            <a href="" class="deleteDoc" data-id="<?=$rows['id']?>" data-name="<?=$rows['name']?>">Delete <i class="fa fa-trash"></i></a>
                            
                        </td>
                        <?php
                            }
                            ?>
                    </tr>
                    </tbody>
                </table>
</form>

                        </div>
        </div>
    </div>
</div>
 
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/active.js"></script>
<script src="js/jquery/jquery-3.6.1.js"></script>
<script>
function addDel(){

this.initialize = function(){
    this.registerEvents();
},

this.registerEvents = function (){
    document.addEventListener('click', function (e){
        targetElement = e.target;
        classList = targetElement.classList;
        
        classList = e.target.classList;

        if(classList.contains('deleteDoc')){
            e.preventDefault();
            id = targetElement.dataset.id;
            name = targetElement.dataset.name;
            
            
            if(window.confirm('Are you sure you want to delete '+ name +' from the system?')){
                $.ajax({
                    method: 'GET',
                    data: {
                        id: id,
                        name: name
                    },
                    url: 'database/delete-marpol.php',
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