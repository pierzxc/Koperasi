<?php
include('../dbconnect.php');

$return_arr = array();
$no_ba = $_GET["no_ba"];
$strSQL = mysqli_query($connection,"select * from users where no_ba='".$no_ba."' and role='anggota' ");

if(mysqli_num_rows($strSQL) > 0)
{
	while($row = mysqli_fetch_assoc($strSQL)) {
		$row_array['fullname'] = $row['fullname'];
		$row_array['alamat'] =  $row['alamat'];
		array_push($return_arr,$row_array);
	}
}

echo json_encode($return_arr);
?>
