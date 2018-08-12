<?php session_start();

$name=$_GET["user"];
$pa=$_GET["pass"];
$con=mysqli_connect("localhost", "root", "root", "hackathon");

mysqli_select_db($con,"hackathon") or die ("DATABASE not availabel");
$sql="select userName from users where userName = '$name' && userPassword='$pa'";

$result=mysqli_query($con,$sql);

// mysqli_num_row is counting table row
$count=mysqli_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
error_log("LOGIN SUCCESS ***************");
if($count==1){
$_SESSION['guest']=0;
// Register $myusername, $mypassword and redirect to file "login_success.php"
//session_register("name");
//session_register("pa");
#session_register("mysubcode");
#header("location:retrieve_teacher.php?username=$myusername");
    //session_start();
  $_SESSION['username']=$name;
  @require 'uploadFile.html';
}
else {
echo '<form action="singleuserlogin.html" method="post" >';
echo "<div align='center'><font size='5' color='black'> Wrong Username or Password</div>";
echo "<div align='center' ><input type='submit' name='back' value='Back'></div>";
echo '</form>';
}

?>