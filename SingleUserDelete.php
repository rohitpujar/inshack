<?php

$query = $_POST['userid'];

//echo"<script>alert($query)</script>";

$con=mysqli_connect("localhost", "root","") or die("No connection");
mysqli_select_db($con,"hackathon") or die ("DATABASE not available");
$sqlnew="select phonenumber from singleuser where Userid='$query'";

if($ress=mysqli_query($con,$sqlnew))
{
    while($row= mysqli_fetch_row($ress))
    {
        //echo ''.$row[0];
        $dltphno = $row[0];
    }
}
$sqlnew1 ="delete from singleuser where Userid='$query'";

$sqlnew2="delete from user where userid='$query'";;

$sqlnew3 ="insert into availablenumbers values($dltphno)";
$sqlnew4 ="delete from singleusertransaction where phonenumber='$dltphno'";
echo $sqlnew3;

mysqli_query($con, $sqlnew1);
mysqli_query($con, $sqlnew2);
mysqli_query($con, $sqlnew3);
mysqli_query($con, $sqlnew4);
header('Location:singleuserlogin.html');


//echo $dltphno;
//
//insert into corporateuserphonenumbers(CorporateID,phonenumber) values ('16576',@phnNo );
//
//









//if(mysqli_query($con,$sqlset))
//{
//    echo $sqlset;
//	echo"<script>alert('Your connection has been deleted')</script>";
//        $_SESSION['username']='';
//	//@require './index.html';
//        
//}
//else
//{
//	echo"<script>alert('Unable to delete your account')</script>";
//	
//}

//echo"<script>alert($res1)</script>";





?>