<?php
include("index1.php");
$UserNameError = $PasswordError ="";
$name = $password ="";
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


$name=$_POST["UserName"];
$password=$_POST["Password"];
$connection = mysqli_connect("localhost","root","");
    if($connection)
    {
      $selectdb= mysqli_select_db($connection,'blood');
      if(!mysqli_select_db($connection,'blood'))
      {

    echo "database not selected";
      }
      $sql = "SELECT AdminName,Password FROM admin WHERE ( ( adminname = '$name' ) AND ( password = '$password' ) )";
      
       $records=mysqli_query($connection,$sql);

      while($row=mysqli_fetch_array($records)){
      		$new=$row['AdminName'];
      		$pass=$row['Password'];
     	 }
     	 echo $pass;
       			error_reporting(0);	
    			if(strcmp($new,$name)!==0 && $name<=5){

    				if(strcmp($pass,$password)!==0){
    					error_reporting(0);
    				echo "You are not a valid user";
    			}
    		}
    			else{
    				echo "Acces granted";
    				header("Location: adminPage.php");
    			} 
    		
        //header("Location: Home.php");
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
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="style.css">
	<style>
		.error {color: #FF0000;}
	</style>
</head>
<body>

<p><h1><center>Admin Sign In</center></h1></p>
<form method="post" action="">
<div class="signup">
	<table>
   <tr>
      <td>
      <p>Admin Name</p>
         <input type="text" name="UserName" value="<?php if(isset($_POST['UserName'])) echo $_POST['UserName']; ?>"/>
         <span class="error">* <?php echo $UserNameError;?></span>
      </td>
   </tr>

   <tr>
      <td>
      <p>Password</p>
         <input type="Password" name="Password" value="<?php if(isset($_POST['Password'])) echo $_POST['Password']; ?>">
         <span class="error">* <?php echo $PasswordError;?></span>
      </td>
   </tr>
</table>
<input type="submit" value="Sign In">
<input type="reset" value="Reset"><br>
</div>

</form>
</body>
</html>
