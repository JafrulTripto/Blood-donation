<?php
 	
 	$connection = mysqli_connect("localhost","root","");
    if($connection)
    {
        
    if($password == $confirmpass){
      $selectdb= mysqli_select_db($connection,'blood');
      if(!mysqli_select_db($connection,'blood'))
      {
?>