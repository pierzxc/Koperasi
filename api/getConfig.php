<?php
include('../dbconnect.php');

$return_arr = array();
$strSQL = mysqli_query($connection,"select * from config");

if(mysqli_num_rows($strSQL) > 0)
{
	while($row = mysqli_fetch_assoc($strSQL)) {
		$row_array['fee'] = $row['fee'];
		array_push($return_arr,$row_array);
	}
}

echo json_encode($return_arr);
?>
