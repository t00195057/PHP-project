<?php
$sstockid = $_POST['sstockid'];
$scustomerid = $_POST['scustomerid'];
$sqtys = $_POST['sqtys'];

if ($sstockid == ''  or $scustomerid == '' or $sqtys == '' )
{
echo("You did not complete the insert form correctly <br>");
exit();
} 
 else
{
$dbcnx = mysqli_connect("localhost", "root", "", "hardwaresys");
// Check connection
if (mysqli_connect_errno($dbcnx ))
{
echo "Failed to connect to MySQL: " .mysqli_connect_error();
exit();
}
if ($_POST['submitdetails'] == "SUBMIT") {


$sql = "INSERT INTO stock_file(stock_id, customer_id, qty_sold) VALUES($sstockid, $scustomerid, $sqtys)";
$res = mysqli_query($dbcnx, $sql);
if ($res == 0) 
      {
        echo("<p>Error registering: " . mysqli_error()            
                  . "</p>");
      }
else
      {
         echo("<a href='add a hardwaresys AddSale.html'> Click here to enter another Sale </a>");
      }
}   mysqli_close($dbcnx); }	?>