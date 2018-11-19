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
			<th>Name</th>
      <th>Requested Blood Group</th>
      <th>Amount (bag's)</th>
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
      $sql = "SELECT * FROM request";
       $records=mysqli_query($connection,$sql);

    
      while($row=mysqli_fetch_array($records)){
          echo "<tr>";
          echo "<td>".$row['Name']."</td>";
           echo "<td>".$row['Bloodgroup']."</td>";
           echo "<td>".$row['Amount']."</td>";
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