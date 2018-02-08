<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<?php
session_start();
include('dbconnect.php');
$_SESSION['pesan']='Tambah Anggota';
$no_ba = '';
$fullname = '';
$email = '';
$tempat_lahir = '';
$alamat = '';
$kota = '';
$no_ktp = '';
$telepon = '';
$pekerjaan = '';
$nama_wali = '';
$motivasi = '';
if( isset($_SESSION['role'])!="" ){
	if($_SESSION['role']!="admin")
	  header("Location:adminlogin.php");
}
else
{
	header("Location:adminlogin.php");
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
		$nama_wali =  mysqli_real_escape_string($connection,$_POST['nama_wali']);
		$password =  mysqli_real_escape_string($connection,$_POST['password']);
		$konfirmpassword =  mysqli_real_escape_string($connection,$_POST['konfirmpassword']);
		
        $query = "SELECT email FROM users where email='".$email."'";
        $result = mysqli_query($connection,$query);
        $numResults = mysqli_num_rows($result);
		if($password != $konfirmpassword)
		{
			$_SESSION['pesan']='KONFIRMASI PASSWORD SALAH';
		}
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) // Validate email address
        {
            $message =  "Invalid email address please type a valid email!!";
			$_SESSION['pesan']='EMAIL TIDAK VALID';
        }
        elseif($numResults>=1)
        {
            $message = $email." Email already exist!!";
			$_SESSION['pesan']='REGISTRASI GAGAL, EMAIL SUDAH TERDAFTAR';
        }
        else
        {
			$addquery = "insert into users(role,tempat_lahir,alamat,kota,no_ktp,telepon,pekerjaan,nama_wali,email,password,fullname)
						values('anggota','".$tempat_lahir."','".$alamat."','".$kota."','".$no_ktp."','".$telepon."','".$pekerjaan."','".$nama_wali."','".$email."','".md5($password)."','".$fullname."')";
            mysqli_query($connection,$addquery);
            $message = "Signup Sucessfully!!";
			
			$no_ba = '';
			$query = "SELECT no_ba FROM users where email='".$email."'";
			$strSQL = mysqli_query($connection,$query);
			if (!$strSQL) {
				printf("Error: %s\n", mysqli_error($connection));
				exit();
			}
			if(mysqli_num_rows($strSQL) > 0)
			{
				while($row = mysqli_fetch_assoc($strSQL)) {
					$no_ba = $row['no_ba'];
				}
				$_SESSION['pesan']="ANGGOTA BERHASIL DITAMBAHKAN, NOMOR BA : ".$no_ba."";
			}
		
			
			
			
        }
		       
    }
    
}
 
?>
				
				
<!DOCTYPE html>
<html>
<head>
<title>Tambah Anggota</title>
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
					<input type="text" name="fullname" placeholder="Nama Lengkap " required />
					<input type="text" name="tempat_lahir" placeholder="Tempat Lahir " required />
					<input type="text" name="alamat" placeholder="Alamat " required />
					<input type="text" name="email" placeholder="Email " required />
					<input type="Password" name="password" placeholder="Password " required />
					<input type="Password" name="konfirmpassword" placeholder="Konfirmasi Password " required />
					<input type="text" name="kota" placeholder="Kota " required />
					<input type="text" name="no_ktp" placeholder="No.KTP " required />
					<input type="text" name="telepon" placeholder="Telepon " required />
					<input type="text" name="pekerjaan" placeholder="Pekerjaan " required />
					<input type="text" name="nama_wali" placeholder="Nama Suami/Istri " required />
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