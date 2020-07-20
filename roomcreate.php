<?php 
	include 'comm.php';
	$cap=0;
	$sql = "INSERT INTO room (no,floorno,buid,capacity)
	VALUES ";
	for($i=1;$i<=$_POST['noofroom'];$i++)
		if($i!=$_POST['noofroom'])
		{$sql.="( '".$_POST['floorno']."', '".$_POST['buid']."', '".$_POST['capacity'.$i.'']."'),";
		$cap+=$_POST['capacity'.$i.''];
		}
		else{
		$sql.="( '".$_POST['floorno']."', '".$_POST['buid']."', '".$_POST['capacity'.$i.'']."')";
		$cap+=$_POST['capacity'.$i.''];
		}
	if($_POST['capacityoffloor']>=$cap)
		if ($conn->query($sql) === TRUE) {
		  header("location: welcome.php");
		} else {
		  echo "Error: " . $sql . "<br>" . $conn->error;
		}
	else{
			echo"ecceded capacity";

		echo'<form>
			<input type="button" value="Return to previous page" onClick="javascript:history.go(-1)" />
		</form>';
		}

 ?>