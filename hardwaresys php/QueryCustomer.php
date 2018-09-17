<?php                          
$cid = $_POST['cid'];

$dbcnx = mysqli_connect("localhost", "root", "", "hardwaresys");
if (mysqli_connect_errno($dbcnx ))
{
   echo "Failed to connect to MySQL: " .mysqli_connect_error();
   exit();
}                           
else {
$sql = "SELECT * from customer
        WHERE customer_Id = $cid";

$res = mysqli_query($dbcnx, $sql);
if ( !$res ) 
{                          
   echo('Query failed ' . $sql . ' Error:' . mysqli_error());
   exit();
}
else
{                            
   if(mysqli_num_rows($res)< 1){
   //there are no items of stock
      echo "<p><em> No Customers</em></p>";
      exit();  }             
   else {      
      
         while ( $row = mysqli_fetch_array($res) ) {

      echo("<form action='QueryCustomer.php' method='post'>".
      "<table border ='1' style='border-collapse'><tr><th>Customer ID</th>".
      "<th>Forename</th><th>Surname</th><th>address line 1</th><th>address line 2</th><th>address line 3</th>".
      "<th>number</th></tr><tr><td>".
          $row['customer_id']."</td><td>". stripslashes($row['forename'])."</td><td>". 
         stripslashes($row['surname'])."</td><td>". stripslashes($row['addln1']).
         "</td><td>". stripslashes($row['addln2'])."</td><td>". stripslashes($row['addln3']).
         "</td><td>".  $row['number'] ."</td><td>".
           "<input type='submit' name='update' value='update' /> </td><td>".
           "<input type='submit' name='delete' value='delete'/></td></tr></table>"."</p></form>");
      }
      
if ($_POST['action'] == 'update') {
    //action for update here
} 
else if ($_POST['action'] == 'delete') {
                           
                             
                          
                           
                            $sql = "DELETE from customer WHERE customer_id = $cid";
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
                                 mysqli_close($dbcnx);	 
}                             

mysqli_free_result($res);
mysqli_close($dbcnx);
 }}   }                   ?>