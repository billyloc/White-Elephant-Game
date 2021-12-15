<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbName = 'whiteelephant';

$con = mysqli_connect($servername,$username,$password,$dbName);

   $sql = "SELECT * from participants";
   $result = mysqli_query($con,$sql);
    if ($result=mysqli_query($con,$sql))
      {
      // Return the number of rows in result set
      $rowcount=mysqli_num_rows($result);
      printf("There are %d entries.\n",$rowcount);
      // Free result set
      mysqli_free_result($result);
      }
    mysqli_close($con);   



 ?>