<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
    </div>
    <p>
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>
    
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" style="margin: auto;width: 50%;padding: 10px;">
                    Building Name: <input type="text" name="buidname" required>
                
            <input type="submit" name="submit" value="view building request">
        </form>
    
    <?php
    include 'comm.php';
    
    $sql = "SELECT * FROM building where user='".$_SESSION['username']."'";
    $result = $conn->query($sql);
    if($result!=null){
        if ($result->num_rows > 0) {
          // output data of each row
        echo "<table border=1>
                <tr>
                    <th>building number</th>
                    <th>building name</th>
                    <th>view building</th>
                </tr>
        ";
          while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["uid"]. " </td>
                    <td>" . $row["buildingname"]. " </td>
                    <td>
                        <form action='viewbuid.php' method='POST'>
                            <input type='submit' value='view'>
                            <input type='text' name='buid' hidden value='".$row['uid']."'>
                            <input type='text' name='name' hidden value='".$row['buildingname']."'>
                        </form>
                    </td>
                </tr>";
          }
          echo "</table>";
        } 
    }

    if($_POST){
        $sql = "SELECT uid FROM building WHERE buildingname='".$_POST['buidname']."'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {

                $sql = "INSERT INTO building (uid,user,buildingname)
                VALUES ('".$row['uid']."','".$_SESSION['username']."','".$_POST['buidname']." request')";
                
                    
                if ($conn->query($sql) === TRUE) {
                  echo "<br>New buildings created successfully<br>";
                  header("location:view.php");
                  // echo $sql;
                } else {
                  echo "Error: " . $sql . "<br>" . $conn->error;
                }
                break;
            }
        }
    }
?>
</body>
</html>