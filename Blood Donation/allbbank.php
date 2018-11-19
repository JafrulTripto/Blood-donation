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
			<th>Bank Name</th>
			<th>Location</th>
			<th>Phone Number</th>
			
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
      $sql = "SELECT BankName,PhoneNo,Location FROM bloodbank";
       $records=mysqli_query($connection,$sql);

    
      while($row=mysqli_fetch_array($records)){
          echo "<tr>";
          echo "<td>".$row['BankName']."</td>";
          echo "<td>".$row['Location']."</td>";
          echo "<td>".$row['PhoneNo']."</td>";
          
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