

<?php session_start(); 

ini_set('display_errors',1);
echo 'Entereed ----11';

$userName=$_POST["userName"];

echo $userName;

$emailId = $_POST["email"];

$pa=$_POST["pass"];

$con=mysqli_connect("localhost", "root","root") or die("No connection");
mysqli_select_db($con,"hackathon") or die ("DATABASE not available");

//$sql= "insert into users(userName, emailAddress, userPassword) values ($userName,$emailId,$pa)";
$sql = "INSERT INTO users"."(userName, emailAddress, userPassword)"."VALUES ('$userName', '$emailId', '$pa')";

echo $sql;

if(mysqli_query($con,$sql))
{
    echo 'Success!!';
    
    //echo"<script>alert('Successfully Registered')</script>";
    
   // Header("Location:login.html");
    //$_SESSION['mname']=$name;
    //$_SESSION['memail']=$mail;
    //$_SESSION['muid']=$uid;
    //$_SESSION['mpass']=$pa;
    //@require 'curl.php';
}
else
{
    //echo mysqli_error();
    echo"<script>alert('Could not be registered!  Invalid input')</script>";
}

?>
