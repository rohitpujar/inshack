<!DOCTYPE HTML>
<!--
	Intensify by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>hackathoned- Welcome to the registration page.</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<script>
                    

    function validatebox2() {
    var fn2 = document.getElementById("fn2").value;
    var fn3 = document.getElementById("fn3").value;
    if(fn2!=fn3)
    {
        document.getElementById("error_fn2").innerHTML ="Passwords Do not Match!";
        document.getElementById("error_fn2").style.color = "red";
        document.getElementById("fn2").value ="";
        document.getElementById("fn3").value ="";
    }
    else if(fn2.length<6)
    {
        document.getElementById("error_fn2").innerHTML ="Password should be  minimum 6 characters";
        document.getElementById("error_fn2").style.color = "red";
        document.getElementById("fn2").value ="";
        document.getElementById("fn3").value ="";
    }
    else
    {
        document.getElementById("error_fn2").innerHTML ="Passwords Match!";
        document.getElementById("error_fn2").style.color = "green";
    }
}
	function hello()
	{
		alert ("hello");
	}

      </script>
	</head>
	<body class="subpage">
			<header id="header">
				
				<a href="index.html" class="logo">Online Document Management</a>
				
			</header>
		<section id="main" class="wrapper">
	<form action="dbregister.php" method="post" enctype="multipart/form-data">
		<div class="container">
		<section class="register">
        <div class="reg_section personal_info">
		<h3>User ID</h3>
		<!--<input type="text" name="user" placeholder="Your Desired Username" onchange="validate('user', this.value)" required/> 
		<label id="user">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>*/-->
		
		<input type="text" name="email"  placeholder="Your E-mail Address" required/> 
        
		<label id="email">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>

		</div>
		<h3>User Name</h3>
		<!--<input type="text" name="user" placeholder="Your Desired Username" onchange="validate('user', this.value)" required/> 
		<label id="user">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>*/-->
		
		<input type="text" name="userName"  placeholder="Your User Name" required/> 
        

		<div class="reg_section password">
		
		<h3>Your Password</h3>
		<input type="password" name="pass" id="fn2" value="" placeholder="Your Password" required>
		<label id="dummy">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
		
		<input type="password" name="confirm" id="fn3" value="" placeholder="Confirm Password" required>
		<label id="error_fn2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
		<input type="submit" name="signup" id="signup" value="Sign Up"/> 
	</form>

	</body>
</html>