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


          $id=$_POST['id'];
          $U='U';
          $sql="UPDATE stock_file SET Status = '$U'  WHERE Stock_ID=$id"; 
          
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
                                            
         
                                      











</body>

</html>
