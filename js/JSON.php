    <?php
    $connection = mysqli_connect('localhost', 'root', '', 'pe_solutions');
    $sql = "SELECT * FROM marpol_docs";

    $result = mysqli_query($connection, $sql);

    $json_array = array();

    while($row = mysqli_fetch_assoc($result)){
        $json_array[]= $row;
    
    }
    echo json_encode($json_array);
   
    
    ?>
