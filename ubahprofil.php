<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<?php
session_start();
include('dbconnect.php');
$_SESSION['pesan']='Ubah Profil';
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
$strSQL = mysqli_query($connection,"select * from users where no_ba='".$no_ba."' ");
if (!$strSQL) {
	printf("Error: %s\n", mysqli_error($connection));
	exit();
}
if(mysqli_num_rows($strSQL) > 0)
{
	while($row = mysqli_fetch_assoc($strSQL)) {
		$email = $row['email'];
		$fullname = $row['fullname'];
		$no_ba =  $row['no_ba'];
		$tempat_lahir =  $row['tempat_lahir'];
		$alamat =  $row['alamat'];
		$kota =  $row['kota'];
		$no_ktp =  $row['no_ktp'];
		$telepon =  $row['telepon'];
		$pekerjaan =  $row['pekerjaan'];
	}
}
if(isset($_POST['action']))
{          

    if($_POST['action']=="simpan")
    {
		$email = mysqli_real_escape_string($connection,$_POST['email']);
		$fullname = mysqli_real_escape_string($connection,$_POST['fullname']);
		$tempat_lahir =  mysqli_real_escape_string($connection,$_POST['tempat_lahir']);
		$alamat =  mysqli_real_escape_string($connection,$_POST['alamat']);
		$kota =  mysqli_real_escape_string($connection,$_POST['kota']);
		$no_ktp =  mysqli_real_escape_string($connection,$_POST['no_ktp']);
		$telepon =  mysqli_real_escape_string($connection,$_POST['telepon']);
		$pekerjaan =  mysqli_real_escape_string($connection,$_POST['pekerjaan']);
		
        $query = 	"UPDATE users 
					SET email='".$email."',
					fullname='".$fullname."',
					tempat_lahir='".$tempat_lahir."',
					alamat='".$alamat."',
					kota='".$kota."',
					no_ktp='".$no_ktp."',
					telepon='".$telepon."',
					pekerjaan='".$pekerjaan."'
					WHERE no_ba='".$no_ba."'";
        $strSQL = mysqli_query($connection, $query);
        if (!$strSQL) {
			printf("Error: %s\n", mysqli_error($connection));
			exit();
		}
		else
		{
			header("Location:profil.php");
			exit();
		}
		       
    }
    
}
 
?>
				
				
<!DOCTYPE html>
<html>
<head>
<title>Ubah Profil</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Credit Login / Register Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style_login.css" rel="stylesheet" type="text/css" media="all" />
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
<div class="main-agileits">
<!--form-stars-here-->
		<div class="form-w3-agile">
			
			  
                  

			<h2><?php
				echo $_SESSION['pesan'];
			?></h2>
			<form action="#" method="post">
				
				<div class="form-sub-w3">
					<input type="text" name="fullname" placeholder="Nama Lengkap " value="<?php echo $fullname ?>" required />
					<input type="text" name="tempat_lahir" placeholder="Tempat Lahir " value="<?php echo $tempat_lahir ?>" required />
					<input type="text" name="alamat" placeholder="Alamat " value="<?php echo $alamat ?>" required />
					<input type="text" name="email" placeholder="Email " value="<?php echo $email ?>" required />
					<input type="text" name="kota" placeholder="Kota " value="<?php echo $kota ?>" required />
					<input type="text" name="no_ktp" placeholder="No.KTP " value="<?php echo $no_ktp ?>" required />
					<input type="text" name="telepon" placeholder="Telepon " value="<?php echo $telepon ?>" required />
					<input type="text" name="pekerjaan" placeholder="Pekerjaan " value="<?php echo $pekerjaan ?>" required />
				</div>
				
				
				<div class="submit-w3l">
					<input name="action" type="hidden" value="simpan" />
					<input type="submit" value="Simpan">
				</div>
				<p class="p-bottom-w3ls"><a  href="./profil.php">Batal</a></p>
			</form>
		</div>
<!--//form-ends-here-->
</div>

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