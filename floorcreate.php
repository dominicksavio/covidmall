<?php 
	include 'comm.php';
	$sql = "INSERT INTO floor (floorno,noofroom ,capacity ,buid )
	VALUES ('".$_POST['floornumber']."', '".$_POST['noofroom']."', '".$_POST['capacity']."', '".$_POST['buid']."')";

	if ($conn->query($sql) === TRUE) {
	  echo "New floor created successfully";
	echo '

		<h2>Create Room</h2>
		<form action="roomcreate.php" method="POST">
			<table>';
			for($i=1;$i<=$_POST['noofroom'];$i++){
			echo'
					<tr>
						<td>capacity of room '.$i.':</td>
						<td><input type="text" name="capacity'.$i.'"></td>
					</tr>
				';
			}

			echo'</table>
			<input type="text" name="floorno" hidden value="'.$_POST['floornumber'].'">
			<input type="text" name="noofroom" hidden value="'.$_POST['noofroom'].'">
			<input type="text" name="capacityoffloor" hidden value="'.$_POST['capacity'].'">
			<input type="text" name="buid" value="'.$_POST['buid'].'" hidden>
			<input type="submit" name="submit">
		</form>';
		echo'<form>
			<input type="button" value="Return to previous page" onClick="javascript:history.go(-1)" />
		</form>';
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}

 ?>