<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
	.darkly{background:#444444;}
    </style>
</head>

<body class="bg-dark">
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card darkly">
            <div class="card-header text-center darkly"><img class="logo-img img-fluid" src="assets/images/logo.png" alt="logo"></a>
	
	<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
		#$browser = get_browser(null, true);
		#print_r($browser);

		if(isset($_GET['msg'])){
			$msg=$_GET['msg'];
			if($msg=="afail1"){

				echo '<div class="alert alert-danger" role="alert">Username or password incorrect. Each error increases the waiting time by one second before the next attempt.</div>';
			}
			if($msg=="afail2"){
				echo '<div class="alert alert-danger" role="alert">Please login to access this page.</div>';
			}
			if($msg=="afail3"){
                                echo '<div class="alert alert-danger" role="alert"> Your session has expired.</div>';
                        }
			if($msg=="disconnected"){
				echo '<div class="alert alert-info" role="alert">You has been disconnected</div>';
			}
		}
		else{
			echo '<div class="alert alert-primary" role="alert">Please enter your user information.</div>';
		}
	?></div>
            <div class="card-body">
                <form name="login" action="connection.php" method="post">
                    <div class="form-group">
                        <input class="form-control form-control-lg" name="username" id="username" type="text" placeholder="Username" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" name="password" id="password" type="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox"><span class="custom-control-label">Remember Me</span>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-success btn-lg btn-block">Sign in</button>
                </form>
            </div>
            <div class="card-footer bg-white p-0  ">
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="index.php" class="footer-link">Create An Account</a></div>
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="#" class="footer-link">Forgot Password</a>
                </div>
            </div>
        </div>
    </div>
  
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>
 
</html>

