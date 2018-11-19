<?php
 	
 	$link  = mysqli_connect("localhost","root","","bloodDonation");
 	if($link === false)
 	{
 		die("ERROR: could not connect.". mysqli_connect_error());
 	}
?>