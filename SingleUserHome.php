<?php
session_start();
$namem=$_SESSION['username'];


//echo $datefrom;
//echo $dateto;


function filterTable($query)
{
$con = mysqli_connect("localhost","root","","hackathon");
$filter_result=mysqli_query($con,$query);
if (!$filter_result) {
    echo $sqlnew;
    printf("Error: %s\n", mysqli_error($con));
    exit();
}
return $filter_result;
}

function filterTable1($query)
{
$con = mysqli_connect("localhost","root","","hackathon");
$filter_result11=mysqli_query($con,$query);
if (!$filter_result11) {
    echo $sqlnew;
    printf("Error: %s\n", mysqli_error($con));
    exit();
}
return $filter_result11;
}

//function betndates()
//{
//$datefrom=$_POST['datefrom'];
//$dateto=$_POST['dateto'];
//$con = mysqli_connect("localhost","root","","hackathon");
//$queryy="call hackathon.displayMonthlyTransactionForSingleUSerWithDate($namem,$datefrom,$dateto)";
//$filter_resultt=mysqli_query($con,$queryy);
//
//
//}

if(isset($_POST['checkrequests']))
{

}
else
{
$query = "call hackathon.displayDailyTransactionForSingleUSer('$namem')";

echo $query;

$search_result1 = filterTable($query);
}

if(isset($_POST['monthly']))
{

}
else
{
$query11 = "call hackathon.displayMonthlyTransactionForSingleUSer('$namem')";

$search_result11 = filterTable1($query11);
}
?>





<!DOCTYPE HTML>
<!--
        Intensify by TEMPLATED
        templated.co @templatedco
        Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
    <head>
        <title>hackathonunication Database Management System</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="assets/css/main.css" />
        <script>
            function validate(query)
            {
                //alert(query);

                $.post('SingleUserDelete.php', {userid: query},
                        function (data)
                        {
                            document.write(data);

                        }
                );

                //xmlhttp = new XMLHttpRequest(); // Creating Object
                //xmlhttp.open("GET","admindecision.php?query="+query, false);
                //xmlhttp.send();
            }
            function xoxo()
            {
                   var datefrom = document.getElementById("datefrom").value;
                   var dateto = document.getElementById("dateto").value;
                   //alert(datefrom+"hi"+dateto);
                   
                   
                $.post('calcprice.php', {datefrom: datefrom, dateto: dateto},
                        function (data)
                        {
                            document.write(data);

                        }
                );
                   
       }
        </script>
    </head>
    <body>
<?php
echo "Welcome to hackathoned! " . $_SESSION['username'];
if ($_SESSION['username'] == '') {
            echo "Log in first!";
            //echo "<a href='http://localhost/tele-db/singleuserlogin.html'> Click here to Login";
            //include 'singleuserlogin.html';
            header('Location:singleuserlogin.html');
        }
?>
        <!-- Header -->
        <header id="header">
            <nav class="left"> 
                <a href="#menu"><span>Menu</span></a>
            </nav>
            <a href="index.html" class="logo">hackathoned</a>

        </header>

        <!-- Menu -->
        <nav id="menu">
            <ul class="links">
                <li><a href="index.html">Home</a></li>
                <li><a href="singleuserlogin.html">Log in as a Single User</a></li>
                <li><a href="familyuserloginfinal.html">Log in as a Family User</a></li>
                <li><a href="corporateuserlogin.html">Log in as a Corporate User</a></li>
                <li><a href="aboutus.html">About Us</a></li>
            </ul>

        </nav>
        
        <section id="main" class="wrapper">
       
                <div class="container">
                    <section class="register">
                        <a href="index.html">HOME</a>
                        <Label name="user"><? php echo "Welcome ! ".$_SESSION['username']; ?></label>

                        <div class="reg_section personal_info">
                            <h3> Get the transactions made betn two dates </h3>
                                <input type="text" id="datefrom" name="datefrom" value="" required/>
                                <input type="text"  id="dateto" name="dateto" value="" required/>
                                <input type="submit" name="submit" value="Submit" onclick="xoxo()"/>
                            
                           
                            
                    </section>
        


        <!-- Banner -->
        <section id="banner">
            <div class="content">
                
                
                <ul class="actions">
                    <li><a href="#twoo" class="button scrolly" name="monthly">View My Monthly Bills</a></li>
                    <li><a href="#three" class="button scrolly" name="checkrequests">View My Daily Transactions</a></li>
                    <input type='button' name=<?php echo $_SESSION['username']; ?> value='Terminate' onclick="validate(this.name)" />
                    <a href='logout.php' class='button scrolly'>Logout</a>
                </ul>
            </div>
        </section>
        <section id="three" class="wrapper">
            <form>
                <h3>View Your Daily Transactions</h3>
                <table>
                    <tr>
                        <th>User ID</th>
                        <th>Phone number</th>
                        <th>Number of minutes talked </th>
                        <th>Internet Usage</th>
                        <th>Date of transaction</th>
                    </tr>
                    <?php while($row = mysqli_fetch_array($search_result1)):?>
                    <tr>
                        <td><?php echo $row['Userid'];?></td>
                        <td><?php echo $row['phonenumber'];?></td>
                        <td><?php echo $row['Numberofminutes'];?></td>
                        <td><?php echo $row['NumberofMB'];?></td>
                        <td><?php echo $row['DateofTransaction'];?></td>
                 <?php endwhile;?>
                </table>

        </section>
        
         <section id="twoo" class="wrapper">
            <form>
                <h3>View Your Monthly Bills</h3>
                <table>
                    <tr>
                       <th>Plan</th>
                        <th>Minutes</th>
                        <th>Internet</th>
                        <th>Total</th>
                    </tr>
                    <?php while($row = mysqli_fetch_array($search_result11)):?>
                    <tr>
                        <td><?php echo $row['plan'];?></td>
                        <td><?php echo $row['Cost_for_call'];?></td>
                        <td><?php echo $row['cost_for_data'];?></td>
                        <td><?php echo $row['Total'];?></td>
                    </tr>
                 <?php endwhile;?>
                </table>

        </section>


        <!-- Footer -->
        
        <!-- Scripts -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/jquery.scrolly.min.js"></script>
        <script src="assets/js/skel.min.js"></script>
        <script src="assets/js/util.js"></script>
        <script src="assets/js/main.js"></script>

    </body>
</html>
