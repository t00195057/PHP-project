<?php
$sname = $_POST['sname'];
$sqty = $_POST['sqty'];
$scost = $_POST['scost'];
$ssale = $_POST['ssale'];
if ($sname == ''  or $sqty == '' or $scost == '' or $ssale == '' )
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

$sname = mysqli_real_escape_string($dbcnx, $sname);
$sql = "INSERT INTO stock_file(stock_name,qty, cost_price, sale_price) VALUES('$sname', $sqty, $scost, $ssale)";
$res = mysqli_query($dbcnx, $sql);
if ($res == 0) 
      {
        echo("<p>Error registering: " . mysqli_error()            
                  . "</p>");
      }
else
      {
         echo("<a href='AddStock.html'> Click here to enter another Stock </a>");
      }
}   mysqli_close($dbcnx); }	?>
