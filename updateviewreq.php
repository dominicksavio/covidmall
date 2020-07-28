 <?php 
	include 'comm.php';

	$sql='UPDATE building SET buildingname = "'.$_POST['name'].'" WHERE user = "'.$_POST['user'].'" AND uid = "'.$_POST['buid'].'"';

	
	if ($conn->query($sql) === TRUE) {
		echo "success";
		header("location:welcome.php");
		// echo $sql;
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
 ?>