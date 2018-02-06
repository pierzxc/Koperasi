<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<?php
session_start();
include('dbconnect.php');
$_SESSION['pesan']='Tambah Data Simpanan';
$no_ba = '';
$fullname = '';
$email = '';
$tempat_lahir = '';
$alamat = '';
$kota = '';
$no_ktp = '';
$telepon = '';
$pekerjaan = '';

if( isset($_SESSION['no_ba'])!="" ){
	  $no_ba = $_SESSION['no_ba'];
}
if(isset($_POST['action']))
{          

    if($_POST['action']=="simpan")
    {
		$no_ba = mysqli_real_escape_string($connection,$_POST['owner']);
		$simpanan_wajib = mysqli_real_escape_string($connection,$_POST['simpanan_wajib']);
		$simpanan_sukarela =  mysqli_real_escape_string($connection,$_POST['simpanan_sukarela']);
		$penarikan =  mysqli_real_escape_string($connection,$_POST['penarikan']);
		
		  
        $query = 	"insert into simpanan(no_ba,simpanan_wajib,simpanan_sukarela,penarikan)
					values('".$no_ba."','".$simpanan_wajib."','".$simpanan_sukarela."','".$penarikan."')";
					
        $strSQL = mysqli_query($connection, $query);
        if (!$strSQL) {
			printf("Error: %s\n", mysqli_error($connection));
			exit();
		}
		else
		{
			echo "<script>
			alert('Data Berhasil Disimpan');
			</script>";
			//header("Location:tambahsimpanan.php");
			//exit();
			
		}
		       
    }
    
}
 
?>
				
				
<!DOCTYPE html>
<html>
<head>
<title>Tambah Data Simpanan</title>
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
				
				<div class="form-sub-w3">
					<table style="width:60%; padding:20px;">
						<tr>
							<td>Nomor BA</td>
							<td>: <select onchange="onSelectedNoBa()" name="owner" id="soflow" form="formtambah">
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
							<td>:<p style="display:inline" class="labeldata" id="nama"></p></td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td>:<p style="display:inline" class="labeldata" id="alamat"></p></td>
						</tr>
						<tr>
							<td>Simpanan Wajib</td>
							<td>:<p style="display:inline" class="labeldata">Rp.</p><input style="width:150px;" type="text" name="simpanan_wajib" required /></td>
						</tr>
						<tr>
							<td>Simpanan Sukarela</td>
							<td>:<p style="display:inline" class="labeldata">Rp.</p><input style="width:150px;" type="text" name="simpanan_sukarela" required /></td>
						</tr>
						<tr>
							<td>Penarikan</td>
							<td>:<p style="display:inline" class="labeldata">Rp.</p><input style="width:150px;" type="text" name="penarikan" required /></td>
						</tr>
					</table>
					

				</div>
				
				
				<div class="submit-w3l">
					<input name="action" type="hidden" value="simpan" />
					<input type="submit" value="Simpan">
				</div>
				<p class="p-bottom-w3ls"><a  href="./index.php">Batal</a></p>
			</form>
		</div>
<!--//form-ends-here-->
</div>

	<script type="text/javascript" src="js/admin.js"></script>
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