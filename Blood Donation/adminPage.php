<!DOCTYPE html>
<html>
<head>
	<title>home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="main">
	<ul>
		<li><a href="Home.php">HOME</a></li>
        <li class="dropdown">
    	<a href="#" class="dropbtn">About Blood</a>
    		<div class="dropdown-content">
     			<a href="About Blood/Why.php">Why Donate Blood</a>
      			<a href="#">Who Can Give Blood</a>
      			<a href="#">Where To Donate</a>
      			<a href="#">Tips for a Successful Donation</a>
      			<a href="#">What Happens to Donated Blood?</a>
    		</div>
 		</li>
 		<li class="dropdown">
 		<a href="#" class="dropbtn">Donors Help</a>
    		<div class="dropdown-content">
     			<a href="Why.php">All Donors List</a>
      			<a href="#">Donors by Group</a>
      			<a href="#">Donors by District</a>
      			<a href="#">Blood Bank</a>
      			<a href="#">All Blood Request List</a>
    		</div>
 		</li>
        <li><a href="signup.php">Request for Blood</a></li>
        <li><a href="signin.php">News And Campains</a></li>
        <li class="dropdown">
    	<a href="#" class="dropbtn">Donation Process</a>
    		<div class="dropdown-content">
     			<a href="Signin.php">Sign In</a>
      			<a href="signup.php">Become a donor</a>
            <a href="Admin.php">Admin</a>
            <a href="Bank.php">Add Blood Bank</a>
            
    		</div>
 		</li>
		<li>
		    <a href="about.html">About Us</a>
        </li>
        <li>
          <form method="post" class="search" action="Search.php">
               Search:
         <input type="text" name="Search">
         <input type="submit" value="Submit">
         
            </form>
        </li>
    </ul>
    </div>

</body>
</html>
