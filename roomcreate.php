<?php 
	include 'comm.php';
	$cap=intval(0);

	$sql = "INSERT INTO room (no,floorno,buid,capacity)

	VALUES ";
	$org=intval($_POST['capacityoffloor']);
	
	for($i=1;$i<=$_POST['noofroom'];$i++)
	{
		if(strcmp($_POST['area'.$i.''],"FT")==0)
			$_POST['capacity'.$i.'']=$_POST['capacity'.$i.'']/(3.14*6*6);
		if(strcmp($_POST['area'.$i.''],"MT")==0)
			$_POST['capacity'.$i.'']=$_POST['capacity'.$i.'']/(3.14*1.8288*1.8288);
				if($i!=$_POST['noofroom'])
				{$sql.="( '".$i."','".$_POST['floorno']."', '".$_POST['buid']."', '".$_POST['capacity'.$i.'']."'),";
				$cap+=$_POST['capacity'.$i.''];
				}
				else{
				$sql.="( '".$i."','".$_POST['floorno']."', '".$_POST['buid']."', '".$_POST['capacity'.$i.'']."')";
				$cap+=$_POST['capacity'.$i.''];
				}
	}
	$cap=intval($cap);
	if($org>=$cap){
			if ($conn->query($sql) === TRUE) {
			  header("location: welcome.php");
			} else {
			  echo "Error: " . $sql . "<br>" . $conn->error;
			}
	}
	else{
		echo"exceeded capacity";
	}
		echo'<form>
			<input type="button" value="Return to previous page" onClick="javascript:history.go(-1)" />
		</form>';
 ?>