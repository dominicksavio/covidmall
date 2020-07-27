
 <?php 
	include 'comm.php';

	$sql='DELETE FROM `floor` WHERE `floorno` = '.$_POST['floorno'].' AND `floor`.`buid` = '.$_POST['buid'].' ';

	
	if ($conn->query($sql) === TRUE) {
		echo "success";
		header("location:welcome.php");
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
 ?>