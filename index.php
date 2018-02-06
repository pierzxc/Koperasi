<?php
	session_start();
	$fullname = '';
	$role = '';
	if( isset($_SESSION['fullname'])!="" ){
	  $fullname = $_SESSION['fullname'];
	}
	if( isset($_SESSION['role'])!="" ){
	  $role = $_SESSION['role'];
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
  <link href="css/style.css" rel="stylesheet">

  <!-- =======================================================
    Theme Name: Avilon
    Theme URL: https://bootstrapmade.com/avilon-bootstrap-landing-page-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
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
		if($fullname != '' && $role == 'anggota')
		{
			echo'
			<nav id="nav-menu-container">
				<ul class="nav-menu">
				  <li class="menu-active"><a href="./index.php">Beranda</a></li>
				  <li><a href="./profil.php">Profil</a></li>
				  <li><a href="./logout.php">Logout</a></li>
				</ul>
			  </nav>
			';
		}
		else if($fullname != '' && $role == 'admin')
		{
			echo'
			<nav id="nav-menu-container">
				<ul class="nav-menu">
				  <li class="menu-active"><a href="./index.php">Beranda</a></li>
				  <li class="menu-has-children"><a href="#">Menu</a>
					<ul>
					  <li><a href="./tambahsimpanan.php">Tambah Data Simpanan</a></li>
					  <li><a href="./tambahanggota.php">Tambah Anggota</a></li>
					</ul>
				  </li>
				  <li><a href="./logout.php">Logout</a></li>
				</ul>
			  </nav>
			';
		}
		else
		echo'
		<nav id="nav-menu-container">
			<ul class="nav-menu">
			  <li class="menu-active"><a href="./login.php">Login</a></li>
			  
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
      <h2>Selamat Datang <?php echo $fullname; ?></h2>
      <p></p>
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
