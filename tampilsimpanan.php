<?php
	session_start();
	include('dbconnect.php');
	$fullname = '';
	$no_ba = '';
	$saldo = 0;
	$pinjaman = 0;
	$email = '';
	
	$jenis_kelamin = '';
	$tempat_lahir = '';
	$alamat = '';
	$kota = '';
	$no_ktp = '';
	$telepon = '';
	$pekerjaan = '';
	$nama_wali = '';
	$motivasi = '';
	$referal = '';
	
	if( isset($_SESSION['no_ba'])!="" ){
	  $no_ba = $_SESSION['no_ba'];
	}
	
	$strSQL = mysqli_query($connection,"select * from users where no_ba='".$no_ba."' ");
	if (!$strSQL) {
		printf("Error: %s\n", mysqli_error($connection));
		exit();
	}
	if(mysqli_num_rows($strSQL) > 0)
	{
		while($row = mysqli_fetch_assoc($strSQL)) {
			$saldo = $row['saldo'];
			$pinjaman = $row['pinjaman'];
			$email = $row['email'];
			$fullname = $row['fullname'];
			$no_ba =  $row['no_ba'];
			$jenis_kelamin =  $row['jenis_kelamin'];
			$tempat_lahir =  $row['tempat_lahir'];
			$alamat =  $row['alamat'];
			$kota =  $row['kota'];
			$no_ktp =  $row['no_ktp'];
			$telepon =  $row['telepon'];
			$pekerjaan =  $row['pekerjaan'];
			$nama_wali =  $row['nama_wali'];
			$motivasi =  $row['motivasi'];
			$referal =  $row['referal'];
	
			$_SESSION['email'] = $email;
		}
	}
		
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Sistem Informasi Koperasi</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700|Open+Sans:300,300i,400,400i,700,700i" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/aos/aos.css" rel="stylesheet">
  <link href="lib/magnific-popup/magnific-popup.css" rel="stylesheet">


  <!-- Main Stylesheet File -->
  <link rel="stylesheet" type="text/css" href="css/style2.css" >
  <link href="css/profil.css" rel="stylesheet">
  <link href="css/simpanan.css" rel="stylesheet">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <!-- =======================================================
    Theme Name: Avilon
    Theme URL: https://bootstrapmade.com/avilon-bootstrap-landing-page-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
  
  <script type="text/javascript">
		function ubahnama() {
			//var x = document.getElementById("txtnama");
		//	var editnama = document.getElementById("editnama");
			//if (x.style.display === "none") {
			//	x.style.display = "block";
			//	editnama.style.display = "none";
			//} else {
		//	/	x.style.display = "none";
		//		editnama.style.display = "block";
		///	}
		}
  </script>
</head>

<body>

  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <h1><a href="#intro" class="scrollto">Koperasi</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="#intro"><img src="img/logo.png" alt="" title="" /></img></a> -->
      </div>
	
	<?php
		echo'
		<nav id="nav-menu-container">
			<ul class="nav-menu">
			  <li class="menu-active"><a href="./index.php">Beranda</a></li>
			  
			</ul>
		  </nav>
		';
	?>
      <!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <!--==========================
    Intro Section
  ============================-->
  <section id="intro">

    <div class="intro-text">
     <div class="profiletitle">Data Simpanan</div>
    </div>
	<div class="datauser" style="height:500px;">
		<table style="width:40%; padding:20px;">
			<tr>
				<td>Nomor BA</td>
				<td>: <select onchange="onSelectedNoBaSimpanan()" name="owner" id="soflow" form="formtambah">
					<option value="" disabled selected>Pilih</option>
					<?php 
					$sql = mysqli_query($connection, "SELECT no_ba FROM users where role='anggota'");
					while ($row = $sql->fetch_assoc()){
					echo "<option value=" . $row['no_ba'] . ">" . $row['no_ba'] . "</option>";
					}
					?>
				</select></td>
			</tr>
			
		</table>
		<table id="simpanancontainer" class="w3-white" style="width:90%; padding:20px;">
			
		</table>
	</div>
   

  </section><!-- #intro -->

  

  <!--==========================
    Footer
  ============================-->
  <!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script type="text/javascript" src="js/admin.js"></script>
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/aos/aos.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="lib/magnific-popup/magnific-popup.min.js"></script>

  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>

</body>
</html>
