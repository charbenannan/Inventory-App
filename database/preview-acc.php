<center>
 
    <?php
    
if(!empty($_GET['file'])){
    require "../vendor/autoload.php";
$fileName = basename($_GET['file']);
$file = "../files/account/".$fileName;
//var_dump($file);

echo "<h2>$fileName</h2>";
$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
$spreadsheet = $reader->load($file);
$worksheet =$spreadsheet->getActiveSheet();

echo "<table border = '1'>";

foreach($worksheet->getRowIterator() as $row){
    $cellIterator = $row->getCellIterator();
    $cellIterator-> setIterateOnlyExistingCells(true);
   
    echo "<tr>";
    foreach($cellIterator as $cell){
        echo "<td>";
        echo $cell->getValue();
        echo "</td>";
    }
    echo "</tr>";
}
echo "</table>";
}else{
    
$fileName = basename($_GET['file']);
$file = "../files/account/".$fileName;
$file = "../files/account/".$fileName;
var_dump($file);
echo "Sorry This File Does Not Exist In The Directory!";


}
 ?>

 </center>
