<?php
include("index1.php");

$NameError= $PhoneNoError= $BloodgroupError = $AmountError = $LocationError =$DistrictError= $DateError= $MoreError= "";
$Name= $PhoneNo = $Bloodgroup=$Amount = $Location= $District= $Date=$More= "";

if ($_POST) {
  if (empty($_POST["Name"])) {
    $NameErr = "Name is required";
  } else {
    $Name = test_input($_POST["Name"]);
    // check if name only contains letters and whitespace
  if (!preg_match("/^[a-zA-Z ]*$/",$Name)) {
      $NameError = "Only letters and white space allowed";
    }
    else if(strlen($Name)<5) {
      $NameError = "Must be 5 character";
    }
  }
  
  if (empty($_POST["PhoneNo"])) {
    $PhoneNoError = "Please Enter Numeric number";
  } else {
    $PhoneNo = test_input($_POST["PhoneNo"]);
  }
  if (empty($_POST["Amount"])) {
    $AmountError = "Please Enter Numeric number";
  } else {
    $Amount = test_input($_POST["Amount"]);
  }
     
 if (empty($_POST["Location"])) {
    $LocationError = "Please Provide Location";
  } else {
    $Location = test_input($_POST["Location"]);
  }
  if (empty($_POST["Location"])) {
    $DistrictError = "Please Provide District";
  } else {
    $District = test_input($_POST["District"]);
  }
  if (empty($_POST["Date"])) {
    $DateError = "Date is required";
  } else {
    $Date = test_input($_POST["Date"]);
  }
  if (empty($_POST["More"])) {
    $MoreError = "Date is required";
  } else {
    $More = test_input($_POST["More"]);
  }
  
 
  // redirect to another page
  if(!empty($_POST["PhoneNo"]) && !empty($_POST["Location"]))
  {
    $Name= $_POST["Name"];
    $PhoneNo=$_POST["PhoneNo"];
    $Bloodgroup=$_POST["Bloodgroup"];
    $Amount= $_POST["Amount"];
    $Location=$_POST["Location"];
    $District=$_POST["District"];
    $Date=$_POST["Date"];
    $More=$_POST["More"];

    $connection = mysqli_connect("localhost","root","");
    if($connection)
    {
      $selectdb= mysqli_select_db($connection,'blood');
      if(!mysqli_select_db($connection,'blood'))
      {
          echo "database not selected";
      }
        $sql= "INSERT INTO request(Name,BloodGroup,Amount,Location,PhoneNo)VALUES('$Name','$Bloodgroup','$Amount','$Location','$PhoneNo')";
        if( !mysqli_query($connection,$sql))
        {
          echo "Not inserted";
        //header("Location: Home.php");
        }
    }
    mysqli_close($connection);
       
  }
  
    else
    {
        echo "Not Connected <br>";
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

<p><h1><center>Make a Request for Blood</center></h1></p>
<form method="post" action="">
<div class="signup">
	<table>
   <tr>
      <td>
      Your Name:
         <input type="text" name="Name" value="<?php if(isset($_POST['Name'])) echo $_POST['Name']; ?>"/>
         <span class="error">* <?php echo $NameError;?></span>
      </td>
   </tr>
   <tr>
      <td>
      Your Contact No:
         <input type="text" name="PhoneNo" value="<?php if(isset($_POST['PhoneNo'])) echo $_POST['PhoneNo']; ?>"/>
         <span class="error">* <?php echo $PhoneNoError;?></span>
      </td>
   </tr>

   
   <tr>
      <td>
      Required Blood Group:
         <input type="radio" name="Bloodgroup"<?php if (isset($Bloodgroup) && $Bloodgroup=="A+") echo "checked";?>
         value="A+">A+
         <input type="radio" name="Bloodgroup"<?php if (isset($Bloodgroup) && $Bloodgroup=="A-") echo "checked";?>
         value="A-">A-
         <input type="radio" name="Bloodgroup"<?php if (isset($Bloodgroup) && $Bloodgroup=="B+") echo "checked";?>
         value="B+">B+
         <input type="radio" name="Bloodgroup"<?php if (isset($Bloodgroup) && $Bloodgroup=="B-") echo "checked";?>
         value="B-">B-
         <input type="radio" name="Bloodgroup"<?php if (isset($Bloodgroup) && $Bloodgroup=="AB+") echo "checked";?>
         value="AB+">AB+
         <input type="radio" name="Bloodgroup"<?php if (isset($Bloodgroup) && $Bloodgroup=="AB-") echo "checked";?>
         value="AB-">AB-
         <input type="radio" name="Bloodgroup"<?php if (isset($Bloodgroup) && $Bloodgroup=="O+") echo "checked";?>
         value="O+">O+
         <input type="radio" name="Bloodgroup"<?php if (isset($Bloodgroup) && $Bloodgroup=="O-") echo "checked";?>
         value="O-">O-
      </td>
   </tr>
   <tr>
      <td>
      Amount(Unit/Bag):
         <input type="text" name="Amount" value="<?php if(isset($_POST['Amount'])) echo $_POST['Amount']; ?>"/>
         <span class="error">* <?php echo $AmountError;?></span>
      </td>
   </tr>
   <tr>
      <td>
      Patient's Location:
         <input type="text" name="Location" value="<?php if(isset($_POST['Location'])) echo $_POST['Location']; ?>">
         <span class="error">* <?php echo $LocationError;?></span>
      </td>
   </tr>
   <tr>
      <td>
      Patient's District:
         <input type="text" name="District" value="<?php if(isset($_POST['District'])) echo $_POST['District']; ?>">
         <span class="error">* <?php echo $DistrictError;?></span>
      </td>
   </tr>

   <tr>
      <td>
      Date:
         <input type="text" name="Date" value="<?php if(isset($_POST['Date'])) echo $_POST['Date']; ?>">
         <span class="error">* <?php echo $DateError;?></span>
      </td>
   </tr>
 
   <tr>
      <td>
      More Message:
         <input type="text" name="More" value="<?php if(isset($_POST['More'])) echo $_POST['More']; ?>">
         <span class="error">* <?php echo $MoreError;?></span>
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