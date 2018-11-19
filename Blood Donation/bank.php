<?php
include("adminPage.php");

$BankNameError=$PhoneNoError = $LocationError ="";
$name = $phoneno = $location= "";

if ($_POST) {
  if (empty($_POST["BankName"])) {
    $UserNameErr = "Name is required";
  } else {
    $name = test_input($_POST["BankName"]);
    // check if name only contains letters and whitespace
  if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $UserNameError = "Only letters and white space allowed";
    }
    
  }
  if (empty($_POST["PhoneNo"])) {
    $PhoneNoError = "Please Enter Numeric number";
  } else {
    $phoneno = test_input($_POST["PhoneNo"]);
  }
 if (empty($_POST["Location"])) {
    $LocationError = "Please Provide Location";
  } else {
    $location = test_input($_POST["Location"]);
  }
  
  
 
  // redirect to another page
  if(!empty($_POST["BankName"]))
  {
   $name= $_POST["BankName"];
  $location=$_POST["Location"];
  $phoneno=$_POST["PhoneNo"];
  

    $connection = mysqli_connect("localhost","root","");
    if($connection)
    {
  
      $selectdb= mysqli_select_db($connection,'blood');
      if(!mysqli_select_db($connection,'blood'))
      {

    echo "database not selected";
      }
        $sql= "INSERT INTO bloodbank(BankName,Location,PhoneNo)VALUES('$name','$location','$phoneno')";
       if( mysqli_query($connection,$sql))
       {
    echo "Inserted";
        //header("Location: Home.php");
    }
  }
    
   
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="style.css">
	<style>
		.error {color: #FF0000;}
	</style>
</head>
<body>

<p><h1><center>Donor Registration Form</center></h1></p>
<form method="post" action="">
<div class="signup">
	<table>
   
   <tr>
      <td>
      
      Bank Name:
         <input type="text" name="BankName" value="<?php if(isset($_POST['BankName'])) echo $_POST['BankName']; ?>">
         <span class="error">* <?php echo $BankNameError;?></span>
      </td>
   </tr>
   <td>
      
     
   <tr>
      <td>
      
 
   <tr>
      <td>
      PhoneNo:
         <input type="text" name="PhoneNo" value="<?php if(isset($_POST['PhoneNo'])) echo $_POST['PhoneNo']; ?>">
         <span class="error">* <?php echo $PhoneNoError;?></span>
      </td>
   </tr>
   <tr>
      <td>
      Location:
         <input type="text" name="Location" value="<?php if(isset($_POST['Location'])) echo $_POST['Location']; ?>">
         <span class="error">* <?php echo $LocationError;?></span>
      </td>
   </tr>
<br>
</table>
<input type="Submit" value="Save">
<input type="reset" value="Reset"><br>
</form>
</div>


</body>
</html>