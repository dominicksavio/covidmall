<?php 
include 'comm.php';
include 'user.php';
// Check connection
session_start();
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if($_POST){

$sql = "SELECT * FROM `building` where uid=".$_POST['buid']."";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $username=$row['admin'];
    $buid=$row['uid'];
  }
}
$GLOBALS['buid']=$buid;

if(isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
	{

		echo'
		<h2>Create Floor</h2>
		<form action="floorcreate.php" method="POST">
			<table>
				<tr>
					<td>number of room:</td>
					<td><input type="text" name="noofroom"></td>
				</tr>
				<tr>
					<td>floor number:</td>
					<td><input type="text" name="floornumber"></td>
				</tr>
				<tr>
					<td>capacity:</td>
					<td><input type="text" name="capacity"></td>
				</tr>
			</table>
			<input type="text" name="buid" value="'.$_POST['buid'].'" hidden>
			<input type="submit" name="submit">
		</form>
		';
		
		$sql = "SELECT * FROM building where uid=$buid";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		  // output data of each row
			echo "<h3>Current User</h3>";
			echo "<table border=1>
				<tr><th>building id</th><th>user name</th></tr>
			";
		  while($row = $result->fetch_assoc()) {
		    echo "<tr><td>" . $row["uid"]. " </td><td>" . $row["admin"]. "</td></tr>";
		  }
		  echo "</table>";
		} else {
		  echo "0 buildings";
		}
		$sql = "SELECT * FROM floor where buid=$buid";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		  // output data of each row
			echo "<br><table border=1>
				<tr><th>floor</th><th>numbr of rooms</th><th>capacity of floor</th><th>building</th><th>display room</th><th>delete floor</th></tr>
			";
		  while($row = $result->fetch_assoc()) {
		    echo "<tr><td>" . $row["floorno"]. " </td><td>" . $row["noofroom"]. "</td><td>" . $row["capacity"]. "</td><td>" . $row["buid"]. "</td><td><form action='disproom.php' method='POST'><input type='submit' value='show rooms'><input type='text' name='buid' value='".$_POST['buid']."' hidden><input type='text' name='floorno' value='".$row['floorno']."' hidden></form></td><td><form action='deletefloor.php' method='POST'><input type='submit' value='delete'><input type='text' name='floorno' value='".$row["floorno"]."' hidden><input type='text' name='buid' value='".$row["buid"]."' hidden></form></td></tr>";
		  }
		  echo "</table>";
		  echo "<form action='building.php' method='POST'><input type='submit' value='completed building'><input type='text' name='buid' value='".$_POST["buid"]."' hidden></form>";
		} else {
		  echo "0 floors";
		}
	}
else{
	echo "err";
}
}
$conn->close();
?> 
