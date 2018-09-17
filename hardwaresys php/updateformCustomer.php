<!DOCTYPE html>
<html lang='en'>
  <head>
      <title>Internet and WWW How to Program - Welcome</title>

<link rel="stylesheet" type="text/css" href="styles.css" />
   </head>
<?php
// Connect to the database server
$dbcnx = mysqli_connect("localhost", "root", "", "hardwaresys");
if (mysqli_connect_errno($dbcnx )){
echo "Failed to connect to MySQL: " .mysqli_connect_error();
exit();}


$id=(int)$_POST['record'];

$sql="SELECT * FROM customer WHERE Customer_ID=$id";

$res = mysqli_query($dbcnx, $sql);
if ( !$res ) {
        echo('Query failed ' . $sql . ' Error:' . mysqli_error($dbcnx));
        exit();
    }


else 
{
$row = mysqli_fetch_array($res); 
$forename=$row['forename'];
$surname=$row['surname'];
$addln1=$row['addln1'];
$addln2=$row['addln2'];
$addln3=$row['addln3'];
$num=$row['number'];

}
//free results
  mysqli_free_result($res);
  
  //close connection
  mysqli_close($dbcnx);
?>

<form action="updatedCustomer.php" method="post">
<input type="hidden" name="ud_id" value="<?php echo $id; ?>">
forename: <input type="text" name="ud_fname" value="<?php echo $forename; ?>"><br />
surname: <input type="text" name="ud_sname" value="<?php echo $surname; ?>"><br />
address line 1: <input type="text" name="ud_add1" value="<?php echo $addln1; ?>"><br />
address line 2: <input type="text" name="ud_add2" value="<?php echo $addln2; ?>"><br />
address line 3: <input type="text" name="ud_add3" value="<?php echo $addln3; ?>"><br />
number: <input type="text" name="ud_num" value="<?php echo $num; ?>"><br />


<input type="Submit" value="Update">
</form>










</body>

</html>
