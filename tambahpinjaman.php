<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<?php
session_start();
include('dbconnect.php');
$_SESSION['pesan']='Tambah Data Pinjaman';
$no_ba = '';
$fullname = '';
$email = '';
$tempat_lahir = '';
$alamat = '';
$kota = '';
$no_ktp = '';
$telepon = '';
$pekerjaan = '';
$saldo = 0;
$fee = 0;
if( isset($_SESSION['no_ba'])!="" ){
	  $no_ba = $_SESSION['no_ba'];
}

if( isset($_SESSION['role'])!="" ){
	if($_SESSION['role']!="admin")
	  header("Location:adminlogin.php");
}
else
{
	header("Location:adminlogin.php");
}
$strSQL = mysqli_query($connection,"select * from config");

if(mysqli_num_rows($strSQL) > 0)
{
	while($row = mysqli_fetch_assoc($strSQL)) {
		$fee = floatval($row['fee'])*100;
	}
}
if(isset($_POST['action']))
{          

    if($_POST['action']=="simpan")
    {
		$no_ba = mysqli_real_escape_string($connection,$_POST['owner']);
		$besar_pinjaman = mysqli_real_escape_string($connection,$_POST['besar_pinjaman']);
		$jangka_waktu =  mysqli_real_escape_string($connection,$_POST['jangka_waktu']);
		$maksud_pinjaman =  mysqli_real_escape_string($connection,$_POST['maksud_pinjaman']);
		$besar_angsuran =  mysqli_real_escape_string($connection,$_POST['besar_angsuran']);
		$total_fee =  mysqli_real_escape_string($connection,$_POST['fee']);
		
		$strSQL = mysqli_query($connection,"select * from users where no_ba='".$no_ba."' and role='anggota' ");

		if(mysqli_num_rows($strSQL) > 0)
		{
			while($row = mysqli_fetch_assoc($strSQL)) {
				$saldo = floatval($row['simpanan_wajib']);
			}
		}
		

		
			$query = 	"insert into pinjaman(no_ba,besar_pinjaman,jangka_waktu,maksud_pinjaman,besar_angsuran,total_fee)
						values('".$no_ba."','".$besar_pinjaman."','".$jangka_waktu."','".$maksud_pinjaman."','".$besar_angsuran."','".$total_fee."')";
					
			/*$query .= 	"update users set 
						simpanan_wajib = simpanan_wajib + ".$simpanan_wajib.",  
						simpanan_wajib = simpanan_wajib - ".$penarikan.",  
						simpanan_sukarela = simpanan_sukarela + ".$simpanan_sukarela."
						where no_ba = ".$no_ba."";	*/		
			
			//$strSQL = mysqli_multi_query ( $connection , $query );
		    $strSQL = mysqli_query($connection, $query);
			if (!$strSQL) {
				//printf("Error: %s\n", mysqli_error($connection));
				//exit();
			}
			else
			{
			//	echo "<script>
			//	alert('Data Berhasil Disimpan');
			//	</script>";
				header("Location:tambahpinjaman.php?status=success");
				//exit();
				
			}
		
		
		       
    }
    
}
 
?>
				
				
<!DOCTYPE html>
<html>
<head>
<title>Tambah Data Pinjaman</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Credit Login / Register Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style_login.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style_admin.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font -->
<link href="//fonts.googleapis.com/css?family=Oswald:400,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

<!-- //web font -->
</head>
<body>
<h1><?php
	//echo $_SESSION['pesan'];
