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
      $sql = "SELECT UserName,Password FROM donor WHERE ( ( username = '$name' ) AND ( password = '$password' ) )";
      
       $records=mysqli_query($connection,$sql);

      while($row=mysqli_fetch_array($records)){
      		$new=$row['UserName'];
      		$pass=$row['Password'];
     	 }
     	 
       			error_reporting(0);	
    			if(strcmp($new,$name)!==0 && $name<=5){

    				if(strcmp($pass,$password)!==0){
    					error_reporting(0);
    				echo "You are not a valid user";
    			}
    		}
    			else{
    				echo "Acces granted";
    				header("Location: Home.php");
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
    <title>Sign In</title>
    <link rel="stylesheet" type="text/css" href="style.css">
	<style>
		.error {color: #FF0000;}
	</style>
</head>
<body>

<div class="loginBox">
  <img src="user-male-circle-blue-512.png" class="user">
  <h2>Log In</h2>
  <form method="post" action="">
    <p>Username</p>
   <input type="text" name="UserName" value="<?php if(isset($_POST['UserName'])) echo $_POST['UserName']; ?>"/>
         <span class="error">* <?php echo $UserNameError;?></span>
    <p>Passward</p>
    <input type="Password" name="Password" value="<?php if(isset($_POST['Password'])) echo $_POST['Password']; ?>">
         <span class="error">* <?php echo $PasswordError;?></span>
    <input type="submit" name="" value="Sign in">
    <a href=""> Forget Passward??</a>
  </form>
</div>

</form>
</body>
</html>
