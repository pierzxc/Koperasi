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
if(isset($_POST['action']))
{          
    if($_POST['action']=="login")
    {
        $username = mysqli_real_escape_string($connection,$_POST['username']);
        $password = mysqli_real_escape_string($connection,$_POST['password']);
        $strSQL = mysqli_query($connection,"select username, fullname from users where username='".$username."' and password='".md5($password)."'");
        if (!$strSQL) {
			printf("Error: %s\n", mysqli_error($connection));
			exit();
		}
		//$Results = mysqli_fetch_array($strSQL);
		$fullname = '';
        if(mysqli_num_rows($strSQL) > 0)
        {
			while($row = mysqli_fetch_assoc($strSQL)) {
				$fullname = $row['fullname'];
			}
            $message = $Results['username']." Login Sucessfully!!";
			$_SESSION['fullname'] = $fullname;
			$_SESSION['username'] = $username;
			header("Location:index.php");
			exit();
        }
        else
        {
			$_SESSION['pesan']='USERNAME ATAU PASSWORD SALAH';
            $message = "Invalid username or password!!";
        }        
    }
    elseif($_POST['action']=="signup")
    {
        $name       = mysqli_real_escape_string($connection,$_POST['username']);
        $email      = mysqli_real_escape_string($connection,$_POST['email']);
        $password   = mysqli_real_escape_string($connection,$_POST['password']);
		$fullname   = mysqli_real_escape_string($connection,$_POST['fullname']);
        $query = "SELECT email FROM users where email='".$email."'";
        $result = mysqli_query($connection,$query);
        $numResults = mysqli_num_rows($result);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) // Validate email address
        {
            $message =  "Invalid email address please type a valid email!!";
        }
        elseif($numResults>=1)
        {
            $message = $email." Email already exist!!";
			$_SESSION['pesan']='REGISTRASI GAGAL, EMAIL SUDAH TERDAFTAR';
        }
        else
        {
            mysqli_query($connection,"insert into users(username,email,password,fullname) values('".$name."','".$email."','".md5($password)."','".$fullname."')");
            $message = "Signup Sucessfully!!";
			$_SESSION['pesan']='REGISTRASI ANDA BERHASIL, SILAHKAN LOGIN';
        }
    }
}
 
?>
				
				
<!DOCTYPE html>
<html>
<head>
<title>Login</title>
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
					<input type="text" name="jenis_kelamin" placeholder="Jenis Kelamin " required />
					<input type="text" name="jenis_kelamin" placeholder="Jenis Kelamin " required />
				</div>
				<div class="form-sub-w3">
					<input type="text" name="password" class="mail" placeholder="Email" required />
			
				</div>
				
				
				<div class="submit-w3l">
					<input name="action" type="hidden" value="login" />
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