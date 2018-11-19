<?php
include("index1.php");
?>
<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>Search Result</title>
</head>
<body>
	
	<table border="1" cellspacing="1" cellpadding="1">
			<center><h1>Donor In your city</h1></center>
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Phone Number</th>
			<th>Blood Group</th>
		</tr>
		
		
	
<?php
$loc=$group="";
$loc= $_POST['Search'];
$group=$_POST['Search'];

$connection = mysqli_connect("localhost","root","");
    if($connection)
    {
      $selectdb= mysqli_select_db($connection,'blood');
      if(!mysqli_select_db($connection,'blood'))
      {
        echo "database not selected";
      }
    }
      $sql = "SELECT FirstName,LastName,PhoneNo,Bloodgroup FROM donor WHERE  ( ( Location = '$loc' ) OR ( Bloodgroup = '$group' ) )";
       $records=mysqli_query($connection,$sql);

    
      while($row=mysqli_fetch_array($records)){
          echo "<tr>";
          echo "<td>".$row['FirstName']."</td>";
          echo "<td>".$row['LastName']."</td>";
          echo "<td>".$row['PhoneNo']."</td>";
          echo "<td>".$row['Bloodgroup']."</td>";
       }
    
     function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
  }
?>
</table>
<br>
<br>
<br>
<br>
<table border="1" cellspacing="1" cellpadding="1">
	<center><h1>Blood Bank In your city</h1></center>
		<tr>
			<th>Bank Name</th>
			<th>Location</th>
			<th>Phone Number</th>
			
		</tr>
<?php
$loc=$group="";
$loc= $_POST['Search'];
$group=$_POST['Search'];

$connection = mysqli_connect("localhost","root","");
    if($connection)
    {
      $selectdb= mysqli_select_db($connection,'blood');
      if(!mysqli_select_db($connection,'blood'))
      {
        echo "database not selected";
      }
    }
      $sql = "SELECT BankName,Location,PhoneNo FROM bloodbank WHERE Location = '$loc'";
       $records=mysqli_query($connection,$sql);

    
      while($row=mysqli_fetch_array($records)){
          echo "<tr>";
          echo "<td>".$row['BankName']."</td>";
          echo "<td>".$row['Location']."</td>";
          echo "<td>".$row['PhoneNo']."</td>";
          
       }
    
    
?>
</body>
</html>