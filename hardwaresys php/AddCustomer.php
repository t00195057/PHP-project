<?php
$cfname = $_POST['cfname'];
$csname = $_POST['csname'];
$caddln1 = $_POST['caddln1'];
$caddln2 = $_POST['caddln2'];
$caddln3 = $_POST['caddln3'];
$cnumber = $_POST['cnumber'];
if ($cfname == '' or $csname == '' or $caddln1 == '' or $caddln2 == '' or $caddln3 == '' or $cnumber=='')
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

$cfname = mysqli_real_escape_string($dbcnx, $cfname);
$csname = mysqli_real_escape_string($dbcnx, $csname); 
$caddln1 = mysqli_real_escape_string($dbcnx, $caddln1);
$caddln2 = mysqli_real_escape_string($dbcnx, $caddln2);
$caddln3 = mysqli_real_escape_string($dbcnx, $caddln3);
$sql = "INSERT INTO customer(forename, surname, addln1, addln2, addln3, number) VALUES('$cfname', '$csname', '$caddln1', '$caddln2', '$caddln3', $cnumber)";
$res = mysqli_query($dbcnx, $sql);
if ($res == 0) 
      {
        echo("<p>Error registering: " . mysqli_error().
         "</p>");
      }
else
      {
         echo("<a href='AddCustomer.html'> Click here to enter another Customer </a>");
      }
}   mysqli_close($dbcnx); }	?>
