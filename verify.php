<?php 
session_start();
if((!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)&&(!strcmp($_SESSION['privilage'],'superadmin'))){
    header("location: index.php");
    exit;
}
require_once "comm.php";
$sql = "SELECT id, username, privilage FROM users WHERE privilage LIKE '%request'";
$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
	  // output data of each row
	echo "<table style=\"width:100%\" border=1>
			<tr>
				<th>uid</th>
				<th>username</th>
				<th>privilage</th>
				<th>accept/deny</th>
			</tr>";
	  while($row = mysqli_fetch_assoc($result)) {
	    echo "<tr>
	    		<td>" . $row["id"]. "</td>
	    		<td>" . $row["username"]. "</td>
	    		<td>" . $row["privilage"]. "</td>
	    		<td> 
	    			<form action='accept.php' method='POST'>
	    				<input type='text' name='id' value='".$row["id"]."' hidden>
	    				<input type='text' name='priv' value='".substr( $row["privilage"],0,-8)."' hidden>
	    				<input type='submit' name='submit' value='accept'>
	    			</form> 
	    		</td>
	    	</tr>";
	  }
	  echo "</table>";
	} 
	
else {
  echo "0 results";
  header("location:index.php");
}
echo "<a href='welcomeadmin.php'>Welcome</a><br>";
echo "<a href='logout.php'>Logout</a>";
mysqli_close($conn);
 ?>