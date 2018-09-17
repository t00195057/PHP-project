<?php
// Connect to the database server
$dbcnx = mysqli_connect("localhost", "root", "", "hardwaresys");
if (mysqli_connect_errno($dbcnx )){
echo "Failed to connect to MySQL: " .mysqli_connect_error();
exit();}



$ud_id=$_POST['ud_id'];
$ud_name=$_POST['ud_name'];
$ud_qty=$_POST['ud_qty'];
$ud_cost=$_POST['ud_cost'];
$ud_sale=$_POST['ud_sale'];

$sql="UPDATE stock_file SET Stock_Name ='$ud_name', Qty = $ud_qty, Cost_Price = $ud_cost, Sale_Price = $ud_sale  WHERE Stock_ID=$ud_id";

$res = mysqli_query($dbcnx, $sql);
if ( !$res ) {
        echo('Query failed ' . $sql . ' Error:' . mysqli_error());
        exit();
    }

else
	{
  echo $res;
  if(mysqli_affected_rows($dbcnx)< 1){
  
  echo "<p><em> No updates</em></p>";  }
  else
  {
echo "Record Updated";}
  mysqli_close($dbcnx);

}
?>



  
