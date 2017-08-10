

<?php
include("config.php");
$i=0;
$result = mysqli_query($conn,"SELECT * FROM adsentry");
  while($row = $result->fetch_assoc()) {
 
foreach($row as $x => $x_value) {
    echo "Key=" . $x . ", Value=" . $x_value;
    echo "<br>";
}

}


?>