<?php
$dbname=$_POST['dbname'];
$conn = mysqli_connect("localhost","root","");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "CREATE DATABASE $dbname";
if (mysqli_query($conn, $sql)) {
    echo "Database created successfully with the name ".$dbname;
} else {
    echo "Error creating database: " . mysqli_error($conn);
}
echo "<form action='front.html'>
        <input type='submit' value='Return'>
       </form>" ;
mysqli_close($conn);
?>