?></h1>
<div class="main-agileits2">
<!--form-stars-here-->
		<div class="form-w3-agile">
			
			  
                  

			<h2><?php
				echo $_SESSION['pesan'];
			?></h2>
			<form action="#" method="post" id="formtambah">
				 <?php
					if( isset($_GET['status'])!="" ){
						if($_GET['status']=="success")
							echo "
								<div class=\"alert\">
								  <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span>
								  Data berhasil disimpan
								</div>
							";
						if($_GET['status']=="saldokurang")
							echo "
								<div class=\"alertnegative\">
								  <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span>
								  Saldo Tidak Mencukupi
								</div>
							";
					}
					
				?>
				<div class="form-sub-w3">
				
					<table style="width:80%; padding:20px;">
						<tr>
							<td>Nomor BA</td>
							<td>: <select onchange="onSelectedNoBa()" name="owner" id="soflow" form="formtambah" required>
								<option value="" disabled selected>Pilih</option>
								<?php 
								$sql = mysqli_query($connection, "SELECT no_ba FROM users where role='anggota'");
								while ($row = $sql->fetch_assoc()){
								echo "<option value=" . $row['no_ba'] . ">" . $row['no_ba'] . "</option>";
								}
								?>
							</select></td>
						</tr>
						<tr>
							<td>Nama Anggota</td>
							<td>:<p style="display:inline" class="labeldata" id="nama">-</p></td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td>:<p style="display:inline" class="labeldata" id="alamat">-</p></td>
						</tr>
						
						<tr>
							<td>Besar Pinjaman</td>
							<td>:<p style="display:inline" class="labeldata">Rp.</p><input onchange="onChangeText()" onkeyup="this.onchange();" onpaste="this.onchange();" oninput="this.onchange();" id="besar_pinjaman" style="width:150px;" type="text" value="0" name="besar_pinjaman" required /></td>
						</tr>
						<tr>
							<td>Jangka Waktu</td>
							<td>:<input class="labeldata" style="width:40px;" type="number" value="0" name="jangka_waktu" required /><p style="display:inline; margin-left:10px;" >Bulan</p></td>
						</tr>
						<tr>
							<td>Maksud Pinjaman</td>
							<td>:<input class="labeldata" style="width:600px;" type="text" name="maksud_pinjaman" required /></td>
						</tr>
						<tr>
							<td>Besar Angsuran</td>
							<td>:<p style="display:inline" class="labeldata">Rp.</p><input  style="width:150px;" type="text" value="0" name="besar_angsuran" required /></td>
						</tr>
						<script>
							
							function onChangeText()
							{
								var fee = "<?php echo $fee; ?>";
								var besar_pinjaman = $("#besar_pinjaman").val();
								var total_fee = (fee*besar_pinjaman)/100;
								$("#fee").val(total_fee);
							}
						</script>
						<tr>
							<td>Fee <?php echo $fee?>%</td>
							<td>:<p style="display:inline" class="labeldata">Rp.</p><input readonly="readonly" id="fee" style="width:150px;" type="text" value="0" name="fee" required /></td>
						</tr>
					</table>
					

				</div>
				
				<style>
					.alert {
						padding: 20px;
						background-color: #77f442; /* Red */
						color: black;
						margin-bottom: 15px;
					}
					.alertnegative{
						padding: 20px;
						background-color: red; /* Red */
						color: white;
						margin-bottom: 15px;
					}
					/* The close button */
					.closebtn {
						margin-left: 15px;
						color: black;
						font-weight: bold;
						float: right;
						font-size: 22px;
						line-height: 20px;
						cursor: pointer;
						transition: 0.3s;
					}

					/* When moving the mouse over the close button */
					.closebtn:hover {
						color: white;
					} 
				</style>
				
				
				<div class="submit-w3l">
					<input name="action" type="hidden" value="simpan" />
					<input type="submit" value="Simpan">
				</div>
				<p class="p-bottom-w3ls"><a  href="./index.php">Kembali</a></p>
			</form>
		</div>
<!--//form-ends-here-->
</div>

	<script type="text/javascript" src="js/admin2.js"></script>
<!-- copyright -->
	
	<!-- //copyright --> 
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<!-- pop-up-box -->  
		<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
	<!--//pop-up-box -->
	<script>
		$(document).ready(function() {
		$('.w3_play_icon,.w3_play_icon1,.w3_play_icon2').magnificPopup({
			type: 'inline',
			fixedContentPos: false,
			fixedBgPos: true,
			overflowY: 'auto',
			closeBtnInside: true,
			preloader: false,
			midClick: true,
			removalDelay: 300,
			mainClass: 'my-mfp-zoom-in'
		});
																		
		});
	</script>
</body>
</html>