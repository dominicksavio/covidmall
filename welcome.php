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
                    Number of new buildings:<input type="number" name="numbuid">
                
            <input type="submit" name="submit" value="create building">
        </form>
    
    <?php
    include 'comm.php';
    
    $sql = "SELECT uid FROM building where admin='".$_SESSION['username']."'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      // output data of each row
    echo "<table border=1>
<tr><th>building number</th><th>edit building</th></tr>
    ";
      while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["uid"]. " </td><td><form action='access.php' method='POST'><input type='submit' value='edit'><input type='text' name='buid' hidden value='".$row['uid']."'></form></td></tr>";
      }
      echo "</table>";
    } else {
      echo "0 buildings";
    }


    if($_POST){
    
    

        $sql = "INSERT INTO building (uid,admin,buildingname)
        VALUES ";
        for($i=1;$i<=$_POST['numbuid'];$i++)
            if($i!=$_POST['numbuid'])
            {$sql.="('".$i."', '".$_SESSION['username']."'),";
            
            }
            else{
            $sql.="('".$i."', '".$_SESSION['username']."')";
            }
        if ($conn->query($sql) === TRUE) {
          echo "<br>New buildings created successfully";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }





    }?>
</body>
</html>