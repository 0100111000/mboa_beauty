<?php

include('connect.php');


if($_POST["vue"] != ''){
   $update_query = "UPDATE demande SET notif=1 WHERE notif=0";
   mysqli_query($conn, $update_query);
}

$query = "SELECT * FROM demande ORDER BY id DESC LIMIT 4";
$result = mysqli_query($conn, $query);
$output = '';

if(mysqli_num_rows($result) > 0){
	while($row = mysqli_fetch_array($result)){
	  $output .= '
	  <li>
	  <a href="#">
	  <b>'.$row["nom"].'</b><br />
	  <small>'.$row["prix"].'</small>
	  </a>
	  </li>';
	}
}
else{
    $output .= '<li><a href="#">Aucune notification trouv�e</a></li>';
}

$status_query = "SELECT * FROM demande WHERE notif=0";
$result_query = mysqli_query($conn, $status_query);
$count = mysqli_num_rows($result_query);

$data = array(
   'notification' => $output,
   'new_notification'  => $count
);

echo json_encode($data);

?>