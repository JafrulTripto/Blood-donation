<?php
include("index1.php");

$UserNameError = $PasswordError = $ConfirmPasswordError = $FirstNameError = $LastNameError = $EmailError= $PhoneNoError = $LocationError =$AgeError=$BloodgroupError="";
$name = $password = $confirmpass = $firstname = $lastname = $email = $phoneno = $location= "";

if ($_POST) {
  if (empty($_POST["UserName"])) {
    $UserNameErr = "Name is required";
  } else {
    $name = test_input($_POST["UserName"]);
    // check if name only contains letters and whitespace
  if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $UserNameError = "Only letters and white space allowed";
    }
    else if(strlen($name)<5) {
      $UserNameError = "Must be 5 character";
    }
  }
  
  
  if (empty($_POST["Password"])) {
    $PasswordError = "Please Enter Password";
  } else {
    $Password = test_input($_POST["Password"]);
  }
  if (empty($_POST["ConfirmPassword"])) {
    $ConfirmPasswordError = "Password Mismatched";
  } else {
    $Confirmpass = test_input($_POST["ConfirmPassword"]);
  }
  
  if (empty($_POST["FristName"])) {
    $FristNameError = "Frist Name is required";
  } else {
    $fristname = test_input($_POST["FristName"]);
    // check if name only contains letters and whitespace
    if(strlen($fristname)>20) {
      $FristNameError = "Maximum 20 character";
    }
  else if (!preg_match("/^[a-zA-Z ]*$/",$fristname)) {
      $FristNameError = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["LastName"])) {
    $LastNameError = "Last Name is required";
  } else {
    $lastname = test_input($_POST["LastName"]);
    // check if name only contains letters and whitespace
    if(strlen($lastname)>20) {
      $LastNameError = "Maximum 20 character";
    }
  if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
      $LastNameError = "Only letters and white space allowed";
    }
  }
  
   if (empty($_POST["Email"])) {
    $EmailError = "Email is required";
  } else {
    $email = test_input($_POST["Email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $EmailError = "Invalid email format";
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
  if(!empty($_POST["UserName"]) && !empty($_POST["Password"]))
  {
   $name= $_POST["UserName"];
  $password= $_POST["Password"];
  $firstname= $_POST["FirstName"];  
    $lastname= $_POST["LastName"];
  $email=$_POST["Email"];
  $location=$_POST["Location"];
  $phoneno=$_POST["PhoneNo"];
  $confirmpass= $_POST["ConfirmPassword"];
    $connection = mysqli_connect("localhost","root","");
    if($connection)
    {
        
    if($password == $confirmpass){
      $selectdb= mysqli_select_db($connection,'blood');
      if(!mysqli_select_db($connection,'blood'))
      {

    echo "database not selected";
      }
        $sql= "INSERT INTO donor(FirstName,LastName,Location,PhoneNo,Email)VALUES('$firstname','$lastname','$location','$phoneno','$email')";

       if( !mysqli_query($connection,$sql))
       {
    echo "Not inserted";
        //header("Location: Home.php");
    }
  }
    else
    {
      echo "Password Mismatched <br>";
    }
    mysqli_close($connection);
       
    }
  
    else
    {
        echo "Not Connected <br>";
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
      UserName:
         <input type="text" name="UserName" value="<?php if(isset($_POST['UserName'])) echo $_POST['UserName']; ?>"/>
         <span class="error">* <?php echo $UserNameError;?></span>
      </td>
   </tr>

   <tr>
      <td>
      Password:
         <input type="Password" name="Password" value="<?php if(isset($_POST['Password'])) echo $_POST['Password']; ?>">
         <span class="error">* <?php echo $PasswordError;?></span>
      </td>
   </tr>

   <tr>
      <td>
      Confirm Password:
         <input type="Password" name="ConfirmPassword" value="<?php if(isset($_POST['ConfirmPassword'])) echo $_POST['Email']; ?>">
         <span class="error">* <?php echo $ConfirmPasswordError;?></span>
      </td>
   </tr>
   <tr>
      <td>
      First Name:
         <input type="text" name="FirstName" value="<?php if(isset($_POST['FirstName'])) echo $_POST['FirstName']; ?>">
         <span class="error">* <?php echo $FirstNameError;?></span>
      </td>
   </tr>
   <tr>
      <td>
      Last Name:
         <input type="text" name="LastName" value="<?php if(isset($_POST['LastName'])) echo $_POST['LastName']; ?>">
         <span class="error">* <?php echo $LastNameError;?></span>
      </td>
   </tr>
   <td>
      Age:
         <input type="text" name="Age" value="<?php if(isset($_POST['Age'])) echo $_POST['Age']; ?>">
         <span class="error">* <?php echo $AgeError;?></span>
      </td>
   <tr>
      <td>
      Blood Group:
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
      Email:
         <input type="text" name="Email" value="<?php if(isset($_POST['Email'])) echo $_POST['Email']; ?>">
         <span class="error">* <?php echo $EmailError;?></span>
      </td>
   </tr>
 
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