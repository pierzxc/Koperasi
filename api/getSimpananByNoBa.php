<?php
include('../dbconnect.php');

$return_arr = array();
$no_ba = $_GET["no_ba"];
$strSQL = mysqli_query($connection,"select * from simpanan where no_ba='".$no_ba."'");

if(mysqli_num_rows($strSQL) > 0)
{
	while($row = mysqli_fetch_assoc($strSQL)) {
		$row_array['nomor_transaksi'] = $row['id_transaksi'];
		$row_array['tanggal_transaksi'] =  $row['tanggal_transaksi'];
		$row_array['no_ba'] =  $row['no_ba'];
		$row_array['simpanan_wajib'] =  $row['simpanan_wajib'];
		$row_array['simpanan_sukarela'] =  $row['simpanan_sukarela'];
		$row_array['penarikan'] =  $row['penarikan'];
		array_push($return_arr,$row_array);
	}
}

echo json_encode($return_arr);
?>
