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
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to Covidmall.</h1>
    </div>
    <p>
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>
    
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" style="margin: auto;width: 50%;padding: 10px;">
                    Building Name: <input type="text" name="buidname" required>
                
            <input type="submit" name="submit" value="create building">
        </form>
    
    <?php
    include 'comm.php';
    $buid=array();
    $sql = "SELECT * FROM building where user='".$_SESSION['username']."'";
    $result = $conn->query($sql);
    if($result!=null){
        if ($result->num_rows > 0) {
          // output data of each row
        echo "<table border=1>
                <tr>
                    <th>building number</th>
                    <th>building name</th>
                    <th>edit building</th>
                    <th>view building</th>
                </tr>
        ";
          while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["uid"]. " </td>
                    <td>" . $row["buildingname"]. " </td>
                    <td>
                        <form action='access.php' method='POST'>
                            <input type='submit' value='edit'>
                            <input type='text' name='buid' hidden value='".$row['uid']."'>
                        </form>
                    </td>
                    <td>
                        <form action='viewbuid.php' method='POST'>
                            <input type='submit' value='view'>
                            <input type='text' name='buid' hidden value='".$row['uid']."'>
                            <input type='text' name='name' hidden value='".$row['buildingname']."'>
                        </form>
                    </td>
                </tr>";
                array_push($buid,$row["buildingname"]);
          }
          echo "</table>";
        } 
    }
    for($i=0;$i<count($buid);$i++){
        $sql = "SELECT * FROM building WHERE buildingname LIKE '".$buid[$i]." request'";
        $result = $conn->query($sql);
        if($result!=null){
            if ($result->num_rows > 0) {
              // output data of each row
            echo "
                <h3>Viewer Requests</h3>
                <table border=1>
                    <tr>
                        <th>user name</th>
                        <th>building number</th>
                        <th>building name</th>
                        <th>accept request</th>
                    </tr>
            ";
              while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["user"]. " </td>
                        <td>" . $row["uid"]. " </td>
                        <td>" . substr( $row["buildingname"],0,-8). " </td>
                        <td>
                            <form action='updateviewreq.php' method='POST'>
                                <input type='submit' value='accept'>
                                <input type='text' name='buid' hidden value='".$row['uid']."'>
                                <input type='text' name='user' hidden value='".$row['user']."'>
                                <input type='text' name='name' hidden value='".substr( $row["buildingname"],0,-8)."'>
                            </form>
                        </td>
                    </tr>";
              }
              echo "</table>";
            } 
        }
    }

    if($_POST){
    
        $sql = "SELECT COUNT(DISTINCT buildingname) as num FROM building";
        $result = $conn->query($sql);
            if($result!=null){
                while($row = $result->fetch_assoc()) {
                    $id=$row['num']+1;
                    $sql = "INSERT INTO building (uid,user,buildingname)
                    VALUES ('".$id."','".$_SESSION['username']."','".$_POST['buidname']."')";
                    
                        
                    if ($conn->query($sql) === TRUE) {
                      echo "<br>New buildings created successfully<br>";
                      header("location:welcome.php");
                    } else {
                      echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                }
        }



    }?>
</body>
</html>