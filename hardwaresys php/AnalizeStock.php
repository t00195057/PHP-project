<?php
$sid = $_POST['sid'];

$dbcnx = mysqli_connect("localhost", "root", "", "hardwaresys");
if ($sid == '')
{
echo("You did not complete the insert form correctly <br>");
exit();
} 
else
{

if (mysqli_connect_errno($dbcnx ))
{
   echo "Failed to connect to MySQL: " .mysqli_connect_error();
   exit();
}
else {
$sql = "SELECT * from stock_file
        WHERE Stock_Id = $sid";

$res = mysqli_query($dbcnx, $sql);
if ( !$res ) 
{
   echo('Query failed ' . $sql . ' Error:' . mysqli_error());
   exit();
}
else
{
   if(mysqli_num_rows($res)< 1){
   //there are no items of stock
      echo "<p><em> No Stock</em></p>";
      exit();  }
   else {      
      
         while ( $row = mysqli_fetch_array($res) ) {

      echo("<table border ='1' style='border-collapse'><tr><th>Stock ID</th><th>Stock Name</th><th>Qty</th><th>Cost Price</th><th>SalePrice</th><th>Status</th></tr><tr><td>".
          $row['Stock_ID']."</td><td>". stripslashes($row['Stock_Name'])."</td><td>". 
          $row['Qty']."</td><td>". $row['Cost_Price']."</td><td>". $row['Sale_Price'] ."</td><td>". 
          $row['Status']."</td></tr></table>"."</p>");
      }
} 
//free results
mysqli_free_result($res);
mysqli_close($dbcnx);
 }}  }

?>