<?php 

// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$servername = "localhost";
$username = "root";
$password = "";
$dbName = 'whiteelephant';

$con = mysqli_connect($servername,$username,$password,$dbName);




// Get values from form
$name = $_GET['fname'];
$number = $_GET['phone'];
$carrier = $_GET['carrier'];

checkDuplicate($name,$number,$carrier);

// print_r($name);
// print_r($number);
// print_r($carrier);



// Check if they are already saved in the DB
function checkDuplicate($name,$number,$carrier) {
    global $con;
    $name = $_GET['fname'];
    $sql = "SELECT id FROM participants WHERE fname = '$name'";
    $result = mysqli_query($con, $sql);
    if (!$result) {
        trigger_error('Invalid query: ' . $con->error);
    }    
    if ($result->num_rows > 0) {
        echo 'You already entered your information';
        // header( "refresh:3;url=whiteElephant.php" );
    } else {
        echo 'Thank You for playing';
        saveToDB($con,$name,$number,$carrier);
        header( "refresh:3;url=whiteElephant.php");
    }    
}

// new user save their info into the DB
function saveToDB($con,$name,$number,$carrier) {
    $sql = "INSERT INTO participants (fname,phone,carrier) VALUES ('{$name}', '{$number}', '{$carrier}')";
    $result = mysqli_query($con, $sql);
    // goback();
}





// if($count==1) {
//         userCount();
//         exit();
// } 

// function userCount() {
//    global $con;
//    $sql = "SELECT * from participants";
//    $result = mysqli_query($con,$sql);
//     if ($result=mysqli_query($con,$sql))
//       {
//       // Return the number of rows in result set
//       $rowcount=mysqli_num_rows($result);
//       printf("There are %d entries.\n",$rowcount);
//       // Free result set
//       mysqli_free_result($result);
//       }
//     mysqli_close($con);   
//    // if($result->num_rows > 0) {
//    //    return $result;
//    // }

// }

 ?>