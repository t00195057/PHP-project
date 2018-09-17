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

$sql="SELECT * FROM stock_file WHERE Stock_ID=$id";

$res = mysqli_query($dbcnx, $sql);
if ( !$res ) {
        echo('Query failed ' . $sql . ' Error:' . mysqli_error($dbcnx));
        exit();
    }


else 
{
$row = mysqli_fetch_array($res); 
$Name=$row['Stock_Name'];
$Qty=$row['Qty'];
$Cost=$row['Cost_Price'];
$Sale=$row['Sale_Price'];

}
//free results
  mysqli_free_result($res);
  
  //close connection
  mysqli_close($dbcnx);
?>

<form action="updatedStock.php" method="post">
<input type="hidden" name="ud_id" value="<?php echo $id; ?>">
Stock Name: <input type="text" name="ud_name" value="<?php echo $Name; ?>"><br />
Quantity: <input type="text" name="ud_qty" value="<?php echo $Qty; ?>"><br />
Cost Price: <input type="text" name="ud_cost" value="<?php echo $Cost; ?>"><br />
Sale Price: <input type="text" name="ud_sale" value="<?php echo $Sale; ?>"><br />


<input type="Submit" value="Update">
</form>










</body>

</html>
