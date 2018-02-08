<?php
	session_start();
	include('dbconnect.php');
	$fullname = '';
	$no_ba = '';
	$simpanan_wajib = 0;
	$simpanan_sukarela = 0;
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
	
	if( isset($_SESSION['role'])!="" ){
		if($_SESSION['role']!="anggota")
		  header("Location:login.php");
	}
	else
	{
		header("Location:login.php");
	}
	$strSQL = mysqli_query($connection,"select * from users where no_ba='".$no_ba."' ");
	if (!$strSQL) {
		printf("Error: %s\n", mysqli_error($connection));
		exit();
	}
	if(mysqli_num_rows($strSQL) > 0)
	{
		while($row = mysqli_fetch_assoc($strSQL)) {
			$simpanan_wajib = $row['simpanan_wajib'];
			$simpanan_sukarela = $row['simpanan_sukarela'];
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
		if($fullname != '')
		echo'
		<nav id="nav-menu-container">
			<ul class="nav-menu">
			  <li class="menu-active"><a href="./index.php">Beranda</a></li>
			  <li><a href="./profil.php">Profil</a></li>
			  
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
     <div class="profiletitle">Profil</div>
    </div>
	<div class="datauser">
		<table style="width:40%; padding:20px;">
			<tr>
				<td>Nomor BA</td>
				<td>: <?php echo $no_ba; ?></td>
			</tr>
			<tr>
				<td>Nama Lengkap</td>
				<td>: <?php echo $fullname; ?></td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td>
				<td>: <?php echo $jenis_kelamin; ?></td>
			</tr>
			<tr>
				<td>Tempat Lahir</td>
				<td>: <?php echo $tempat_lahir; ?></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>: <?php echo $alamat; ?></td>
			</tr>
			<tr>
				<td>Email</td>
				<td>: <?php echo $email; ?></td>
			</tr>
			<tr>
				<td>Kota</td>
				<td>: <?php echo $kota; ?></td>
			</tr>
			<tr>
				<td>No.KTP</td>
				<td>: <?php echo $no_ktp; ?></td>
			</tr>
			<tr>
				<td>Telepon</td>
				<td>: <?php echo $telepon; ?></td>
			</tr>
			<tr>
				<td>Pekerjaan</td>
				<td>: <?php echo $pekerjaan; ?></td>
			</tr>
			 <!--==========================
				Intro Section
				<tr>
				<td>Nama Istri/Suami</td>
				<td>: <?php echo $nama_wali; ?></td>
				</tr>
				<tr>
					<td>Motivasi Menjadi Anggota</td>
					<td>: <?php echo $motivasi; ?></td>
				</tr>
				<tr>
					<td>Diperkenalkan Oleh</td>
					<td>: <?php echo $referal; ?></td>
				</tr>
			  ============================-->
			
			
			<tr>
				<td>Simpanan Wajib</td>
				<td>: <?php echo 'Rp. ' . number_format( $simpanan_wajib, 0 , '' , ',' ); ?></td>
			</tr>
			<tr>
				<td>Simpanan Sukarela</td>
				<td>: <?php echo 'Rp. ' . number_format( $simpanan_sukarela, 0 , '' , ',' ); ?></td>
			</tr>
			<tr>
				<td>Jumlah Pinjaman</td>
				<td>: <?php echo 'Rp. ' . number_format( $pinjaman, 0 , '' , ',' ); ?></td>
			</tr>
			<tr>
				<td><a style="color:yellow;" href="./ubahprofil.php">Ubah Profil</a></td>
			</tr>
		</table>
	</div>
   

  </section><!-- #intro -->

  

  <!--==========================
    Footer
  ============================-->
  <!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
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
