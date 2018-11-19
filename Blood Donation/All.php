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
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Phone Number</th>
			<th>Blood Group</th>
		</tr>
		
	
<?php

$connection = mysqli_connect("localhost","root","");
    if($connection)
    {
      $selectdb= mysqli_select_db($connection,'blood');
      if(!mysqli_select_db($connection,'blood'))
      {
        echo "database not selected";
      }
    }
      $sql = "SELECT FirstName,LastName,PhoneNo,Bloodgroup FROM donor";
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
</body>
</html>