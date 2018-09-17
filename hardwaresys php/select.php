<?php
$dbcnx = mysqli_connect("localhost", "root", "", "videos");
if (mysqli_connect_errno($dbcnx ))
{
   echo "Failed to connect to MySQL: " .mysqli_connect_error();
   exit();
}
else {
$sql = "SELECT * from customer";
$res = mysqli_query($dbcnx, $sql);
if ( !$res ) 
{
   echo('Query failed ' . $sql . ' Error:' . mysqli_error());
   exit();
}
else
{
   if(mysqli_num_rows($res)< 1){
   //there are no customer
      echo "<p><em> No customers</em></p>";
      exit();  }
   else {
      while ( $row = mysqli_fetch_array($res) ) {
      echo("<p>". $row['custid']. stripslashes($row['name']). "</p>");
      }
}} 
//free results
mysqli_free_result($res);
mysqli_close($dbcnx);
 }

?>