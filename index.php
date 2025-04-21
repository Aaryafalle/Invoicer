<?php 
session_start();
include('header.php');
$loginError = '';
if (!empty($_POST['email']) && !empty($_POST['pwd'])) {
	include 'Invoice.php';
	$invoice = new Invoice();
	$user = $invoice->loginUsers($_POST['email'], $_POST['pwd']); 
	if(!empty($user)) {
		$_SESSION['user'] = $user[0]['first_name']." ".$user[0]['last_name'];
		$_SESSION['userid'] = $user[0]['id'];
		$_SESSION['email'] = $user[0]['email'];		
		$_SESSION['address'] = $user[0]['address'];
		$_SESSION['mobile'] = $user[0]['mobile'];
		header("Location:invoice_list.php");
	} else {
		$loginError = "Invalid Email or Password!";
	}
}
?>
<title>Invoicer</title>
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
<script src="js/invoice.js"></script>
<link href="css/style.css" rel="stylesheet">
        <style type="text/css">
            body {
                background-image: url('img/background1.jpg');
            }
                .form-control {
                    height: 50px;
                    border-radius: 50px;
                    border: none;
                    padding-left: 1.5rem;
                    padding-right: 1.5rem;
                    margin-top: 1.5rem;
                    /*background: rgba(255, 255, 255, 0.8);*/
                    background-image: url('img/background1.jpg');
                    color: #000;
                }
        </style>

        <div class="card1 row login-form-row">
<!--            <div class="demo-heading">-->
<!--                <h2 class="text-white text-center">Welcome to Invoicer</h2>-->
<!--            </div>-->
            <div class="login-form">
                <h1 class="text-center">Welcome to Invoicer</h1>
                <br>
                <h2>Login</h2>
                <form method="post" action="">
                    <div class="form-group">
                        <?php if ($loginError ) { ?>
                            <div class="alert alert-warning"><?php echo $loginError; ?></div>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <input name="email" id="email" type="email" class="form-control" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="pwd" placeholder="Password" required>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" name="login" class="btn btn-login">Sign In</button>
                    </div>
                </form>
                <br>
            </div>
                <div class="col-lg-12 text-center">
                    <div class="copyright-text">
                        <p>
                            Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved 
                    </div>
                </div>
        </div>