<?php
// Connect to the database server
$dbcnx = mysqli_connect("localhost", "root", "", "hardwaresys");
if (mysqli_connect_errno($dbcnx )){
echo "Failed to connect to MySQL: " .mysqli_connect_error();
exit();}



$ud_id=$_POST['ud_id'];
$ud_fname=$_POST['ud_fname'];
$ud_sname=$_POST['ud_sname'];
$ud_add1=$_POST['ud_add1'];
$ud_add2=$_POST['ud_add2'];
$ud_add3=$_POST['ud_add3'];
$ud_num=$_POST['ud_num'];

$sql="UPDATE customer SET forename ='$ud_fname', surname ='$ud_sname', addln1 = '$ud_add1', addln2 = '$ud_add2', addln3 = '$ud_add3', number = $ud_num WHERE Customer_ID=$ud_id";

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



  
