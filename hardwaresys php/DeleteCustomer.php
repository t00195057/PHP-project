<!DOCTYPE html>
<html lang='cs'>
  <head>
    <title></title>
    <meta charset='utf-8'>
   
  </head>
  <body>
           
           
     
<?php
$custid = $_POST['customer_id'];

if ($custid == '' or !is_numeric($custid))
{
echo("You did not complete the delete form correctly <br>");
exit();
}
 else
{
$dbcnx = mysqli_connect("localhost", "root", "", "hardwaresys");
if (mysqli_connect_errno($dbcnx )){
echo "Failed to connect to MySQL: ".mysqli_connect_error();
exit();
}
$sql = "DELETE from customer WHERE customer_id = $custid";
 $res = mysqli_query($dbcnx, $sql);   
      if($res){
		$count = mysqli_affected_rows($dbcnx);
	}
	if($count>0){
         echo("Customer no. " . " ". $custid. " " . "has been deleted successfully");
             }
     else{
             echo "No such record deleted";
          }
     mysqli_close($dbcnx);	 }?>
   
           
  </body>
</html>