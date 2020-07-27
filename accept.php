<?php 
	include 'comm.php';
	$sql='UPDATE `users` SET privilage="'.$_POST['priv'].'" WHERE `id` = '.$_POST['id'].'';
	if ($conn->query($sql) === TRUE) {
          header("location: verify.php");
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }

	// header("location:verify.php");
 ?>