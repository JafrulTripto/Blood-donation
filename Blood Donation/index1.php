
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
     			<a href="Why.php">Why Donate Blood</a>
      			<a href="Who.php">Who Can Give Blood</a>
      			<a href="tips.php">Tips for a Successful Donation</a>
      			<a href="what.php">What Happens to Donated Blood?</a>
    		</div>
 		</li>
 		<li class="dropdown">
 		<a href="#" class="dropbtn">Donors Help</a>
    		<div class="dropdown-content">
     			<a href="All.php">All Donors List</a>
      			<a href="#">Donors by Group</a>
      			<a href="#">Donors by District</a>
      			<a href="allbbank.php">Blood Bank</a>
    		</div>
 		</li>
        <li><a href="request.php">Request for Blood</a></li>
        <li class="dropdown">
    	<a href="#" class="dropbtn">Donation Process</a>
    		<div class="dropdown-content">
     			<a href="Signin.php">Sign In</a>
      			<a href="signup.php">Become a donor</a>
            <a href="Admin.php">Admin</a>
            
    		</div>
 		</li>
		<li>
		    <a href="about.php">About Us</a>
    </li>
    <li>
        <form method="post" class="search" action="Search.php">
            <input type="text" name="Search">
            <input type="submit" value="Search">
        </form>
    </li>
  </ul>
  </div>

</body>
</html>