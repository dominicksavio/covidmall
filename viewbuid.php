<?php 
if(strpos($_POST['name'],"request") !== false)
  header("location:verifymsg.php");

include 'comm.php';
    echo "<h2>Building : ".$_POST['name']."</h2>";
    $sql = "SELECT * FROM room where buid='".$_POST['buid']."' ORDER BY floorno,no";
    $result = $conn->query($sql);
    if($result!=null){
         if ($result->num_rows > 0) {
          // output data of each row
        echo "<table border=1>
                <tr>
                    <th>floor number</th>
                    <th>room number</th>
                    <th>building capacity</th>
                    <th colspan='2'>people entering</th>
                </tr>
        ";
        $i=0;
          while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["floorno"]. " </td>
                    <td>" . $row["no"]. " </td>
                    <td id='".$i."'>" . $row["capacity"]. " </td>
                    <td><button id='".$i."in' onclick='increase(\"".$i."\",\"".$row["capacity"]."\")'>increase</button></td>
                    <td><button id='".$i."de' onclick='decrease(\"".$i."\")'>decrease</button></td>
                </tr>";
                $i++;
          }
          echo "</table>";
          echo"
            <script>
            function increase(i,c){
              var x=parseInt(document.getElementById(i).innerHTML);
              c=parseInt(c);
              if(x<c)
                document.getElementById(i).innerHTML=x+1;
            }
            function decrease(i){
              var x=document.getElementById(i).innerHTML;
              if(x>0)
                document.getElementById(i).innerHTML=x-1;
            }
            </script>
          ";
        }
        
    echo'<form>
      <input type="button" value="Return to previous page" onClick="javascript:history.go(-1)" />
    </form>';
        echo "<a href='logout.php'>Logout</a>";
    
  //       $svgheight=500;
  //       $svgwidth=400;
  //       $height=150;
  //       $width=150;
  //       $x=140;
  //       $y=0;
  //       $rx=20;
  //       $ry=20;
  //       $cx=140;
  //       $cy=0;
  //       $r=10;
		// echo "
		// <input name>
		// <svg width=".$svgwidth." height=".$svgheight.">
		//   <rect x=".$x." y=".$y." rx=".$rx." ry=".$ry." width=".$width." height=".$height."
		//   style=\"fill:red;stroke:black;stroke-width:5;opacity:0.5\" />
		//   <circle cx=".$cx." cy=".$cy." r=".$r."
  // 			stroke=\"green\" stroke-width=\"1\" fill=\"yellow\" />
		// Sorry, your browser does not support inline SVG.
		// </svg>"; 
    }
 ?>