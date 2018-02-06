<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<?php
session_start();
include('dbconnect.php');
$_SESSION['pesan']='SILAHKAN LOGIN';
if(isset($_POST['action']))
{          
    if($_POST['action']=="login")
    {
        $username = mysqli_real_escape_string($connection,$_POST['username']);
        $password = mysqli_real_escape_string($connection,$_POST['password']);
        $strSQL = mysqli_query($connection,"select role, no_ba, fullname from users where username='".$username."' and password='".md5($password)."' and role='admin'");
        if (!$strSQL) {
			printf("Error: %s\n", mysqli_error($connection));
			exit();
		}
		//$Results = mysqli_fetch_array($strSQL);
		$fullname = '';
		$role = '';
        if(mysqli_num_rows($strSQL) > 0)
        {
			while($row = mysqli_fetch_assoc($strSQL)) {
				$fullname = $row['fullname'];
				$role = $row['role'];
			}
            $message = $Results['no_ba']." Login Sucessfully!!";
			$_SESSION['fullname'] = $fullname;
			$_SESSION['no_ba'] = $no_ba;
			$_SESSION['role'] = $role;
			header("Location:index.php");
			exit();
        }
        else
        {
			$_SESSION['pesan']='USERNAME ATAU PASSWORD SALAH';
            $message = "Invalid username or password!!";
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
					<input type="text" name="username" placeholder="Username " required />
				<div class="icon-w3">
					<i class="fa fa-user" aria-hidden="true"></i>
				</div>
				</div>
				<div class="form-sub-w3">
					<input type="password" name="password" placeholder="Password" required />
				<div class="icon-w3">
					<i class="fa fa-unlock-alt" aria-hidden="true"></i>
				</div>
				</div>
				
				
				<div class="submit-w3l">
					<input name="action" type="hidden" value="login" />
					<input type="submit" value="Login">
				</div>
				<p class="p-bottom-w3ls"><a  href="./index.php">Kembali</a></p>
			</form>
		</div>
<!--//form-ends-here-->
</div>
<div id="small-dialog1" class="mfp-hide">
					<div class="contact-form1">
										<div class="contact-w3-agileits">
                                        
										

										<h3>Daftar</h3>
											<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
												<div class="form-sub-w3ls">
													<input name="username" placeholder="Username"  type="text" required>
													<div class="icon-agile">
														<i class="fa fa-user" aria-hidden="true"></i>
													</div>
												</div>
												<div class="form-sub-w3ls">
													<input name="email" placeholder="Email" class="mail" type="email" required>
													<div class="icon-agile">
														<i class="fa fa-envelope-o" aria-hidden="true"></i>
													</div>
												</div>
												<div class="form-sub-w3ls">
													<input name="fullname" placeholder="Nama Lengkap" type="text" required>
												</div>
												<div class="form-sub-w3ls">
													<input name="password" placeholder="Kata Sandi"  type="password" required>
													<div class="icon-agile">
														<i class="fa fa-unlock-alt" aria-hidden="true"></i>
													</div>
												</div>
												<div class="form-sub-w3ls">
													<input placeholder="Konfirmasi Kata Sandi"  type="password" required>
													<div class="icon-agile">
														<i class="fa fa-unlock-alt" aria-hidden="true"></i>
													</div>
												</div>
											</div>
											<div class="login-check">
								 			 <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><p>I Accept Terms & Conditions</p></label>
											</div>
										<div class="submit-w3l">
											<input name="action" type="hidden" value="signup" />
											<input type="submit" value="Daftar" name="btn-signup">
											
										</div>
										</form>
					</div>	
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