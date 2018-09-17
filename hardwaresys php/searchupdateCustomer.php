<!DOCTYPE html>
<html lang='en'>
  <head>
      <title>Update</title>

<link rel="stylesheet" type="text/css" href="Hardwaresys.css" />
   </head>
   
   <body>
 

<?php
// Show simple format of the records so person can choose the reference name/number
// this is then passed to the next page, for all details

$dbcnx = mysqli_connect("localhost", "root", "", "hardwaresys");
if (mysqli_connect_errno($dbcnx )){
echo "Failed to connect to MySQL: " .mysqli_connect_error();
exit();}


$sql ="SELECT * FROM customer";
$res = mysqli_query($dbcnx, $sql);
if ( !$res ) {
        echo('Query failed ' . $sql . ' Error:' . mysqli_error($dbcnx));
        exit();
    }


	else
	{
  
  if(mysqli_num_rows($res)< 1){
  //there are no customer
  echo "<p><em> No Customer</em></p>";  }
  else
  {


echo "<br /><b>A Quick View</b><br /><br />";
echo "<table border=1>";
echo "<tr><td><b>Customer Id</b></td>
<td>Forename</td><td>Surname</td></tr>";

while ($row = mysqli_fetch_array($res)) {

echo ("<tr><td>");
echo $row['customer_id'];
echo("</td><td>");
echo $row['forename'];
echo("</td><td>");
echo $row['surname'];
echo("</td></tr>");

} 
echo "</table>";

}  

 //free results
  mysqli_free_result($res);
  
  //close connection
  mysqli_close($dbcnx);}
?>

<br /><br />
<form method="POST" action="updateformCustomer.php">
<div>Enter ID to update:
<input type="text" name="record" size="10" maxlength="10"><br /><br />
<input type="submit" name="go" value="Search on that Input"></div></form>



</html>

