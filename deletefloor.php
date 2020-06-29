
 <?php 
	include 'comm.php';

	$sql='DELETE FROM `floor` WHERE `floor`.`no` = '.$_POST['floorno'].' AND `floor`.`buid` = '.$_POST['buid'].' ';

	
	$result = $conn->query($sql);
	echo $result;
	// $sql = "SELECT * FROM room where buid=".$_POST['buid']." and floorno=".$_POST['floorno']."";

// 	if ($result->num_rows > 0) {
// 	  // output data of each row
// 	echo "<table border=1>
// <tr><th>room number</th><th>floor</th><th>building</th><th>room capacity</th></tr>
// 	";
// 	  while($row = $result->fetch_assoc()) {
// 	    echo "<tr><td>" . $row["no"]. " </td><td>" . $row["floorno"]. "</td><td>" . $row["buid"]. "</td><td>" . $row["capacity"]. "</td></tr>";
// 	  }
// 	  echo "</table>";
// 	} else {
// 	  echo "0 rooms";
// 	}
 ?>