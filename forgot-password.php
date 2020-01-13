<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Concept - Bootstrap 4 Admin Dashboard Template</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/libs/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
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
    </style>
</head>
<!-- ============================================================== -->
<!-- signup form  -->
<!-- ============================================================== -->

<body>
    <!-- ============================================================== -->
    <!-- signup form  -->
    <!-- ============================================================== -->
    <form class="splash-container" action="tools/change_password.php" method="post">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-1">You forgot your password</h3>
                <p>Don't worry we will change it. Go to your Bramble to get the recovery code related to your account name. You will find it at :</p>
		<div class="alert alert-info" role="alert">"Settings" -> "Display code to reset password (web)"</div>
		<?php
			if(isset($_GET['msg'])){
		                $msg=$_GET['msg'];
		                if($msg=="error_user"){
		                        echo '<div class="alert alert-danger" role="alert">Username field is empty.</div>';
		                }
		                if($msg=="error_code1"){
		                        echo '<div class="alert alert-danger" role="alert">Recovery code field is empty.</div>';
		                }
		                if($msg=="error_code2"){
		                        echo '<div class="alert alert-danger" role="alert">Bad recovery code format</div>';
		                }
		                if($msg=="error_code3"){
		                        echo '<div class="alert alert-danger" role="alert">Recovery code invalid!</div>';
		                }
				if($msg=="error_pass1"){
		                        echo '<div class="alert alert-danger" role="alert">Password field is empty</div>';
		                }
		                if($msg=="error_pass2"){
		                        echo '<div class="alert alert-danger" role="alert">Confirmation password field is empty</div>';
		                }
				if($msg=="error_pass3"){
		                        echo '<div class="alert alert-danger" role="alert">The password and the confirmation password are different.</div>';
		                }
				if($msg=="error_sql1"){
		                        echo '<div class="alert alert-danger" role="alert">Database unreachable</div>';
		                }
				if($msg=="error_sql2"){
		                        echo '<div class="alert alert-danger" role="alert">Error with the database</div>';
		                }
		        }
	    ?>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input class="form-control form-control-lg" type="text" name="username" required="" placeholder="Username" autocomplete="off">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" type="code" name="code" required="" placeholder="Recovery code" autocomplete="off">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" name="pass1" id="pass1" type="password" required="" placeholder="New password">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" name="pass2" required="" type="password" placeholder="Confirm the new password">
                </div>
                <div class="form-group pt-2">
                    <button class="btn btn-block btn-primary" type="submit">Change my password</button>
                </div>
            </div>
            <div class="card-footer bg-white">
                <p>Didn't forget your password? <a href="/login.php" class="text-secondary">Login Here.</a></p>
            </div>
        </div>
    </form>
</body>

